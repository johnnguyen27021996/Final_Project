@extends('layouts.layout')

@section('title', 'Contact')

@section('content')
    <section class="module bg-dark-60 contact-page-header bg-dark" data-background="">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Contact Us</h2>
                    <div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire
                        soul, like these sweet mornings of spring which I enjoy with my whole heart.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="font-alt">Get in touch</h4><br/>
                    <form role="form" method="post" action="{{ route('contact.send') }}">
                        @csrf
                        <div class="form-group">
                            <label class="sr-only" for="name">Name</label>
                            <input class="form-control" value="{{ old('name') }}" type="text" id="name" name="name" placeholder="Your Name*">
                            <p class="help-block text-danger">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="email">Email</label>
                            <input class="form-control" value="{{ old('email') }}" type="text" id="email" name="email"
                                   placeholder="Your Email*">
                            <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="form-group">
                                <textarea class="form-control" rows="7" id="message" name="message"
                                          placeholder="Your Message*"></textarea>
                            <p class="help-block text-danger">{{ $errors->first('message') }}</p>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-block btn-round btn-d" id="cfsubmit" type="submit">Submit
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-6">
                    <h4 class="font-alt">Additional info</h4><br/>
                    <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of
                        souls like mine. I am so happy, my dear friend.</p>
                    <hr/>
                    <h4 class="font-alt">Business Hours</h4><br/>
                    <ul class="list-unstyled">
                        <li>Mo - Fr: 8am to 6pm</li>
                        <li>Sa, Su: 10am to 2pm</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <hr class="divider-d">
@endsection
