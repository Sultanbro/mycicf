<?php

namespace App\Console\Commands;

use App\Branch;
use App\Library\Services\KiasServiceInterface;
use App\XML\Kias\GetBranchesResult\BranchEntry;
use Illuminate\Console\Command;

class Branches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kias:branches';

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
        $time = time();
        echo "Начало : {$time}\n";
        $kias->authBySystem();
        echo "Авторизован\nОтправляем запрос в КИАС\n";
        $response = $kias->getBranches();
        if(isset($response->LIST)){
            $size = sizeof($response->LIST->row);
            echo "Получено {$size} строк\n";
            foreach ($response->LIST->row as $subject){
                $this->addToTable($subject);
            }
            echo "Все {$size} строк записаны в БД\n";

            echo "Меняем статус старых данных\n";
            Branch::where('verified', '=', '1')->update(['verified' => '0']);
            echo "Меняем статус новых данных\n";
            Branch::where('verified', '=', '2')->update(['verified' => '1']);
            echo "Удаляем старые данные\n";
            Branch::where('verified', '=', '0')->delete();
            echo "Данные успешно обновлены\n";
        }
        $responseTime = time() - $time;
        echo "Выпонено за {$responseTime} секунд\n";
        $time = time();
        echo "Окончание : {$time}\n";
    }

    /**
     * @param BranchEntry $subject
     * @return bool
     * @throws \Exception
     */
    public function addToTable($subject){
        $model = new Branch();
        $model->fullname = $subject->FullName;
        $model->kias_id = $subject->ISN;
        $model->kias_parent_id = $subject->ParentISN;
        $model->has_child = $subject->Kids;
        $model->verified = 2;
        $model->duty = $subject->Duty;
        if($subject->Birthday != "0"){
            $model->birthday = date('Y-m-d H:i:s', strtotime($subject->Birthday));
        }else{
            $model->birthday = null;
        }
        try{
            if($model->save()){
                return true;
            }
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage());
        }
    }
}
