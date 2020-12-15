<?php

namespace App\Console\Commands;

use App\Booking;
use Illuminate\Console\Command;

class parseBookingDataToColumns extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $bookings = Booking::whereNull('to')
            ->whereNotNull('data')
            ->get();
        $size = sizeof($bookings);
        $this->line("Founded $size rows");
        $success = 0;
        $error = 0;
        foreach ($bookings as $booking){
            try{
                $data = json_decode($booking->data);
                $booking->to = date('Y-m-d H:i:s', strtotime($data->to));
                $booking->from = date('Y-m-d H:i:s', strtotime($data->from));
                $booking->title = $data->data->title;
                $booking->office = $data->data->office;
                $booking->description = $data->data->description ?? null;
                $booking->author = $data->author;
                $booking->save();
                $this->info("{$booking->id} updated successfully");
                $success++;
            }catch (\Exception $ex){
                $this->error("Error on update {$booking->id}. ".$ex->getMessage());
                $error++;
            }
        }
        $this->info('Finished');
        $this->info("Success : {$success}");
        $this->error("Error : {$error}");
    }
}
