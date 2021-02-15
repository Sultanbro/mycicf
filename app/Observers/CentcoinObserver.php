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
        $total = new CentcoinApply();
        $total->type = $centcoinHistory->type;
        $total->description = $centcoinHistory->description;// Какой продукт купили ****
        $total->full_name = $centcoinHistory->changed_user_isn; // ФИО
        $total->wasted_centcoins = $centcoinHistory->quantity;
        $total->balance = $centcoinHistory->total; // Остаток на счете
        $total->save();
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
