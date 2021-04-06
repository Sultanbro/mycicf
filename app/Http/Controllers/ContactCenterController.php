<?php
namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

class ContactCenterController extends Controller {

    public function index() {
        return view('contact-center.manager');
    }
}
