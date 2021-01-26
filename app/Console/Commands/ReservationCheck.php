<?php

namespace App\Console\Commands;

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
    public function handle(Reservation $reservation)
    {
        $reservations = $reservation->where('active', 0)->get();
        $today = Carbon::today();
        $notifications = [];

        foreach ($reservations as $res) {
            if ($res->date_of_return <= $today ) {

                $notifications[] = $res->id;

                $string_notifications = implode(",", $notifications);

                $res->update(['active' => 1]);

                $notifications = [];

                DB::table('notifications')->insert([
                    'notifications' => $string_notifications
                ]);

                $notfs = explode("," , $string_notifications);
                    
            
            }
        }


    }
}
