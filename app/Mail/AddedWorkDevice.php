<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddedWorkDevice extends Mailable
{
    use Queueable, SerializesModels;

    public $device;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($device)
    {
        $this->device = $device;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.addedWorkDevice', 
            [
                'device' => $this->device
            ]);
    }
}
