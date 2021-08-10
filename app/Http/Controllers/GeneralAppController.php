<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralAppController extends Controller
{
    public function index() {
        return view('generalApp.General-app');
    }
    public function create() {
        return view('generalApp.creatGeneralApp');
    }
}
