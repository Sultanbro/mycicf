<?php

namespace App\Http\Controllers;

use App\InsProduct;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index($id = 1){
        $data = InsProduct::findOrFail($id);
        $consturction = json_decode($data->construction);
        return view('product', compact('data'), compact('consturction'));
    }
}
