<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Centcoin;
use App\CentcoinHistory;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function getInfo(Request $request){

        $coins = Centcoin::where('user_isn', $request->isn)->first();

        return response()->json([
            'coins' => $coins->centcoins,
            'coins_history' => json_encode($coins->fullInfo),
        ]);
    }

    public function getBookingData(Request $request){
        $dateStart = date('Y-m-d 00:00:00', strtotime($request->dateStart));
        $dateEnd = date('Y-m-d 23:59:59', strtotime($request->dateEnd));
        $office = $request->office;
        $bookings = Booking::whereBetween('to', [$dateStart, $dateEnd])
                    ->where('office', $office)
                    ->get();
        $result = [];
        foreach ($bookings as $booking){
            if(!isset($result[$booking->office])){
                $result[$booking->office] = [];
            }
            if(!isset($result[$booking->office][date('d.m.Y', strtotime($booking->to))])){
                $result[$booking->office][date('d.m.Y', strtotime($booking->to))] = [];
            }
            array_push($result[$booking->office][date('d.m.Y', strtotime($booking->to))], [
                'id' => $booking->id,
                'to' => $booking->to,
                'from' => $booking->from,
                'author' => $booking->author,
                'office' => $booking->office,
                'title' => $booking->title,
                'description' => $booking->description
            ]);
        }
        return $result;
    }

    public function addBookingData(Request $request){
        try{
            $booking = new Booking();
            $booking->author = $request->author;
            $booking->to = date('Y-m-d H:i:s', strtotime($request->to));
            $booking->from = date('Y-m-d H:i:s', strtotime($request->from));
            $booking->title = $request->title;
            $booking->office = $request->office;
            $booking->description = null;
            $booking->createData();
            $booking->save();
            return response()->json([
                'success' => true
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'success' => false,
                'error' => (string)$exception->getMessage()
            ]);
        }
    }

    public function deleteBookingData(Request $request){
        $booking = Booking::where('id', $request->id)
                    ->first();
        if($booking != null) {
            if($booking->author = $request->author){
                try{
                    $booking->delete();
                    return response()->json([
                        'success' => true,
                    ]);
                }catch (\Exception $exception){
                    return response()->json([
                        'success' => false,
                        'error' => (string)$exception->getMessage(),
                        'code' => 500
                    ]);
                }
            }else{
                return response()->json([
                    'success' => false,
                    'code' => 403
                ]);
            }
        }else{
            return response()->json([
                'success' => false,
                'code' => 404
            ]);
        }
    }

    public function getBookingOfficeList(){
        return response()->json([
            'reception' => 'Приемная 2-этаж',
            'conf' => 'Конференц-зал (6-этаж)',
            'drr' => 'ДРР 2-этаж',
            'dsv' => 'ДСВ 1-этаж',
            'dps' => 'ДПС 1-этаж',
        ]);
    }
}
