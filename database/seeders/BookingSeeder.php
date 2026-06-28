<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\HomeList;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $customers = Customer::all();
        $homes     = HomeList::where('status', 'dijual')->take(5)->get();

        if ($customers->isEmpty() || $homes->isEmpty()) {
            return;
        }

        $statuses = ['pending', 'process', 'accept'];

        foreach ($homes as $i => $home) {
            $customer = $customers[$i % $customers->count()];
            Booking::firstOrCreate(
                ['home_id' => $home->id, 'customer_id' => $customer->id],
                ['status' => $statuses[$i % count($statuses)]]
            );
        }
    }
}
