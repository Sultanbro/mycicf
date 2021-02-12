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
        DB::beginTransaction();
        if ($newTotal = CentcoinHistory::where('total','type','description',  $centcoinHistory)->first()) {
            $newTotal = new CentcoinHistory();
            $newTotal = $centcoinHistory->type;
            $newTotal = $centcoinHistory->total;
            $newTotal = $centcoinHistory->description;
        }
        $total = new CentcoinApply();
        $total->balance = $newTotal->total;
        $total->status = $newTotal->type;
        $total->user_buy_product = $newTotal->description;

        try{
            $newTotal->save();
            $total->save();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(500, 'Произошла ошибка при записи сенткоинов');
        }

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
