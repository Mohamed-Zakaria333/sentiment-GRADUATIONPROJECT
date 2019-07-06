<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class comment_replay extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public function __construct($info)
    {
      $this->data = $info;
       //dd($this->data);
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        //dd($data);
        return $this->view('admin.email_template')->with('data',$this->data);
    }
}
