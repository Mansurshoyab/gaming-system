<?php

namespace App\Http\Controllers\SystemConfiguration;

use App\Http\Controllers\Controller;
use App\Models\SystemConfiguration\System;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\Intl\Languages;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(System $system)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(System $system)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, System $system)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(System $system)
    {
        //
    }

    public function general(): Response {
        try {
            $timezones = DateTimeZone::listIdentifiers();
            $languages = Languages::getNames();
            return response()->view('backend.system-configuration.setup.index', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
