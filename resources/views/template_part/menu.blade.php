<nav class="navbar navbar-custom navbar-fixed-top navbar-dark" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span
                    class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                    class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="{{ url('/') }}">John Nguyen</a>
        </div>
        <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="{{ route('index') }}">Home</a>
                </li>
                <li class="dropdown"><a href="{{ route('all.product') }}">Products</a></li>
                <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Pages</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown"><a href="{{ route('about') }}">About</a>
                        </li>
                        <li class="dropdown"><a href="{{ route('service') }}">Services</a>
                        </li>
                        <li class="dropdown"><a href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Categories</a>
                    <ul class="dropdown-menu">
                        @if(count($cates) > 0)
                            @foreach($cates as $cate)
                                <li><a href="#">{{ $cate->name }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </li>
                <li class="dropdown"><a href="#" data-toggle="dropdown">News</a>
                </li>
                <li class="dropdown"><a href="{{ route('checkout') }}">Checkout</a>
                </li>
                @if(auth()->check())
                    <li class="dropdown"><a href="{{ route('login.logout') }}">Logout</a>
                    </li>
                @else
                    <li class="dropdown"><a href="{{ route('login.register') }}">Login / Register</a>
                    </li>
                @endif
                <!--li.dropdown.navbar-cart-->
                <!--    a.dropdown-toggle(href='#', data-toggle='dropdown')-->
                <!--        span.icon-basket-->
                <!--        |-->
                <!--        span.cart-item-number 2-->
                <!--    ul.dropdown-menu.cart-list(role='menu')-->
                <!--        li-->
                <!--            .navbar-cart-item.clearfix-->
                <!--                .navbar-cart-img-->
                <!--                    a(href='#')-->
                <!--                        img(src='assets/images/shop/product-9.jpg', alt='')-->
                <!--                .navbar-cart-title-->
                <!--                    a(href='#') Short striped sweater-->
                <!--                    |-->
                <!--                    span.cart-amount 2 &times; $119.00-->
                <!--                    br-->
                <!--                    |-->
                <!--                    strong.cart-amount $238.00-->
                <!--        li-->
                <!--            .navbar-cart-item.clearfix-->
                <!--                .navbar-cart-img-->
                <!--                    a(href='#')-->
                <!--                        img(src='assets/images/shop/product-10.jpg', alt='')-->
                <!--                .navbar-cart-title-->
                <!--                    a(href='#') Colored jewel rings-->
                <!--                    |-->
                <!--                    span.cart-amount 2 &times; $119.00-->
                <!--                    br-->
                <!--                    |-->
                <!--                    strong.cart-amount $238.00-->
                <!--        li-->
                <!--            .clearfix-->
                <!--                .cart-sub-totle-->
                <!--                    strong Total: $476.00-->
                <!--        li-->
                <!--            .clearfix-->
                <!--                a.btn.btn-block.btn-round.btn-font-w(type='submit') Checkout-->
                <!--li.dropdown-->
                <!--    a.dropdown-toggle(href='#', data-toggle='dropdown') Search-->
                <!--    ul.dropdown-menu(role='menu')-->
                <!--        li-->
                <!--            .dropdown-search-->
                <!--                form(role='form')-->
                <!--                    input.form-control(type='text', placeholder='Search...')-->
                <!--                    |-->
                <!--                    button.search-btn(type='submit')-->
                <!--                        i.fa.fa-search-->
            </ul>
        </div>
    </div>
</nav>
