<?php

namespace Database\Seeders;

use App\Enums\GlobalUsage\Status;
use App\Models\SystemConfiguration\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Province::truncate();

        $csvPath = Storage::disk('private')->path('locations/states.csv');

        if (!Storage::disk('private')->exists('locations/states.csv')) {
            $this->command->error("CSV file not found at path: $csvPath");
            return;
        }

        $batchSize = 500;
        $provincesData = [];

        if (($file = fopen($csvPath, 'r')) !== false) {
            fgetcsv($file);

            while (($data = fgetcsv($file)) !== false) {
                $provincesData[] = [
                    'country_id' => $data[2],
                    'name'       => $data[1],
                    'status'     => Status::ENABLE,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                if (count($provincesData) === $batchSize) {
                    Province::insert($provincesData);
                    $provincesData = [];
                }
            }

            if (count($provincesData) > 0) {
                Province::insert($provincesData);
            }

            fclose($file);
        }
    }
}
