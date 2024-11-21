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
        $firstName = $event->user->first_name;
        $lastName = $event->user->last_name;
        $biography = "{$firstName} {$lastName} is an enthusiastic individual with a passion for continuous learning and growth. With a strong commitment to excellence, they aim to bring creativity and dedication to everything they pursue. Whether collaborating on projects or exploring new opportunities, {$firstName} strives to make a positive impact and build meaningful connections along the way.";

        Profile::create([
            'user_id' => $event->user->id,
            'biography' => $biography,
        ]);

        Location::create([
            'user_id' => $event->user->id,
        ]);
    }
}
