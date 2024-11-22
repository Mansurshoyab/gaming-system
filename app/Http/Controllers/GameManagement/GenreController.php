<?php

namespace App\Http\Controllers\GameManagement;

use App\Enums\GlobalUsage\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\GameManagement\GenreRequest;
use App\Models\GameManagement\Genre;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        try {
            $genres = Genre::orderBy('created_at' , 'DESC')->get();
            $total = Genre::withTrashed()->count();
            return response()->view('backend.game-management.genres.index', get_defined_vars());
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
            return response()->view('backend.game-management.genres.create', get_defined_vars());
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
    public function show(Genre $genre): JsonResponse
    {
        try {
            return response()->json($genre);
        } catch (\Exception $e) {
            return back()->json(['error', 'Failed to display genre', $e->getMessage()], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        try {
            $status = Status::fetch();
            return response()->view('backend.game-management.genres.edit', get_defined_vars());
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
            $data['updated_at'] = now();
            $genre->update($data);
            return redirect()->route('genre.index')->with('updated', 'Genre updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre): JsonResponse
    {
        try {
            $deleted = $genre->delete();
            if ($deleted) {
                return response()->json(['success' => true, 'message' => 'Genre moved to trash!'], 200);
            } else {
                return response()->json(['success' => true, 'message' => 'No genre has deleted.'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred!'], 500);
        }
    }

    /**
     * Change status of the specified resource from storage.
     */
    public function status(Request $request) {
        try {
            $id = $request->input('id');
            $status = $request->input('status');
            if (!in_array($status, [Status::ENABLE, Status::DISABLE])) {
                return response()->json(['error' => 'Invalid status value'], 401);
            }
            $genre = Genre::find($id);
            if (!$genre) {
                return response()->json(['error' => 'Genre not found'], 404);
            }
            $updated = $genre->update(['status' => $status, 'updated_at' => now()]);
            if ($updated) {
                return response()->json(['success' => true, 'message' => 'Genre status changed!'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'No record updated!'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to change genre status'], 500);
        }
    }
}
