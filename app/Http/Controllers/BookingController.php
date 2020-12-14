<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use App\Booking;
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
        $req['data']['id'] = $booking->id;
        $req['data']['author'] = Auth::user()->ISN;
        $booking->data = json_encode($req);
        $booking->author = Auth::user()->ISN;
        $booking->to = date('Y-m-d H:i:s', strtotime($req['to']));
        $booking->from = date('Y-m-d H:i:s', strtotime($req['from']));
        $booking->title = $req['data']['title'];
        $booking->office = $req['data']['office'];
        $booking->description = $req['data']['description'];
        if(!$booking->save()){
            response()->json(['success'=>false]);
        }
        return response()->json(['success'=>true, 'data' => $booking]);
    }
    public function delete(Request $request){
        if($request['data']['author']!== Auth::user()->ISN) {
            return response()->json(['success'=>false, 'message'=>'Невозможно удалить!']);
        }
        Booking::where('id', ($request['data']['id']))->delete();
        return response()->json(['success'=>true ]);
    }
}