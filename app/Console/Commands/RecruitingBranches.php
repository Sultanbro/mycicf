<?php

namespace App\Console\Commands;

use App\Dicti;
use DB;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Console\Command;
use App\Library\Services\Kias;

class RecruitingBranches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kias:Recruitingbranches';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновить список всех подразделении и сотрудников';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(KiasServiceInterface $kias)
    {
        try{
            $kias = new Kias();
            $kias->initSystem();
            $data = [1007381,1760331,800701,1760341,777441,800691];

            foreach($data as $key => $value) {
                $response = $kias->getDictiList($value);

                if (isset($response->ROWSET->row)) {
                    $oldDicti = Dicti::where('parent_isn', $value)->delete();
                    foreach ($response->ROWSET->row as $row) {
                        $dicti = new Dicti;
                        $dicti->isn = (string)$row->ISN;
                        $dicti->fullname = (string)$row->FULLNAME;
                        $dicti->code = (string)$row->CODE;
                        $dicti->numcode = (string)$row->NUMCODE;
                        $dicti->n_kids = (string)$row->N_KIDS;
                        $dicti->parent_isn = $value;
                        if ($dicti->save()) {
                            echo "Данные по " . (string)$row->FULLNAME . " успешно записаны. \n";
                        } else {
                            echo "Ошибка записи " . (string)$row->FULLNAME . " \n";
                        }
                    }
                }
                //return true;
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }
}
