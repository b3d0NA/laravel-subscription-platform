<?php

namespace App\Listeners;

use App\Events\SendEmail;
use App\Mail\PostEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailToSubscriber implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SendEmail $event)
    {
        $subscribers = $event->post->websites->subscribers->pluck("email");
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber)->send(new PostEmail($event->post));
        }
    }
}