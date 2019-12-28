@extends('layouts.layout')

@section('title', 'Cart/Checkout')

@section('content')
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h1 class="module-title font-alt">Checkout</h1>
                </div>
            </div>
            <hr class="divider-w pt-20">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-border checkout-table">
                        <tbody>
                        <tr>
                            <th class="hidden-xs">Item</th>
                            <th>Name</th>
                            <th class="hidden-xs">Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                        @if(session()->has('cart'))
                            @php
                                $total = 0;
                            @endphp
                            @foreach(session()->get('cart') as $key => $cart)
                                @php
                                    $total = $total + (int) $cart['price']*$cart['qty'];
                                @endphp
                                <tr>
                                    <td class="hidden-xs"><a href="#"><img
                                                src="{{ asset('uploads/product/'.$cart['thumbnail']) }}"
                                                alt="{{ $cart['name'] }}"/></a></td>
                                    <td>
                                        <h5 class="product-title font-alt">{{ $cart['name'] }}</h5>
                                    </td>
                                    <td class="hidden-xs">
                                        <h5 class="product-title font-alt">${{ $cart['price'] }}</h5>
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" name="" value="{{ $cart['qty'] }}"
                                               max="50" min="1"/>
                                    </td>
                                    <td>
                                        <h5 class="product-title font-alt">${{ (int) $cart['price']*$cart['qty'] }}</h5>
                                    </td>
                                    <td class="pr-remove"><a href="{{ route('cart.remove', $key) }}" title="Remove"><i
                                                class="fa fa-times"></i></a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" type="text" id="" name="" disabled placeholder="Coupon code"/>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <button class="btn btn-round btn-g" type="submit" disabled>Apply</button>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-3">
                    <div class="form-group">
                        <button class="btn btn-block btn-round btn-d pull-right" type="submit">Update Cart</button>
                    </div>
                </div>
            </div>
            <hr class="divider-w">
            <div class="row mt-70">
                <div class="col-sm-5 col-sm-offset-7">
                    <div class="shop-Cart-totalbox">
                        <h4 class="font-alt">Cart Totals</h4>
                        <table class="table table-striped table-border checkout-table">
                            <tbody>
                            <tr>
                                <th>Cart Subtotal :</th>
                                <td>
                                    @php
                                        echo '$'.$total;
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <th>Shipping Total :</th>
                                <td>$0.00</td>
                            </tr>
                            <tr class="shop-Cart-totalprice">
                                <th>Total :</th>
                                <td>
                                    @php
                                        echo '$'.$total;
                                    @endphp
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-lg btn-block btn-round btn-d" type="submit">Proceed to Checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="divider-d">
@endsection
