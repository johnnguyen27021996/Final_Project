@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="float-left">Category</h5>
                        <a href="{{ route('category.create') }}" class="float-right btn btn-outline-danger">Add
                            Category</a>
                    </div>

                    <div class="card-body">
                        @if (count($cates) > 0)
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Option</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cates as $cate)
                                        <tr>
                                            <td>{{ $cate->name }}</td>
                                            <td>
                                                <a href="{{ route('category.show', $cate->id) }}" class="btn btn-outline-success">Show</a>
                                                <a href="{{ route('category.edit', $cate->id) }}" class="btn btn-outline-primary">Edit</a>
                                                <a href="#" class="btn btn-outline-danger" onclick="event.preventDefault(); document.getElementById('cate-delete-{{ $cate->id }}').submit();">Delete</a>
                                                <form action="{{ route('category.destroy', $cate->id) }}" id="cate-delete-{{ $cate->id }}" method="post" style="display: none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ $cates->links() }}
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

