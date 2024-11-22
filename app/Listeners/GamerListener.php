<?php

namespace App\Listeners;

use App\Events\MemberCreated;
use App\Models\ProfileManagement\Location;
use App\Models\ProfileManagement\Profile;
use App\Models\ProfileManagement\Wallet;

class GamerListener
{
    /**
     * Handle the event.
     *
     * @param MemberCreated $event
     * @return void
     */
    public function handle(MemberCreated $event)
    {
        $firstName = $event->member->firstname;
        $lastName = $event->member->lastname;
        $biography = "{$firstName} {$lastName} is an enthusiastic individual with a passion for continuous learning and growth. With a strong commitment to excellence, they aim to bring creativity and dedication to everything they pursue. Whether collaborating on projects or exploring new opportunities, {$firstName} strives to make a positive impact and build meaningful connections along the way.";

        Profile::create([
            'member_id' =>  $event->member->id,
            'biography' => $biography,
        ]);

        Location::create([
            'member_id' =>  $event->member->id,
        ]);

        Wallet::create([
            'member_id' =>  $event->member->id,
            'amount' => 0,
        ]);
    }
}

