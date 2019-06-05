<?php

namespace App\Listeners;

use App\Events\ProductsCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewsLetter
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
     * @param  ProductsCreated  $event
     * @return void
     */
    public function handle(ProductsCreated $event)
    {
        \Log::info('Enviando emails');
    }
}
