<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h1 class="module-title font-alt">Your Order</h1>
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
                </tr>
                @foreach($cart as $item)
                    <tr>
                        <td class="hidden-xs"><a href="#"><img
                                    src="{{ asset('uploads/product/'.$item['thumbnail']) }}"
                                    alt="{{ $item['name'] }}"/></a></td>
                        <td>
                            <h5 class="product-title font-alt">{{ $item['name'] }}</h5>
                        </td>
                        <td class="hidden-xs">
                            <h5 class="product-title font-alt">${{ $item['price'] }}</h5>
                        </td>
                        <td>
                            <h5>{{ $item['qty'] }}</h5>
                        </td>
                        <td>
                            <h5 class="product-title font-alt">${{ (int) $item['price']*$item['qty'] }}</h5>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
                            $.{{ $total }}
                        </td>
                    </tr>
                    <tr>
                        <th>Shipping Total :</th>
                        <td>$0.00</td>
                    </tr>
                    <tr class="shop-Cart-totalprice">
                        <th>Total :</th>
                        <td>
                            $.{{ $total }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

