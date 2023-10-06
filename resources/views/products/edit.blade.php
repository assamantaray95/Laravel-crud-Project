@extends('layout.app')
@extends('layout.app')
@section('main')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h3 class="text-center">EDIT PRODUCTS</h3>
            </div>
            <div class="col-md-4">
                <div class="text-end">
                    <a href="javascript:history.back();" class="btn btn-sm btn-outline-primary">Back</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="/products/update/{{ $product->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name' , $product->name) }}" placeholder="Enter Name">
                                @if($errors->has('name'))
                                  <span class="text-danger">{{ $errors->first('name') }}
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="Description" class="form-label">Description:</label>
                                <textarea type="text" class="form-control" id="description" name="description" rows="5" placeholder="Enter Description">{{ old('description' , $product->description) }}</textarea>
                                @if($errors->has('description'))
                                  <span class="text-danger">{{ $errors->first('description') }}
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="image" class="form-label">Image:</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @if($errors->has('image'))
                                  <span class="text-danger">{{ $errors->first('image') }}
                                @endif
                            </div>
                            <div class="form-group mb-1">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
