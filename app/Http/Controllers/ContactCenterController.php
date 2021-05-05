<?php
namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactCenterController extends Controller {

    public function index() {
        return view('contact-center.manager');
    }

    public function test(Request $request) {

        dd($request->labels);
    }
}
