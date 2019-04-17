<?php

namespace App\Providers;

use Illuminate\Support\Facades\Mail;
use App\Providers\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationToTheOwner
{


    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        //var_dump('Notificar al dueño...');
        $message = $event->message;
        Mail::send('emails.contact',['msg' => $message],function($m) use ($message){
            $m->from($message->email, $message->nombre)
                ->to('masmctt@gmail.com','MarcoSan')
                ->subject('Tu mensaje fue recibido');
        });
    }
}
