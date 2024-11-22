<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Models\ProfileManagement\Location;
use App\Models\ProfileManagement\Profile;

class AdminListener
{
    /**
     * Handle the event.
     *
     * @param UserCreated $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $firstName = $event->user->firstname;
        $lastName = $event->user->lastname;
        $biography = "{$firstName} {$lastName} is an enthusiastic individual with a passion for continuous learning and growth. With a strong commitment to excellence, they aim to bring creativity and dedication to everything they pursue.";

        Profile::create([
            'user_id' => $event->user->id,
            'biography' => $biography,
        ]);

        Location::create([
            'user_id' => $event->user->id,
        ]);
    }
}
