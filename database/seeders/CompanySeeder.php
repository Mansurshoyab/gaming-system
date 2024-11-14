<?php

namespace Database\Seeders;

use App\Models\CompanySetup\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::truncate();

        $company = Company::first();

        if ( !$company ) {
            $company = new Company();
        }

        $company->name = config('company.name');
        $company->tagline = config('company.tagline');
        $company->description = config('company.description');
        $company->estd_date = config('company.estd_date');
        $company->email = config('company.email');
        $company->phone = config('company.phone');
        $company->hotline = config('company.hotline');
        $company->logo = config('company.logo');
        $company->favicon = config('company.favicon');
        $company->screenshot = null;
        $company->social_media = null;
        $company->save();
    }
}
