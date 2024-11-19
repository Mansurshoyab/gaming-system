<?php

namespace App\Http\Controllers\GameManagement;

use App\Enums\GlobalUsage\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\GameManagement\GenreRequest;
use App\Models\GameManagement\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $genres = Genre::orderBy('created_at' , 'DESC')->get();
            return response()->view('backend.game-management.genre.index', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $status = Status::fetch();
            return response()->view('backend.game-management.genre.create', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenreRequest $request)
    {
        try {
            $data = $request->validated();
            Genre::create($data);
            return redirect()->route('genre.index')->with('created', 'Genre created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        try {
            $status = Status::fetch();
            return response()->view('backend.game-management.genre.edit', get_defined_vars());
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenreRequest $request, Genre $genre)
    {
        try {
            $data = $request->validated();
            $genre->update($data);
            return redirect()->route('genre.index')->with('updated', 'Genre updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        //
    }
}
