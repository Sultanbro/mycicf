<?php

namespace App\Observers;

use App\CentcoinHistory;

class CentcoinObserver
{
    /**
     * Handle the centcoin history "created" event.
     *
     * @param  \App\CentcoinHistory  $centcoinHistory
     * @return void
     */
    public function created(CentcoinHistory $centcoinHistory)
    {
/*        $type[] = $centcoinHistory->isDirty('Оплата');
        $buyItem [] = $centcoinHistory->isDirty('description');*/

    }

    /**
     * Handle the centcoin history "updated" event.
     *
     * @param  \App\CentcoinHistory  $centcoinHistory
     * @return void
     */
    public function updating(CentcoinHistory $centcoinHistory)
    {
        if($centcoinHistory->isDirty('total')){
            // email has changed
            $new_email = $centcoinHistory->total;
            $old_email = $centcoinHistory->getOriginal('total');
            dd($new_email);
            dd($old_email);
        }
    }

    /**
     * Handle the centcoin history "deleted" event.
     *
     * @param  \App\CentcoinHistory  $centcoinHistory
     * @return void
     */
    public function deleted(CentcoinHistory $centcoinHistory)
    {
        //
    }

    /**
     * Handle the centcoin history "restored" event.
     *
     * @param  \App\CentcoinHistory  $centcoinHistory
     * @return void
     */
    public function restored(CentcoinHistory $centcoinHistory)
    {
        //
    }

    /**
     * Handle the centcoin history "force deleted" event.
     *
     * @param  \App\CentcoinHistory  $centcoinHistory
     * @return void
     */
    public function forceDeleted(CentcoinHistory $centcoinHistory)
    {
        //
    }
}
