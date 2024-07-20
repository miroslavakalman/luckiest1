<?php

namespace App\Policies;

use App\Models\Mood;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoodPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the mood.
     */
    public function view(User $user, Mood $mood)
    {
        return $user->id === $mood->user_id;
    }

    /**
     * Determine whether the user can update the mood.
     */
    public function update(User $user, Mood $mood)
    {
        return $user->id === $mood->user_id;
    }

    /**
     * Determine whether the user can delete the mood.
     */
    public function delete(User $user, Mood $mood)
    {
        return $user->id === $mood->user_id;
    }
}
