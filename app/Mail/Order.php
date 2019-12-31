<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Order extends Mailable
{
    use Queueable, SerializesModels;

    protected $total;
    protected $cart;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($total, $cart)
    {
        //
        $this->total = $total;
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Client._gmail')
                    ->with([
                        'total' => $this->total,
                        'cart' => $this->cart
                    ]);
    }
}
