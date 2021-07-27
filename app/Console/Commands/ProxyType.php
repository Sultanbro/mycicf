<?php

namespace App\Console\Commands;

use App\Dicti;
use App\ExpressProduct;
use DB;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Console\Command;

class ProxyType extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'proxyType:dicti';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновить СЗ и Заявления и виды доверенностей и тп';

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
    public function handle(){
        $kias = new Kias();
        $kias->initSystem();


        try{
            $response = $kias->getDictiList(221659);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',221659)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 221659;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(804341);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',804341)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 804341;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(1737181);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',1737181)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 1737181;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(221389);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',221389)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 221389;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(222565);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',222565)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 222565;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(222555);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',222555)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 222555;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(25);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',25)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 25;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(50);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',50)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 50;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(11360);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',11360)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 11360;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(13);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',13)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (int)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 13;
                    $dicti->save();

                    $responses = $kias->getDictiList($row->ISN);
                    if(isset($responses->ROWSET->row)) {
                        $oldDicti = Dicti::where('parent_isn', $row->ISN)->delete();
                        foreach ($responses->ROWSET->row as $rowChild) {
                            $dictiChild = new Dicti;
                            $dictiChild->isn = (int)$rowChild->ISN;
                            $dictiChild->fullname = (string)$rowChild->FULLNAME;
                            $dictiChild->code = (string)$rowChild->CODE;
                            $dictiChild->numcode = (string)$rowChild->NUMCODE;
                            $dictiChild->n_kids = (string)$rowChild->N_KIDS;
                            $dictiChild->parent_isn = (int)$row->ISN;
                            if ($dictiChild->save()) {
                                echo "Данные по " . (string)$rowChild->FULLNAME. $rowChild->ISN . " успешно записаны. \n";
                            } else {
                                echo "Ошибка записи " . (string)$rowChild->FULLNAME . " \n";
                            }
                        }
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(702941);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',702941)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (int)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 702941;
                    $dicti->save();

                    $responses = $kias->getDictiList($row->ISN);
                    if(isset($responses->ROWSET->row)) {
                        $oldDicti = Dicti::where('parent_isn', $row->ISN)->delete();
                        foreach ($responses->ROWSET->row as $rowChild) {
                            $dictiChild = new Dicti;
                            $dictiChild->isn = (int)$rowChild->ISN;
                            $dictiChild->fullname = (string)$rowChild->FULLNAME;
                            $dictiChild->code = (string)$rowChild->CODE;
                            $dictiChild->numcode = (string)$rowChild->NUMCODE;
                            $dictiChild->n_kids = (string)$rowChild->N_KIDS;
                            $dictiChild->parent_isn = (int)$row->ISN;
                            if ($dictiChild->save()) {
                                echo "Данные по " . (string)$rowChild->FULLNAME. $rowChild->ISN . " успешно записаны. \n";
                            } else {
                                echo "Ошибка записи " . (string)$rowChild->FULLNAME . " \n";
                            }
                        }
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(804371);
            ini_set ('memory_limit', '-1');
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',804371)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (int)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 804371;
                    $dicti->save();

                    $responses = $kias->getDictiList($row->ISN);
                    if(isset($responses->ROWSET->row)) {
                        $oldDicti = Dicti::where('parent_isn', $row->ISN)->delete();
                        foreach ($responses->ROWSET->row as $rowChild) {
                            $dictiChild = new Dicti;
                            $dictiChild->isn = (int)$rowChild->ISN;
                            $dictiChild->fullname = (string)$rowChild->FULLNAME;
                            $dictiChild->code = (string)$rowChild->CODE;
                            $dictiChild->numcode = (string)$rowChild->NUMCODE;
                            $dictiChild->n_kids = (string)$rowChild->N_KIDS;
                            $dictiChild->parent_isn = (int)$row->ISN;
                            if ($dictiChild->save()) {
                                echo "Данные по " . (string)$rowChild->FULLNAME. $rowChild->ISN . " успешно записаны. \n";
                            } else {
                                echo "Ошибка записи " . (string)$rowChild->FULLNAME . " \n";
                            }
                        }
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(1994);
            ini_set ('memory_limit', '-1');
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',1994)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (int)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 1994;
                    $dicti->save();

                    $responses = $kias->getDictiList($row->ISN);
                    if(isset($responses->ROWSET->row)) {
                        $oldDicti = Dicti::where('parent_isn', $row->ISN)->delete();
                        foreach ($responses->ROWSET->row as $rowChild) {
                            $dictiChild = new Dicti;
                            $dictiChild->isn = (int)$rowChild->ISN;
                            $dictiChild->fullname = (string)$rowChild->FULLNAME;
                            $dictiChild->code = (string)$rowChild->CODE;
                            $dictiChild->numcode = (string)$rowChild->NUMCODE;
                            $dictiChild->n_kids = (string)$rowChild->N_KIDS;
                            $dictiChild->parent_isn = (int)$row->ISN;
                            $dictiChild->save();

                            $response2 = $kias->getDictiList($rowChild->ISN);
                            if(isset($response2->ROWSET->row)) {
                                $oldDicti = Dicti::where('parent_isn', $rowChild->ISN)->delete();
                                foreach ($response2->ROWSET->row as $rowChild2) {
                                    $dictiChild2 = new Dicti;
                                    $dictiChild2->isn = (int)$rowChild2->ISN;
                                    $dictiChild2->fullname = (string)$rowChild2->FULLNAME;
                                    $dictiChild2->code = (string)$rowChild2->CODE;
                                    $dictiChild2->numcode = (string)$rowChild2->NUMCODE;
                                    $dictiChild2->n_kids = (string)$rowChild2->N_KIDS;
                                    $dictiChild2->parent_isn = (int)$rowChild->ISN;
                                    $dictiChild2->save();
                                }
                            }
                        }
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(39);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',39)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 39;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(223373);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',223373)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 223373;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(222517);
            ini_set ('memory_limit', '-1');
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',222517)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (int)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 222517;
                    $dicti->save();

                    $responses = $kias->getDictiList($row->ISN);
                    if(isset($responses->ROWSET->row)) {
                        $oldDicti = Dicti::where('parent_isn', $row->ISN)->delete();
                        foreach ($responses->ROWSET->row as $rowChild) {
                            $dictiChild = new Dicti;
                            $dictiChild->isn = (int)$rowChild->ISN;
                            $dictiChild->fullname = (string)$rowChild->FULLNAME;
                            $dictiChild->code = (string)$rowChild->CODE;
                            $dictiChild->numcode = (string)$rowChild->NUMCODE;
                            $dictiChild->n_kids = (string)$rowChild->N_KIDS;
                            $dictiChild->parent_isn = (int)$row->ISN;
                            if ($dictiChild->save()) {
                                echo "Данные по " . (string)$rowChild->FULLNAME. $rowChild->ISN . " успешно записаны. \n";
                            } else {
                                echo "Ошибка записи " . (string)$rowChild->FULLNAME . " \n";
                            }
                        }
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->userCicGetDictiList(2147381);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',2147381)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->parent_isn = 2147381;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(1326291);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',1326291)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 1326291;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(1113561);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',1113561)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 1113561;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(1446391);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',1446391)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 1446391;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(1872651);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',1872651)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 1872651;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(2999);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',2999)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 2999;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(2087201);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',2087201)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 2087201;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(812801);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',812801)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 812801;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(997421);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',997421)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 997421;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(1872641);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',1872641)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 1872641;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(2004861);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',2004861)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 2004861;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(2004901);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',2004901)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 2004901;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(2004731);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',2004731)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 2004731;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(2028);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',2028)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 2028;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }

        try{
            $response = $kias->getDictiList(1042681);
            if(isset($response->ROWSET->row)) {
                $oldDicti = Dicti::where('parent_isn',1042681)->delete();
                foreach ($response->ROWSET->row as $row) {
                    $dicti = new Dicti;
                    $dicti->isn = (string)$row->ISN;
                    $dicti->fullname = (string)$row->FULLNAME;
                    $dicti->code = (string)$row->CODE;
                    $dicti->numcode = (string)$row->NUMCODE;
                    $dicti->n_kids = (string)$row->N_KIDS;
                    $dicti->parent_isn = 1042681;
                    if($dicti->save()){
                        echo "Данные по ".(string)$row->FULLNAME." успешно записаны. \n";
                    } else {
                        echo "Ошибка записи ".(string)$row->FULLNAME." \n";
                    }
                }
            }
            return true;
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }
}

