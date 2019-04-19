<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $purpose = $this->data['purpose'];
        if($purpose == 'clientregistration'){
            Mail::to("clientchampnitro@gmail.com")->cc($this->data['email'])->send(new SendMail($this->data));
        }else if($purpose == 'clientappraiser'){
            Mail::to("clientchampnitro@gmail.com")->cc($this->data['email'])->send(new SendMail($this->data));
        }else{
            Mail::to("clientchampnitro@gmail.com")->send(new SendMail($this->data));
        }

        // Job for sending emails
        
    }
}
