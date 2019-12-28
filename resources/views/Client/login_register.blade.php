@extends('layouts.layout')

@section('title', 'Login/Register')

@section('content')
    <section class="module bg-dark-30" data-background="">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h1 class="module-title font-alt mb-0">Login-Register</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-sm-offset-1 mb-sm-40">
                    <h4 class="font-alt">Login</h4>
                    <hr class="divider-w mb-10">
                    <form class="form" action="" method="post">
                        <div class="form-group">
                            <input class="form-control" type="text" name="username"
                                   placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="password"
                                   placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-round btn-b" type="submit">Login</button>
                        </div>
                        <div class="form-group"><a href="">Forgot Password?</a></div>
                    </form>
                </div>
                <div class="col-sm-5">
                    <h4 class="font-alt">Register</h4>
                    <hr class="divider-w mb-10">
                    <form class="form" action="" method="post">
                        <div class="form-group">
                            <input class="form-control" type="text" name="remail" placeholder="Email"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="rusername"
                                   placeholder="Username"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="rpassword"
                                   placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="re-rpassword"
                                   placeholder="Re-enter Password"/>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-round btn-b" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <hr class="divider-d">
@endsection
