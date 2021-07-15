<?php

namespace App\Console\Commands;

use App\Comment;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use App\Mail\Email;
use App\ParseOracle;
use App\Post;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Console\Command;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use SebastianBergmann\Comparator\Book;
use function Deployer\isVeryVerbose;

class SandboxCommand extends Command {
    protected $signature = 'sandbox';

    protected $description = 'Command description';

    public function handle() {

        $last_id = ParseOracle::max('oracle_id') ?? 0;

        dump($last_id);

        $rows = DB::connection('oracle')->table('inslab.centras_temp_migrate')
            ->select('*')
            //->where('f1', '>', $last_id)
            ->where('group_name', '=', "Отчет по ежедневным сборам")
            ->orWhere('group_name', '=', "Отчет по журналу выплат")
            ->orWhere('f19', '=', '1445781')
            ->orderBy('group_name')
            ->limit(2)
            ->get();

        dd($rows);

        foreach ($rows as $row){
            $p = new ParseOracle();
            $p->oracle_id = $row->f1;
            $p->CurrCode = $row->f8;
            $p->AmountP = $row->f10;
            $p->DSD = $row->f11;
            $p->rating = $row->f16;
            $p->DeptISN = $row->f19;
            $p->DeptName = $row->f20;
            $p->group_name = $row->group_name;

            $p->save();

            dump('Row saved');

        }
    }
}
