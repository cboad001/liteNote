<?php

namespace App\Policies;

use App\Http\Controllers\NoteController;
use App\Models\User;

class NoteClassPolicy
{
    /**
     * Create a new policy instance.
     */
//    checks if the notes belongs to the logged in user
//    public function delete(User $user, NoteController $noteController){
//        return $user->id === $noteController->user_id();
//    }
}
