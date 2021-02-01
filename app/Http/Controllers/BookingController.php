<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use App\Booking;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Array_;

class BookingController extends Controller
{
    public function index()
    {
        $booking = Booking::orderBy('data', 'desc')
            ->take(100)
            ->get();

        if(!$booking->isEmpty())
        {
            $results = array();

            foreach ($booking as $book) {
                array_push($results, [
                    'author'      => $book->author,
                    'to'          => $this->convert($book->to),
                    'from'        => $book->from,
                    'title'       => $book->title,
                    'office'      => $book->office,
                    'description' => $book->description
                ]);
            }
        }
        else
            $results = array();

        dd($results);

        return view('booking')->with('booking', $booking);
    }
    public function convert($date) {
//        dd($date);
        $day = date('d', strtotime($date));
        $month = date('M', strtotime($date));
        $week = date('D', strtotime($date));
        $year = date('Y', strtotime($date));
//        dd($month);

//        dd($week);
        $weeks = array(
            'Mon' => 'Понедельник',
            'Tue' => 'Вторник',
            'Wed' => 'Среда',
            'Thu' => 'Четверг',
            'Fri' => 'Пятница',
            'Sat' => 'Суббота',
            'Sun' => 'Воскресенье'
        );

        $months = array(
            'Jan' => 'Январь',
            'Feb' => 'Февраль',
            'Mar' => 'Март',
            'Apr' => 'Апрель',
            'May' => 'Май',
            'Jun' => 'Июнь',
            'Jul' => 'Июль',
            'Aug' => 'Август',
            'Sep' => 'Сентябрь',
            'Oct' => 'Октябрь',
            'Nov' => 'Ноябрь',
            'Dec' => 'Декабрь'
        );

        return $weeks[$week] . ' ' . $day . ' ' . $months[$month] . ' ' . $year;
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
