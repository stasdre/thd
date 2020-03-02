<?php

namespace Thd\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Checkout extends Mailable
{
    use Queueable, SerializesModels;

    public $dataForm;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->dataForm = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->cc("admin@houseplansbydavidwiggins.com")->subject("HouseplansByDavidWiggins Order Confirmation")->view('mail.checkout');
    }
}
