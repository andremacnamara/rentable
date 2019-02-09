<?php

namespace App\Mail;

use App\User;
use App\PropertyAdvert;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdvertPosted extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $PropertyAdvert;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, PropertyAdvert $PropertyAdvert)
    {
        $this->user = $user;
        $this->PropertyAdvert = $PropertyAdvert;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.advert');
    }
}
