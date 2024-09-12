<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\Clientdeleted;
use App\Mail\clientdeletedmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Clientdeletednotification
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
    public function handle(Clientdeleted $event)
    {
       $admin = User::where('id',1)->get();
        foreach($admin as $userdetails)
{
    Mail::to($userdetails->email)->send(new clientdeletedmail());
}
        
    }
}
