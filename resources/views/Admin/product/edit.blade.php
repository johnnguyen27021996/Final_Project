@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="float-left">Edit Product</h5>
                        <a href="{{ route('product.index') }}" class="float-right btn btn-outline-danger">Back To All
                            Product</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input type="text" name="name" id="name"
                                               class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                               value="{{ $product->name }}"
                                               placeholder="Product Name ...">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Product Price</label>
                                        <input type="text" name="price" id="price"
                                               class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                               value="{{ $product->price }}"
                                               placeholder="Product Price ...">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('price') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="thumbnail">Product Thumbnail</label>
                                        <input type="file" name="thumbnail" id="thumbnail"
                                               class="form-control {{ $errors->has('thumbnail') ? 'is-invalid' : '' }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('thumbnail') }}
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline-danger form-control">Save</button>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Product Description</label>
                                        <textarea name="description" id="description"
                                                  rows="4"
                                                  class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                                  placeholder="Product Name ...">
                                            {{ $product->description }}
                                    </textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cate_id">Product Category</label>
                                        <select name="cate_id" id="cate_id"
                                                class="form-control {{ $errors->has('cate_id') ? 'is-invalid' : '' }}">
                                            @foreach($cates as $cate)
                                                <option value="{{ $cate->id }}"  {{ $cate->id == $product->cate_id ? 'selected' : '' }}>{{ $cate->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('cate_id') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

