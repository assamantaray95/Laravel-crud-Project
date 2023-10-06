<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\product;

class productController extends Controller
{
    public function index(){
        return view('products.index', ['products'=> product::get()]);
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate(['name'=>'required','description'=>'required','image'=>'required']);
        $imageName  = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'),  $imageName);
        $product = new product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess('Product Created ! ! !');
    }

    public function edit($id){
        $product = Product::where('id', $id)->first();
        return view('products.edit', ['product' => $product]);
    }
    public function update(Request $request, $id){
        $request->validate(['name'=>'required','description'=>'required','image'=>'nullable']);
        $product = Product::where('id',$id)->first();
        if(isset($request->image)){
            $imageName  = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'),  $imageName);
            $product->image = $imageName;
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess('Product updated ! ! !'); 
    }
    public function delete($id){
       $product =  Product::where('id', $id)->first();
       $product->delete();
       return back()->withSuccess('Product Deleted ! ! !'); 
    }
}
