<?php

namespace App\Providers;

use Illuminate\Support\Facades\Mail;
use App\Providers\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAutoresponder
{


    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        //var_dump('Auto respondedor...');
        $message = $event->message;
        Mail::send('emails.contact',['msg' => $message],function($m) use ($message){
            $m->to($message->email, $message->nombre)->subject('Tu mensaje fue recibido');
        });
    }
}
