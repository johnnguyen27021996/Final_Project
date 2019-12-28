@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="float-left">Product</h5>
                        <a href="{{ route('product.create') }}" class="float-right btn btn-outline-danger">Add
                            Product</a>
                    </div>

                    <div class="card-body">
                        @if (count($prods) > 0)
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <td>Thumbnail</td>
                                    <td>Name</td>
                                    <td>Price</td>
                                    <td>Option</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($prods as $prod)
                                    <tr>
                                        <td><img src="{{ asset('uploads/product/'.$prod->thumbnail) }}" alt="" width="60px" height="60px"></td>
                                        <td>{{ $prod->name }}</td>
                                        <td>{{ '$'.$prod->price_format }}</td>
                                        <td>
                                            <a href="{{ route('product.show', $prod->id) }}" class="btn btn-outline-success">Show</a>
                                            <a href="{{ route('product.edit', $prod->id) }}" class="btn btn-outline-primary">Edit</a>
                                            <a href="#" class="btn btn-outline-danger" onclick="event.preventDefault(); document.getElementById('prod-delete-{{ $prod->id }}').submit();">Delete</a>
                                            <form action="{{ route('product.destroy', $prod->id) }}" id="prod-delete-{{ $prod->id }}" method="post" style="display: none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $prods->links() }}
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

