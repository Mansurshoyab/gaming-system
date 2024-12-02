<?php

namespace App\Http\Controllers\ProfileManagement;

use App\Enums\GlobalUsage\Status;
use App\Http\Controllers\Controller;
use App\Models\GameManagement\Bet;
use App\Models\GameManagement\Game;
use App\Models\GameManagement\Genre;
use App\Models\UserManagement\Member;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        try {
            $widgets = $this->defaultWidgets();
            return response()->view('backend.dashboard', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    public function dashboard(): Response
    {
        try {
            $games = Game::with('contests')->where('status', Status::ENABLE)->get();
            $widgets = $this->gameWidgets();
            return response()->view('backend.game', get_defined_vars());
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
    public function show()
    {
        try {
            $user = User::with(['profile'])->where('id', Auth::user()->id)->first();
            return response()->view('backend.profile-management.profile.show', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function defaultWidgets()
    {
        return [
            ['icon' => 'coins', 'theme' => 'success', 'label' => 'Today Deposit', 'href' => null, 'data' => 0],
            ['icon' => 'coins', 'theme' => 'success', 'label' => 'Total Deposit', 'href' => null, 'data' => 0],
            ['icon' => 'coins', 'theme' => 'info', 'label' => 'Today Withdraw', 'href' => null, 'data' => 0],
            ['icon' => 'coins', 'theme' => 'info', 'label' => 'Total Withdraw', 'href' => null, 'data' => 0],
            ['icon' => 'ticket-alt', 'theme' => 'warning', 'label' => 'Support Tickets', 'href' => null, 'data' => 0],
            ['icon' => 'users', 'theme' => 'primary', 'label' => 'Today Members', 'href' => route('members.today'), 'data' => Member::withTrashed()->whereDate('created_at', today())->count()],
            ['icon' => 'users', 'theme' => 'primary', 'label' => 'Total Members', 'href' => route('members.index'), 'data' => Member::withTrashed()->count()],
            ['icon' => 'users-cog', 'theme' => 'danger', 'label' => 'Admin Users', 'href' => route('users.index'), 'data' => User::withTrashed()->count()],
            // [ 'icon' => '', 'theme' => '', 'label' => '', 'href' => null, 'data' => 0 ],
        ];
    }

    private function gameWidgets()
    {
        return [
            ['icon' => 'code-branch', 'theme' => 'warning', 'label' => 'Game Genres', 'href' => route('games.index'), 'data' => Genre::count()],
            ['icon' => 'gamepad', 'theme' => 'success', 'label' => 'Games', 'href' => route('games.index'), 'data' => Game::count()],
            ['icon' => '', 'theme' => '', 'label' => 'Today Matches', 'href' => null, 'data' => 0],
            ['icon' => '', 'theme' => '', 'label' => 'Total Matches', 'href' => null, 'data' => 0],
            ['icon' => '', 'theme' => '', 'label' => 'Today Rounds', 'href' => null, 'data' => 0],
            ['icon' => '', 'theme' => '', 'label' => 'Total Rounds', 'href' => null, 'data' => 0],
            ['icon' => 'coins', 'theme' => 'primary', 'label' => 'Today Bets', 'href' => null, 'data' => Bet::whereDate('created_at', today())->sum('amount')],
            ['icon' => 'coins', 'theme' => 'primary', 'label' => 'Total Bets', 'href' => null, 'data' => Bet::sum('amount')],
        ];
    }
}
