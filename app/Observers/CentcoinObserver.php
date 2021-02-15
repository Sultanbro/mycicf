<?php

namespace App\Observers;

use App\CentcoinApply;
use App\CentcoinHistory;
use Illuminate\Support\Facades\DB;

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
        $centcoinHistory = new CentcoinApply();

        $centcoinHistory->save();

    }

    /**
     * Handle the centcoin history "updated" event.
     *
     * @param  \App\CentcoinHistory  $centcoinHistory
     * @return void
     */
    public function updating(CentcoinHistory $centcoinHistory)
    {
/*        if($centcoinHistory->isDirty('total')){
            // email has changed
            $new_email = $centcoinHistory->total;
            $old_email = $centcoinHistory->getOriginal('total');
            dd($new_email);
            dd($old_email);
        }*/
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
