<?php

namespace Database\Seeders;

use App\Enums\GlobalUsage\Status;
use App\Models\SystemConfiguration\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::truncate();

        $csvPath = Storage::disk('private')->path('locations/cities.csv');

        if (!Storage::disk('private')->exists('locations/cities.csv')) {
            $this->command->error("CSV file not found at path: $csvPath");
            return;
        }

        if (($file = fopen($csvPath, 'r')) !== false) {
            fgetcsv($file);

            $batchSize = 1000;
            $dataBatch = [];

            while (($data = fgetcsv($file)) !== false) {
                $dataBatch[] = [
                    'country_id'   => $data[5],
                    'province_id'     => $data[2],
                    'name'         => $data[1],
                    'status'       => Status::ENABLE,
                ];

                if (count($dataBatch) >= $batchSize) {
                    DB::table('cities')->insert($dataBatch);
                    $dataBatch = [];
                }
            }

            if (!empty($dataBatch)) {
                DB::table('cities')->insert($dataBatch);
            }

            fclose($file);
        }
    }
}
