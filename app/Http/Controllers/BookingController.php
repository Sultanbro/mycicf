<?php

namespace App\Http\Controllers;


use App\Booking;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $booking = Booking::orderBy('data', 'desc')
            ->take(100)
            ->get();
        return view('booking', compact('booking'));
    }
    public function set(Request $request) {
        $booking = new Booking();
        $booking->data = json_encode($request['payload']);
        $booking->author = Auth::user()->ISN;
        if(!$booking->save()){
            response()->json(['success'=>false]);
        }
        return response()->json(['success'=>true]);
    }
}