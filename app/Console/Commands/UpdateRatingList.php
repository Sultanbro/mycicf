<?php

namespace App\Console\Commands;

use App\Library\Services\KiasServiceInterface;
use App\RatingList;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateRatingList extends Command
{
    const RATING_LIST_CLASS_ISN = 1003961;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kias:rating';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновить список рейтинга за месяц';

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
     * @param KiasServiceInterface $kias
     * @return mixed
     */
    public function handle(KiasServiceInterface $kias)
    {
        $start = time();
        echo "Started at: {$start}\n";
        $kias->authBySystem();
        echo "Initialyzing KIAS\n";
        try {
            echo "Checking before updating...\n";
            $docs_isn = RatingList::groupBy('doc_isn')->pluck('doc_isn')->toArray();

            if(!empty($docs_isn)) {
                $available_rating_list = $this->getAvailableRatingList($kias);

                $found_docs = array();

                foreach ($available_rating_list as $element) {
                    if(in_array($element, $docs_isn) == true) {
                        continue;
                    }
                    else {
                        array_push($found_docs, $element);
                    }
                }

                if(empty($found_docs)) {
                    echo "Nothing to update...\n";
                    return;
                }

                echo "Found " . sizeof($found_docs) . " documents\n";

                echo "Updating rating list...\n";
                foreach ($found_docs as $doc) {
                    $result = $kias->getDocRowAttr(self::RATING_LIST_CLASS_ISN, $doc);

                    if(!(isset($result->error)))
                        $this->addToTable($result);
                    else
                        throw new \Exception((string)$result->error->text, (string)$result->error->code);
                }

                $time = time();
                echo "Successfully updated: {$time}\n";
            }
            else {
                $found_docs = $this->getAvailableRatingList($kias);

                echo "Found " . sizeof($found_docs) . " documents\n";

                echo "Updating rating list...\n";
                foreach ($found_docs as $doc) {
                    $result = $kias->getDocRowAttr(self::RATING_LIST_CLASS_ISN, $doc);

                    if(!(isset($result->error)))
                        $this->addToTable($result);
                    else
                        throw new \Exception((string)$result->error->text, 419);
                }

                $time = time();
                echo "Successfully updated: {$time}\n";
            }

        }
        catch (\Exception $e) {
            echo "\nError: " . $e->getMessage() . " " . $e->getCode() . "\n";
            $diff = time() - $start;
            echo "\nFinished at: $diff\n";
        }
    }

    public function addToTable($result) {
        $row_number = 0;
        $rating_array = array();

        for($i = 0; $i < $result->DocRow->row->count(); $row_number++) {
            foreach ($result->DocRow->row as $rating) {
                if($rating->rn == $row_number + 1) {
                    if($rating->orderno == 1) {
                        array_push($rating_array, [
                            'rate_mark' => (string)$rating->value
                        ]);
                    }
                    elseif($rating->orderno == 2) {
                        $rating_array[$row_number] = array_merge($rating_array[$row_number], [
                            'rate_mean' => (int)$rating->value
                        ]);
                    }
                    elseif($rating->orderno == 3) {
                        $rating_array[$row_number] = array_merge($rating_array[$row_number], [
                            'employee' => (string)$rating->value_name,
                            'employee_isn' => (int)$rating->value
                        ]);
                    }
                    elseif($rating->orderno == 5) {
                        $rating_array[$row_number] = array_merge($rating_array[$row_number], [
                            'department' => (string)$rating->value_name,
                        ]);
                    }
                    elseif($rating->orderno == 6) {
                        $rating_array[$row_number] = array_merge($rating_array[$row_number], [
                            'duty' => (string)$rating->value_name,
                        ]);
                    }
                    elseif($rating->orderno == 7) {
                        $rating_array[$row_number] = array_merge($rating_array[$row_number], [
                            'rentability' => (int)$rating->value,
                        ]);
                    }
                    elseif($rating->orderno == 8) {
                        $rating_array[$row_number] = array_merge($rating_array[$row_number], [
                            'execution_plan' => (int)$rating->value,
                        ]);
                    }
                    elseif($rating->orderno == 9) {
                        $rating_array[$row_number] = array_merge($rating_array[$row_number], [
                            'cost_price' => (int)$rating->value,
                        ]);
                    }
                    elseif($rating->orderno == 10) {
                        $rating_array[$row_number] = array_merge($rating_array[$row_number], [
                            'net_claim' => (int)$rating->value,
                        ]);
                    }
                    elseif($rating->orderno == 11) {
                        $rating_array[$row_number] = array_merge($rating_array[$row_number], [
                            'ar_current' => (int)$rating->value,
                        ]);
                    }
                    elseif($rating->orderno == 13) {
                        $rating_array[$row_number] = array_merge($rating_array[$row_number], [
                            'priority_class' => (int)$rating->value,
                        ]);
                    }
                    elseif($rating->orderno == 14) {
                        $rating_array[$row_number] = array_merge($rating_array[$row_number], [
                            'prolongation' => (int)$rating->value,
                        ]);
                    }
                    elseif($rating->orderno == 15) {
                        $rating_array[$row_number] = array_merge($rating_array[$row_number], [
                            'new_clients' => (int)$rating->value,
                        ]);
                    }
                    elseif($rating->orderno == 16) {
                        $rating_array[$row_number] = array_merge($rating_array[$row_number], [
                            'direct_sales' => (int)$rating->value,
                        ]);
                    }
                    elseif($rating->orderno == 19) {
                        $rating_array[$row_number] = array_merge($rating_array[$row_number], [
                            'calc_share' => (int)$rating->value,
                        ]);
                    }
                    elseif ($rating->orderno == 21) {
                        $rating_array[$row_number] = array_merge($rating_array[$row_number], [
                            'cross_share' => (int)$rating->value,
                        ]);
                    }
                    else {
                        $doc_date = (string)$result->Doc->row->DOCDATE;
                        $doc_date = substr($doc_date, 0, 10);
                        $doc_date = date('Y-m-d', strtotime($doc_date));
                        $rating_array[$row_number] = array_merge($rating_array[$row_number], [
                            'rating_date' => $doc_date,
                            'doc_isn'     => (int)$result->Doc->row->ISN
                        ]);
                    }
                }
                else
                    continue;
            }
            $i++;
        }

        DB::beginTransaction();
        foreach ($rating_array as $rating) {
            $rating_list = new RatingList();

            $rating_list->rate_mark = $rating['rate_mark'];
            $rating_list->rate_mean = $rating['rate_mean'];
            $rating_list->employee = $rating['employee'];
            $rating_list->employee_isn = $rating['employee_isn'];
            $rating_list->department = $rating['department'];
            $rating_list->duty = $rating['duty'];
            $rating_list->rentability = $rating['rentability'];
            $rating_list->execution_plan = $rating['execution_plan'];
            $rating_list->cost_price = $rating['cost_price'];
            $rating_list->net_claim = $rating['net_claim'];
            $rating_list->ar_current = $rating['ar_current'];
            $rating_list->priority_class = $rating['priority_class'];
            $rating_list->prolongation = $rating['prolongation'];
            $rating_list->new_clients = $rating['new_clients'];
            $rating_list->direct_sales = $rating['direct_sales'];
            $rating_list->calc_share = $rating['calc_share'];
            $rating_list->cross_share = $rating['cross_share'];
            $rating_list->doc_isn = $rating['doc_isn'];
            $rating_list->rating_date = $rating['rating_date'];

            if($rating_list->save()) {
                DB::commit();
            }
            else {
                DB::rollBack();
            }
        }
//        $columns = Schema::getColumnListing('rating_list');
//        dd($rating_array);
    }

    public function getAvailableRatingList($kias) {
        $available_rating_kias = $kias->getDocRating(self::RATING_LIST_CLASS_ISN);

        $available_rating_list = array();

        foreach ($available_rating_kias->ROWSET->row as $row) {
            array_push($available_rating_list, (int)$row->DocISN);
        }

        return $available_rating_list;
    }
}
