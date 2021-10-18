<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function mpm()
    {
        Vote::create([
            'student_id' => auth()->user()->id,
            'team_id' => request()->vote,
        ]);
        Team::find(request()->vote)->increment('votes');
        return redirect(route('dashboard.mpm'));
    }

    public function presma()
    {
        Vote::create([
            'student_id' => auth()->user()->id,
            'team_id' => request()->vote,
        ]);
        Team::find(request()->vote)->increment('votes');
        return redirect(route('dashboard.presma'));
    }

    public function senat()
    {
        Vote::create([
            'student_id' => auth()->user()->id,
            'team_id' => request()->vote,
        ]);
        Team::find(request()->vote)->increment('votes');
        return redirect(route('dashboard.senat'));
    }
}
