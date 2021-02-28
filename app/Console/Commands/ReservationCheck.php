<?php

namespace App\Console\Commands;

use App\Models\Notification;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;





class ReservationCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reschk';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for all reservations and update if expired';

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
     * @return int
     */
    public function handle(Reservation $reservation, Notification $notification)
    {
        $reservations = $reservation->where('active', 0)->get();
        $today = Carbon::today();

        foreach ($reservations as $res) {
            if ($res->date_of_return <= $today ) {

                $notification = $res;

                DB::table('notifications')->insert([
                    'product_id' => $res->product_id,
                    'date_of_rent' => $res->date_of_rent,
                    'date_of_return' => $res->date_of_return,
                    'price' => $res->price,
                    'active' => 0,
                    'customer_id' => $res->customer_id,
                    'reservation_id' => $res->id
                ]);

                DB::table('products')
                ->where('id', $notification->product_id)
                ->update(['rented' => 0]);

                $res->update(['active' => 1]);


            }
        }


    }
}
