<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\PageViewLog;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageViewLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $startDate = Carbon::now()->subMonths(6);
        $endDate = Carbon::now();
        $url = 'https://example.com/product/' . rand(1, 1000);
        // Generate 5000 page views for each day in the given date range
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            for ($i = 0; $i < 5000; $i++) {
                PageViewLog::create([
                    'user_id' => rand(0, 1) ? null : rand(1, 100), // Randomly assign user_id
                    'created_at' => $date,
                    'url' => $url,
                ]);
            }
        }
    }
}
