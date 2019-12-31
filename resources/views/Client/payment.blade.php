@extends('layouts.layout')

@section('title', 'Payment')

@section('content')
    <section class="module">
        <div class="container">
            <div class="row">
                <form action="{{ route('payment.process') }}" method="post" id="payment">
                    @csrf
                    <div class="col-sm-8 col-sm-offset-2">
                        <h4 class="font-alt mb-0">Information Payment</h4>
                        <hr class="divider-w mt-10 mb-20">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title font-alt"><a
                                        >Information Basic</a></h4>
                                </div>
                                @php
                                    $total = 0;
                                @endphp
                                @if(session()->has('cart'))
                                    @foreach(session()->get('cart') as $cart)
                                        @php
                                            $total = $total + (int) $cart['price']*$cart['qty'];
                                        @endphp
                                    @endforeach
                                @endif
                                <div class="panel-collapse in" id="support1">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="sr-only" for="total">Total</label>
                                            <input class="form-control" value="{{ $total }}" type="hidden" id="total"
                                                   name="total" placeholder="Your Cart Total*">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="name">Name</label>
                                            <input class="form-control" value="{{ old('name') }}" type="text" id="name"
                                                   name="name" placeholder="Your Name*">
                                            <p class="help-block text-danger">{{ $errors->first('name') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="email">Email</label>
                                            <input class="form-control" value="{{ old('email') }}" type="text"
                                                   id="email" name="email"
                                                   placeholder="Your Email*">
                                            <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="address">Address</label>
                                            <input class="form-control" value="{{ old('address') }}" type="text"
                                                   id="address" name="address"
                                                   placeholder="Your Address*">
                                            <p class="help-block text-danger">{{ $errors->first('address') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="7" id="message" name="message"
                                                      placeholder="Your Message"></textarea>
                                            <p class="help-block text-danger">{{ $errors->first('message') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title font-alt"><a>Account
                                            Payment</a>
                                    </h4>
                                </div>
                                <div class="panel-collapse" id="support2">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="sr-only" for="number">Credit Card Number</label>
                                            <input class="form-control" value="{{ old('number') }}" type="text"
                                                   id="number"
                                                   name="number" placeholder="Credit Card Number*">
                                            <p class="help-block text-danger">{{ $errors->first('number') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="exp_month">Exp_Month</label>
                                            <input class="form-control" value="{{ old('exp_month') }}" type="text"
                                                   id="exp_month" name="exp_month"
                                                   placeholder="Card Exp_Month*">
                                            <p class="help-block text-danger">{{ $errors->first('exp_month') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="exp_year">Exp_Year</label>
                                            <input class="form-control" value="{{ old('exp_month') }}" type="text"
                                                   id="exp_year" name="exp_year"
                                                   placeholder="Card Exp_Year*">
                                            <p class="help-block text-danger">{{ $errors->first('exp_month') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="cvc">CVC</label>
                                            <input class="form-control" value="{{ old('cvc') }}" type="text"
                                                   id="cvc" name="cvc"
                                                   placeholder="Card CVC*">
                                            <p class="help-block text-danger">{{ $errors->first('cvc') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-block btn-round btn-d" id="cfsubmit" type="submit">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <hr class="divider-d">

    <script src="https://js.stripe.com/v2/"></script>
    <script src="{{ asset('js/payment.js') }}"></script>
@endsection
