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
        $req = $request['payload'];
        $booking->data = json_encode($req);
        if(!$booking->save()){
            response()->json(['success'=>false]);
        }
        $req['data']['id'] = $booking->id;
        $req['data']['author'] = Auth::user()->ISN;
        $booking->data = json_encode($req);
        $booking->save();
        return response()->json(['success'=>true, 'data' => $booking]);
    }
    public function delete(Request $request) {
        $booking = Booking::where('id', ($request['data']['id']))->delete();
        return response()->json(['success'=>true ]);
    }
}