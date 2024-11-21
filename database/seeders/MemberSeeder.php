<?php

namespace Database\Seeders;

use App\Enums\UserManagement\Approval;
use App\Enums\UserManagement\Source;
use App\Events\MemberCreated;
use App\Models\UserManagement\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Member::truncate();

        $members = [
            [ 'firstname' => 'Casino', 'lastname' => 'King' ],
            [ 'firstname' => 'Uthoai', 'lastname' => 'Marma' ],
            [ 'firstname' => 'Shawon', 'lastname' => 'Khan' ],
            [ 'firstname' => 'Shoiab', 'lastname' => 'Mahmud' ],
            // [ 'firstname' => '', 'lastname' => '' ],
        ];

        foreach ($members as $key => $member) {
            $member['username'] = strtolower($member['firstname'] . '.' . $member['lastname']);
            $member['email'] = $key === 0 ? 'king@casino.com' : strtolower($member['firstname']) . '@example.com';
            $member['email_verified_at'] = now();
            $member['phone'] = '+8801234567' . (890 + $key);
            $member['phone_verified_at'] = now();
            $member['password'] = Hash::make('12345678');
            $member['status'] = Approval::APPROVED;
            $member['verified'] = true;
            $member['source'] = Source::INSTALL;
            $newMember = Member::create($member);

            event(new MemberCreated($newMember));
        }
    }
}
