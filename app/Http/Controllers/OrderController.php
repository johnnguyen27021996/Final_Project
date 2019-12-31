<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PaymentRequest;
use App\Jobs\SendMail;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Charge;
use Stripe\Stripe;

class OrderController extends Controller
{
    public function payment()
    {
        if (!session()->has('cart')){
            return redirect()->route('all.product');
        }
        $cates = Category::all();
        return view('Client.payment', compact('cates'));
    }

    public function processPayment(PaymentRequest $request)
    {
        $cart = session()->get('cart');
        Stripe::setApiKey('sk_test_hvFK3JhUXLd6565lI01n1hDG00ReIXPiU0');
        try {
            $charge = Charge::create(
              array(
                  'amount' => $request->input('total')*100,
                  'currency' => 'usd',
                  'source' => $request->input('stripeToken'),
                  'description' => $request->input('message')
              )
            );
            $order = new Order();
            $order->name = $request->input('name');
            $order->email = $request->input('email');
            $order->address = $request->input('address');
            $order->message = $request->input('message');
            $order->total = $request->input('total');
            $order->payment_id = $charge->id;
            $order->status = $charge->status;
            $order->save();
        } catch (\Exception $exception) {
            return redirect()->route('checkout');
        }
        for ($i=0; $i<count($cart); $i++)
        {
            $order->products()->attach($cart[$i]['id'], ['quantity' => $cart[$i]['qty']]);
        }
        Mail::to($request->input('email'))->send(new \App\Mail\Order($request->input('total'), $cart));
        session()->forget('cart');
        return redirect()->route('checkout');
    }
}
