@extends('layouts.layout')

@section('title', 'Final Project Trung')

@section('content')
    <section class="module-small">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Latest in product</h2>
                </div>
            </div>
            <div class="row multi-columns-row">
                @if(count($latestProd) > 0)
                    @foreach($latestProd as $last)
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="shop-item">
                                <div class="shop-item-image"><img style="width: 275px; height: 185px" class="img-thumbnail" src="{{ asset('uploads/product/'.$last->thumbnail) }}"
                                                                  alt="{{ $last->name }}"/>
                                    <div class="shop-item-detail"><a href="{{ route('cart.add', $last->id) }}" class="btn btn-round btn-b"><span
                                                class="icon-basket">Add To Cart</span></a>
                                    </div>
                                </div>
                                <h4 class="shop-item-title font-alt"><a href="{{ route('single.product', $last->slug) }}">{{ $last->name  }}</a></h4>
                                ${{ $last->price_format }}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row mt-30">
                <div class="col-sm-12 align-center"><a class="btn btn-b btn-round" href="{{ route('all.product') }}">See all products</a>
                </div>
            </div>
        </div>
    </section>
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Exclusive products</h2>
                    <div class="module-subtitle font-serif">The languages only differ in their grammar, their
                        pronunciation and their most common words.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel text-center" data-items="5" data-pagination="false"
                     data-navigation="false">
                    @if(count($viewProd) > 0)
                        @foreach($viewProd as $view)
                            <div class="owl-item">
                                <div class="col-sm-12">
                                    <div class="ex-product"><a href="#"><img src="{{ asset('uploads/product/'.$view->thumbnail) }}"
                                                                             alt="{{ $view->name }}"/></a>
                                        <h4 class="shop-item-title font-alt"><a href="{{ route('single.product', $view->slug) }}">{{ $view->name }}</a></h4>${{ $view->price_format }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <hr class="divider-w">
@endsection
