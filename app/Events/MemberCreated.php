<?php

namespace App\Events;

use App\Models\UserManagement\Member;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MemberCreated
{
    use Dispatchable, SerializesModels;

    public $member;

    public function __construct(Member $member)
    {
        $this->member = $member;
    }
}

