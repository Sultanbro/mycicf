<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MotivationController extends Controller
{
    public function motivation() {
        return view('motivation_main');
    }
}
