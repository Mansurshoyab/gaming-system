<?php

namespace Database\Seeders;

use App\Enums\GlobalUsage\Status;
use App\Models\ProfileManagement\Avatar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Avatar::truncate();

        $title = "Avatar";

        for ($i = 1; $i <= 10; $i++) {
            Avatar::create([
                'image' => strtolower($title) . '-' . $i . '.png',
                'title' => $title . ' ' . $i,
                'note' => $i <= 6
                    ? 'This is a male avatar designed for profile customization.'
                    : 'This is a female avatar designed for profile customization.',
                'gender' => $i <= 6 ? 'male' : 'female',
                'status' => Status::ENABLE
            ]);
        }
    }
}
