<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class fb extends Mailable
{
    use Queueable, SerializesModels;

    
    public $obj;
    public function __construct($obj)
    {
        
        $this->obj = $obj;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hotrounihop@gmail.com')->view('admin.feedback.sendFeedback');
    }
}
