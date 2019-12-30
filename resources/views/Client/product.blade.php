@extends('layouts.layout')

@section('title', 'Products')

@section('content')
    <section class="module bg-dark-60 shop-page-header" data-background="">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Shop Products</h2>
                    <div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire soul,
                        like these sweet mornings of spring which I enjoy with my whole heart.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="module-small">
        <div class="container">
            <form class="row" action="{{ route('search.product') }}" method="post">
                @csrf
                <div class="col-sm-4 mb-sm-20">
                    <select name="name" class="form-control">
                        <option value="ds">Default Sorting</option>
                        <option value="po">Popular</option>
                        <option value="la">Latest</option>
                        <option value="hp">High Price</option>
                        <option value="lp">Low Price</option>
                    </select>
                </div>
                <div class="col-sm-4 mb-sm-20">
                    <select name="cate_id" class="form-control">
                        <option value="">All</option>
                        @if(count($cates) > 0)
                            @foreach($cates as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-block btn-round btn-g" type="submit">Apply</button>
                </div>
            </form>
        </div>
    </section>
    <hr class="divider-w">
    <section class="module-small">
        <div class="container">
            <div class="row multi-columns-row">
                @if(count($prods) > 0)
                    @foreach($prods as $prod)
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="shop-item">
                                <div class="shop-item-image"><img style="width: 275px; height: 185px" class="img-thumbnail" src="{{ asset('uploads/product/'.$prod->thumbnail) }}"
                                                                  alt="{{ $prod->name }}"/>
                                    <div class="shop-item-detail"><a href="{{ route('cart.add', $prod->id) }}" class="btn btn-round btn-b"><span
                                                class="icon-basket">Add To Cart</span></a>
                                    </div>
                                </div>
                                <h4 class="shop-item-title font-alt"><a
                                        href="{{ route('single.product', $prod->slug) }}">{{ $prod->name }}</a></h4>
                                ${{ $prod->price_format }}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="pagination font-alt">
                        {{ $prods->links() }}
                </div>
            </div>
        </div>
    </section>
    <hr class="divider-d">
@endsection
