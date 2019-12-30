<?php

namespace App\Listeners;

use App\Events\SettingCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SettingCreatedListener
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
     * @param  SettingCreatedEvent  $event
     * @return void
     */
    public function handle(SettingCreatedEvent $event)
    {
        \App\Models\Setting::create([
            'user_id' => $event->user->id,
            'logo' => '',
            'company_name' => $event->user->name.' Company',
            'domain' => 'https:://www.wedat.org/',
            'address' => '3500 Deer Creek Road - Palo Alto, CA 94304',
            'phone' => '123456789',
            'currency_id' => 1,
        ]);
    }
}
