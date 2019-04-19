<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        // Pass all data
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $view_template = "request-email";

        $purpose = $this->data['purpose'];
        if($purpose == 'request'){
            $view_template = "request-email";
        }else if($purpose == 'clientregistration'){
            $view_template = "clientregister";
        }else if($purpose == 'clientappraiser'){
            $view_template = "clientappraiser";
        }

        return $this->to("clientchampnitro@gmail.com")->from($this->data['email'])->subject("Email from your website")->view($view_template)->with("data",$this->data);
    }
}
