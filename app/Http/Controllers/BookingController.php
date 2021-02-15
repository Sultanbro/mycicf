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
        $booking = Booking::orderBy('from', 'desc')
            ->take(100)
            ->get();
        return view('booking', compact('booking'));
    }
    public function set(Request $request) {
        $success = true;
        $booking = new Booking();
        $req = $request['payload'];
        $office = $req['data']['office'];
        $from = date('Y-m-d H:i:s', strtotime($req['from']));
        $to = date('Y-m-d H:i:s', strtotime($req['to']));
        $notFree['status'] = false;
        $records = Booking::where('office',$office)
            ->whereBetween('from', array(date('Y-m-d',strtotime($req['from'])).' 00:00:01', date('Y-m-d',strtotime($req['to'])).' 23:59:59'))
            ->get();

        if($records){
            foreach($records as $recod){
                if(strtotime($from) >= strtotime($recod->from) && strtotime($from) <= strtotime($recod->to)){
                    $notFree['status'] = true;
                    $notFree['data'] = $recod;
                } elseif(strtotime($to) >= strtotime($recod->from) && strtotime($to) <= strtotime($recod->to)){
                    $notFree['status'] = true;
                    $notFree['data'] = $recod;
                }
            }
        }
        if($notFree['status']){
            $success = false;
            $error = 'Зал уже занят на это время.Забронировал '.$notFree['data']['title'];
        } else {
            $req['data']['id'] = $booking->id;
            $req['data']['author'] = Auth::user()->ISN;
            $booking->data = json_encode($req);
            $booking->author = Auth::user()->ISN;
            $booking->to = $to;
            $booking->from = $from;
            $booking->title = $req['data']['title'];
            $booking->office = $office;
            $booking->description = $req['data']['description'];
            if(!$booking->save()){
                response()->json(['success'=>false]);
            }
        }
        return response()->json(['success'=>$success, 'data' => $booking, 'error' => isset($error) ? $error : '']);
    }
    public function delete(Request $request){
        if($request['data']['author']!== Auth::user()->ISN) {
            return response()->json(['success'=>false, 'message'=>'Невозможно удалить!']);
        }
        Booking::where('id', ($request['data']['id']))->delete();
        return response()->json(['success'=>true ]);
    }
}