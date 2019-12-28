@extends('layouts.layout')

@section('title', 'Single Product')

@section('content')
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 mb-sm-40"><a class="gallery"><img
                            src="{{ asset('uploads/product/'.$product->thumbnail) }}" alt="{{ $product->name }}"/></a>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="product-title font-alt">{{ $product->name }}</h1>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-sm-12"><span><i class="fa fa-star star"></i></span><span><i
                                    class="fa fa-star star"></i></span><span><i
                                    class="fa fa-star star"></i></span><span><i
                                    class="fa fa-star star"></i></span><span><i
                                    class="fa fa-star star-off"></i></span><a class="open-tab section-scroll"
                                                                              href="#reviews">-2customer reviews</a>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-sm-12">
                            <div class="price font-alt"><span class="amount">${{ $product->price_format }}</span></div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-sm-12">
                            <div class="description">
                                <p>{!! \Illuminate\Support\Str::limit($product->description, 100) !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-sm-4 mb-sm-20">
                            <a href="" class="btn btn-lg btn-block btn-round btn-danger">Favourite</a>
                        </div>
                        <div class="col-sm-8"><a class="btn btn-lg btn-block btn-round btn-b" href="{{ route('cart.add', $product->id) }}">Add To Cart</a>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-sm-12">
                            <div class="product_meta">Categories:<a href="#">{{ $product->cate->name }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-70">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs font-alt" role="tablist">
                        <li class="active"><a href="#description" data-toggle="tab"><span class="icon-tools-2"></span>Description</a>
                        </li>
                        <li><a href="#reviews" data-toggle="tab"><span class="icon-tools-2"></span>Reviews (2)</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="description">
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="tab-pane" id="reviews">
                            <div class="comments reviews">
                                <div class="comment clearfix">
                                    <div class="comment-avatar"><img src="" alt="avatar"/></div>
                                    <div class="comment-content clearfix">
                                        <div class="comment-author font-alt"><a href="#">John Doe</a></div>
                                        <div class="comment-body">
                                            <p>The European languages are members of the same family. Their separate
                                                existence is a myth. For science, music, sport, etc, Europe uses the
                                                same vocabulary. The European languages are members of the same family.
                                                Their separate existence is a myth.</p>
                                        </div>
                                        <div class="comment-meta font-alt">Today, 14:55 -<span><i
                                                    class="fa fa-star star"></i></span><span><i
                                                    class="fa fa-star star"></i></span><span><i
                                                    class="fa fa-star star"></i></span><span><i
                                                    class="fa fa-star star"></i></span><span><i
                                                    class="fa fa-star star-off"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment clearfix">
                                    <div class="comment-avatar"><img src="" alt="avatar"/></div>
                                    <div class="comment-content clearfix">
                                        <div class="comment-author font-alt"><a href="#">Mark Stone</a></div>
                                        <div class="comment-body">
                                            <p>Europe uses the same vocabulary. The European languages are members of
                                                the same family. Their separate existence is a myth.</p>
                                        </div>
                                        <div class="comment-meta font-alt">Today, 14:59 -<span><i
                                                    class="fa fa-star star"></i></span><span><i
                                                    class="fa fa-star star"></i></span><span><i
                                                    class="fa fa-star star"></i></span><span><i
                                                    class="fa fa-star star-off"></i></span><span><i
                                                    class="fa fa-star star-off"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-form mt-30">
                                <h4 class="comment-form-title font-alt">Add review</h4>
                                <form method="post">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="sr-only" for="name">Name</label>
                                                <input class="form-control" id="name" type="text" name="name"
                                                       placeholder="Name"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="sr-only" for="email">Name</label>
                                                <input class="form-control" id="email" type="text" name="email"
                                                       placeholder="E-mail"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option selected="true" disabled="">Rating</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea class="form-control" id="" name="" rows="4"
                                                          placeholder="Review"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button class="btn btn-round btn-d" type="submit">Submit Review</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="divider-w">
    <section class="module-small">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Related Products</h2>
                </div>
            </div>
            <div class="row multi-columns-row">
                @if(count($relatedProd) > 0)
                    @foreach($relatedProd as $related)
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="shop-item">
                                <div class="shop-item-image"><img src="{{ asset('uploads/product/'.$related->thumbnail) }}"
                                                                  alt="{{ $related->name }}"/>
                                    <div class="shop-item-detail"><a href="{{ route('cart.add', $related->id) }}" class="btn btn-round btn-b"><span class="icon-basket">Add To Cart</span></a>
                                    </div>
                                </div>
                                <h4 class="shop-item-title font-alt"><a href="{{ route('single.product', $related->slug) }}">{{ $related->name }}</a></h4>${{ $related->price_format }}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <hr class="divider-w">
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
                <div class="owl-carousel text-center" data-items="5" data-pagination="false" data-navigation="false">
                    @if(count($viewProd) > 0)
                        @foreach($viewProd as $view)
                            <div class="owl-item">
                                <div class="col-sm-12">
                                    <div class="ex-product"><a href="{{ route('single.product', $view->slug) }}"><img
                                                src="{{ asset('uploads/product/'.$view->thumbnail) }}"
                                                alt="{{ $view->name }}"/></a>
                                        <h4 class="shop-item-title font-alt"><a
                                                href="{{ route('single.product', $view->slug) }}">{{ $view->name }}</a>
                                        </h4>${{ $view->price_format }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <hr class="divider-d">
@endsection
