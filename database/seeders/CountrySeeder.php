<?php

namespace Database\Seeders;

use App\Enums\GlobalUsage\Status;
use App\Models\SystemConfiguration\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::truncate();

        $csvPath = Storage::disk('private')->path('locations/countries.csv');

        if (!Storage::disk('private')->exists('locations/countries.csv')) {
            $this->command->error("CSV file not found at path: $csvPath");
            return;
        }

        $batchSize = 50;
        $countriesData = [];

        if (($file = fopen($csvPath, 'r')) !== false) {
            fgetcsv($file);

            while (($data = fgetcsv($file)) !== false) {
                $countriesData[] = [
                    'name'       => $data[1],
                    'iso3'       => $data[2],
                    'iso2'       => $data[3],
                    'phone_code' => $data[5],
                    'status'     => Status::ENABLE,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                if (count($countriesData) === $batchSize) {
                    Country::insert($countriesData);
                    $countriesData = [];
                }
            }

            if (count($countriesData) > 0) {
                Country::insert($countriesData);
            }

            fclose($file);
        }
    }
}
