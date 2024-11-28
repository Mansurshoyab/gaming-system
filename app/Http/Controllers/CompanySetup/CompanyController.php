<?php

namespace App\Http\Controllers\CompanySetup;

use App\Http\Controllers\Controller; // Base Controller
use App\Http\Requests\CompanySetup\CompanyRequest; // Custom Request for validation
use App\Models\CompanySetup\Company; // Company model
use Illuminate\Http\Request; // Default Request class
use Illuminate\Support\Facades\Storage; // For file storage operations


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

    public function indexUpdate(CompanyRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $company = Company::findOrFail($id);
            $company->update($data);
            return redirect()->route('company.index')->with('updated', 'Company Home Updated successfully.');
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

    public function imageUpdate(CompanyRequest $request, $id)
    {
        try {
            // Find the company
            $company = Company::first();

            if ($request->hasFile('logo')) {
                if ($company->logo && Storage::disk('public')->exists('company/' . $company->logo)) {
                    Storage::disk('public')->delete('company/' . $company->logo);
                }
                $fileName = 'logo' . '.' . $request->file('logo')->getClientOriginalExtension();
                $request->file('logo')->storeAs('company', $fileName, 'public');
                $company->update([
                    'logo' => $fileName,
                ]);
                return back()->with('updated', 'Logo update successfull!');
            } else {
                throw new \Exception('No screenshot uploaded.');
            }

            if ($request->hasFile('favicon')) {
                if ($company->logo && Storage::disk('public')->exists('company/' . $company->favicon)) {
                    Storage::disk('public')->delete('company/' . $company->favicon);
                }
                $faviconName = $request->file('favicon')->getClientOriginalName();
                $request->file('favicon')->storeAs('company', $faviconName, 'public');
                $company->favicon = $faviconName;
                $company->update([
                    'favicon' => $faviconName,
                ]);
                return back()->with('updated', 'Favicon update successfull!');
            }



            // Save the updated data
            $company->save();

            return redirect()->route('company.index')->with('updated', 'Company images updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors('Error: ' . $e->getMessage());
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

    public function updateContact(CompanyRequest $request, $id)
    {
        try {

            $data = $request->validated();
            $company = Company::findOrFail($id);
            // dd($company);
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
