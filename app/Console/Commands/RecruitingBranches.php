<?php

namespace App\Console\Commands;

use App\Branch;
use App\Library\Services\KiasServiceInterface;
use App\Recruiting;
use Illuminate\Console\Command;
use App\Dicti;
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
            $data = [822411,1764941,1764881,750461,47,1777411,482281,1765371,1765281,1764851,482281,815141,482281,1765001];

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
