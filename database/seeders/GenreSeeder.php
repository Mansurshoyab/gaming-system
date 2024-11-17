<?php

namespace Database\Seeders;

use App\Enums\GlobalUsage\Status;
use App\Models\GameManagement\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::truncate();

        $genres = [
            ['title' => 'Card', 'description' => 'Games focused on skill, strategy, or luck using cards, like poker or solitaire.'],
            ['title' => 'Casino', 'description' => 'Games simulating casino experiences, including slots, poker, and roulette, often with betting elements.'],
            ['title' => 'Multiplayer', 'description' => 'Games designed for interaction with other players, either competitively or cooperatively.'],
            ['title' => 'Board', 'description' => 'Digital versions of traditional board games like chess or Ludo, emphasizing turn-based, strategic play.'],
            ['title' => 'Casual', 'description' => 'Easy-to-learn games with simple mechanics, ideal for short sessions and broad appeal.'],
            ['title' => 'Simulation', 'description' => 'Games that replicate real-life activities or environments, offering an immersive, realistic experience.'],
            ['title' => 'Gambling', 'description' => 'Games of chance involving bets or stakes, designed for thrill and risk.'],
            ['title' => 'Prediction', 'description' => 'Games focused on guessing or forecasting outcomes, relying on probability and timing.'],
            ['title' => 'Table', 'description' => 'Classic casino-style table games, like blackjack or roulette, often focused on betting and odds.'],
            ['title' => 'Others', 'description' => 'Games that do not fit into a specific genre but offer unique or experimental gameplay experiences.'],
        ];

        foreach ($genres as $key => $genre) {
            $genre['slug'] = Str::slug($genre['title']);
            $genre['status'] = Status::ENABLE;
            Genre::create($genre);
        }
    }
}
