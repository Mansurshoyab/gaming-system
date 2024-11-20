<?php

namespace App\Http\Controllers\CompanySetup;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanySetup\CompanyRequest;
use App\Models\CompanySetup\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $company = Company::first();
            return response()->view('backend.company-setup.company.index', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    public function image()
    {
        try {
            $company = Company::first();
            return response()->view('backend.company-setup.company.image', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
    public function contact()
    {
        try {
            $company = Company::first();
            return response()->view('backend.company-setup.company.contact', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    public function updateContact(CompanyRequest $request , $id) 
    {
        try {
         $data = $request->validated();
         $company = Company::findOrFail($id);
         $company->update($data);
         return redirect()->route('company.index')->with('updated', 'Company contact updated successfully.');
     
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    public function social()
    {
        try {
            $company = Company::first();
            return response()->view('backend.company-setup.company.social', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
