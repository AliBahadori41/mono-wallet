<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdatePromotionQouta
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $promotion = $event->promotion;

        if ($promotion->quota > 0) {
            $promotion->quota -= $promotion->quota;
            $promotion->save();
        }
    }
}
