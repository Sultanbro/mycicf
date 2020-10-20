<?php

namespace App\Exports;

use App\User;
use App\Centcoin;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CentcointExports implements FromView
{
    public function view(): View
    {
        return view('exports.centcoins', [
            'centcoins' => Centcoin::orderBy('centcoins','desc')->get()
        ]);
    }
}