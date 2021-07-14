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

/*        $rows = DB::connection('oracle')->table('inslab.centras_temp_migrate')
            ->select('f8','f10','f11','f16','f19','f20', 'group_name')
            ->where('group_name', '=', "Отчет по ежедневным сборам")
            ->orderBy('group_name')
            ->limit(1)
            ->get();

        foreach ($rows as $row){
            $p = new ParseOracle();
            $p->CurrCode = $row->f8;
            $p->AmountP = $row->f10;
            $p->DSD = $row->f11;
            $p->rating = $row->f16;
            $p->DeptISN = $row->f19;
            $p->DeptName = $row->f20;
            $p->group_name = $row->group_name;

            $p->save();

        }*/
    }
}
