<?php

namespace Database\Seeders;

use App\Enums\GlobalUsage\Status;
use App\Models\GameManagement\Game;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::truncate();

        $games = [
            [ 'name' => 'Teen Patti', 'description' => 'A popular poker-style card game where players bet, bluff, and strategize. Ideal for quick rounds with friends or other players in a virtual casino setting.' ],
            [ 'name' => 'Ludo', 'description' => 'A classic board game where players race tokens to the finish, using dice rolls. Perfect for social, family-friendly multiplayer fun.' ],
            [ 'name' => 'Slot', 'description' => 'A virtual slot machine game where players spin reels to win prizes. Emulates real slot gameplay with themes, bonuses, and jackpots.' ],
            [ 'name' => 'Roulette', 'description' => 'Classic casino game where players bet on where the ball will land on the wheel. Realistic graphics and betting options recreate the excitement of a casino.' ],
            [ 'name' => 'Money Coming', 'description' => 'A slot game with big wins and jackpots. Players spin reels in a high-energy setting to bring in virtual winnings and bonus rounds.' ],
            [ 'name' => 'Seven Up Down', 'description' => 'A quick, luck-based game where players guess if the next roll will be higher or lower. Great for fast betting and simple, risk-taking gameplay.' ],
            [ 'name' => 'Crash', 'description' => 'A high-stakes prediction game where players cash out before a crash. The longer they wait, the higher the reward—if they time it right!' ],
            // [ 'name' => '', 'description' => '' ],
        ];

        foreach ($games as $key => $game) {
            $genre = match(true) {
                $key === 0 => 1,
                $key === 1 => 4,
                $key <= 4 => 2,
                $key <= 6 => 7,
                default => 10,
            };
            $game['genre_id'] = $genre;
            $game['thumbnail'] = null;
            $game['slug'] = Str::slug($game['name']);
            $game['status'] = Status::ENABLE;
            Game::create($game);
        }
    }
}
