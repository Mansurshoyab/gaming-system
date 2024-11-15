<?php

namespace Database\Seeders;

use App\Enums\UserManagement\Approval;
use App\Enums\UserManagement\Source;
use App\Models\UserManagement\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        $users = [
            [ 'firstname' => 'Casino', 'lastname' => 'King' ],
            [ 'firstname' => 'Shawon', 'lastname' => 'Khan' ],
            [ 'firstname' => 'Shoaib', 'lastname' => 'Mahmud' ],
            // [ 'firstname' => '', 'lastname' => '' ],
        ];

        foreach ($users as $key => $user) {
            $user['username'] = strtolower($user['firstname'] . '.' . $user['lastname']);
            $user['email'] = $key === 0 ? 'king@casino.com' : (strtolower($user['firstname']) . '@example.com');
            $user['email_verified_at'] = now();
            $user['phone'] = '+8801234567' . (890 + $key);
            $user['phone_verified_at'] = now();
            $user['password'] = Hash::make('12345678');
            $user['role_id'] = 1;
            $user['status'] = Approval::APPROVED;
            $user['verified'] = true;
            $user['source'] = Source::INSTALL;
            User::create($user);
        }
    }
}
