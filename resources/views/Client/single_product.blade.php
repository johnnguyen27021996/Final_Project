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
                        <div class="col-sm-12">
                            {{ $product->avg_star_review }}
                            <span><i class="fa fa-star star"></i></span>
                            <a class="open-tab section-scroll"
                               href="#reviews"> - {{ $product->distinct_review_count }} customer reviews - </a>
                            <a href="#"
                               class="open-tab section-scroll">{{ $product->is_farivotes }} {{ \Illuminate\Support\Str::plural('farivote', $product->is_farivotes) }}</a>
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
                            <a href="{{ route('favorite.product', $product->id) }}"
                               class="btn btn-lg btn-block btn-round btn-{{ $product->checkFarivote(auth()->id()) == true ? 'success' : 'danger' }}">Favorite</a>
                        </div>
                        <div class="col-sm-8"><a class="btn btn-lg btn-block btn-round btn-b"
                                                 href="{{ route('cart.add', $product->id) }}">Add To Cart</a>
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
                        <li><a href="#reviews" data-toggle="tab"><span class="icon-tools-2"></span>Reviews
                                ({{ $product->review_count }})</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="description">
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="tab-pane" id="reviews">
                            <div class="comments reviews">
                                @if(count($product->reviews) > 0)
                                    @foreach($product->reviews as $review)
                                        <div class="comment clearfix">
                                            <div class="comment-avatar"><img src="" alt="avatar"/></div>
                                            <div class="comment-content clearfix">
                                                <div class="comment-author font-alt"><a href="#">{{ $review->name }}
                                                        <span class="badge badge-secondary">{{ $review->public }}</span></a>
                                                </div>
                                                <div class="comment-body">
                                                    <p>{!! $review->body !!}</p>
                                                </div>
                                                <div class="comment-meta font-alt">{{ $review->created_at }}
                                                    @for($i=1; $i<=5; $i++)
                                                        <span><i
                                                                class="fa fa-star star {{ $review->rate < $i ? 'star-off' : ''  }}"></i></span>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="comment-form mt-30">
                                <h4 class="comment-form-title font-alt">Add review</h4>
                                <form method="post" action="{{ route('review.product', $product->id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="sr-only" for="name">Name</label>
                                                <input class="form-control" id="name" type="text" name="name" @auth value="{{ auth()->user()->name }}" @endauth
                                                       placeholder="Name"/>
                                                <p class="help-block text-danger">{{ $errors->first('name') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="sr-only" for="email">Name</label>
                                                <input class="form-control" id="email" type="text" name="email" @auth value="{{ auth()->user()->email }}" @endauth
                                                       placeholder="E-mail"/>
                                                <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <select name="rate" class="form-control">
                                                    <option value="" selected="true">Rating</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                <p class="help-block text-danger">{{ $errors->first('rate') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea class="form-control" id="" name="body" rows="4"
                                                          placeholder="Review"></textarea>
                                                <p class="help-block text-danger">{{ $errors->first('body') }}</p>
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
                                <div class="shop-item-image"><img style="width: 275px; height: 185px"
                                                                  class="img-thumbnail"
                                                                  src="{{ asset('uploads/product/'.$related->thumbnail) }}"
                                                                  alt="{{ $related->name }}"/>
                                    <div class="shop-item-detail"><a href="{{ route('cart.add', $related->id) }}"
                                                                     class="btn btn-round btn-b"><span
                                                class="icon-basket">Add To Cart</span></a>
                                    </div>
                                </div>
                                <h4 class="shop-item-title font-alt"><a
                                        href="{{ route('single.product', $related->slug) }}">{{ $related->name }}</a>
                                </h4>${{ $related->price_format }}
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
