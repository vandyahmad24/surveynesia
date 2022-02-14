<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Auth;
class SendPembayaran extends Mailable
{
    use Queueable, SerializesModels;
    public $survey;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($survey)
    {
        $this->survey = $survey;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
          return $this->from('admin@surveynesia.com')
                   ->subject('Konfirmasi Pembayaran')
                   ->view('mail.pembayaran');
                   
                  
    }
}
