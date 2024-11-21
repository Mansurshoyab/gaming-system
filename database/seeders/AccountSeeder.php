<?php

namespace Database\Seeders;

use App\Enums\GlobalUsage\Status;
use App\Models\FinanceManagement\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::truncate();

        $accounts = [
            [ 'acc_name' => 'Bank' ],
            [ 'acc_name' => 'Bkash' ],
            [ 'acc_name' => 'Nagad' ],
            [ 'acc_name' => 'Rocket' ],
            [ 'acc_name' => 'Upay' ],
            // [ 'acc_name' => '' ],
        ];

        foreach ($accounts as $key => $account) {
            $account['acc_code'] = 'ACC00' . (0 + $key);
            $account['acc_no'] = $key === 0 ? '1234567890' : ('0123456789' . 0 + $key);
            $account['status'] = Status::ENABLE;
            Account::create($account);
        }
    }
}
