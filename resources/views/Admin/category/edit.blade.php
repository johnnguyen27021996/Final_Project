@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="float-left">Edit Category</h5>
                        <a href="{{ route('category.index') }}" class="float-right btn btn-outline-danger">Back To All
                            Category</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('category.update', $category->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6 p-0">
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" value="{{ old('name', $category->name) }}" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Category Name ...">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-danger form-control">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

