<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Color;
use App\Size;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data['colorlist'] = Color::all();
        $data['sizelist'] = Size::all();
        return $this->to($this->order->bill_email, $this->order->bill_name)
            ->subject('Xác nhận đơn hàng thành công từ SUHOUSE')
            ->markdown('frontend.mailsuccess', $data);

    }
}