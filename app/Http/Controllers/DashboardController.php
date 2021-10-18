<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Team;
use App\Models\Vote;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function mpm()
    {
        $isVoteMPM = false;
        // Cek apakah sudah memilih MPM
        $dataVoteMPM = Vote::with('team', 'student')->whereHas('student', function ($q) {
            $q->where('npm', auth()->user()->npm);
        })->get();
        foreach ($dataVoteMPM as $vote) {
            if ($vote->team->organization->name == 'MPM') {
                $dataVoteMPM = $vote;
                $isVoteMPM = true;
                break;
            }
        }
        return view('dashboard.home', [
            'active' => 'mpm',
            'dataVoteMPM' => $dataVoteMPM,
            'isVoteMPM' => $isVoteMPM,
            'candidates' => collect(Candidate::with(['major', 'team'])->whereHas('team', function ($q) {
                $q->where('name', 'like', '%mpm%');
            })->get()),
        ]);
    }

    public function presma()
    {
        $isVotePresma = false;
        $dataVotePresma = Vote::with('team', 'student')->whereHas('student', function ($q) {
            $q->where('npm', auth()->user()->npm);
        })->get();
        foreach ($dataVotePresma as $vote) {
            if ($vote->team->organization->name == 'Presma') {
                $dataVotePresma = $vote;
                $isVotePresma = true;
                break;
            }
        }
        $candidates = collect(Candidate::with('team', 'major')->whereHas('team', function ($q) {
            $q->where('name', 'like', '%presma%');
        })->orderBy('team_id', 'ASC')->get());
        $grouped = $candidates->mapToGroups(function ($item, $key) {
            return [$item['team']['name'] => $item];
        });
        return view('dashboard.home', [
            'active' => 'presma',
            'dataVotePresma' => $dataVotePresma,
            'isVotePresma' => $isVotePresma,
            'grouped' => $grouped,
        ]);
    }

    public function senat()
    {
        $isVoteSenat = false;
        $dataVoteSenat = Vote::with('team', 'student')->whereHas('student', function ($q) {
            $q->where('npm', auth()->user()->npm);
        })->get();
        foreach ($dataVoteSenat as $vote) {
            if ($vote->team->organization->name == 'Senat') {
                $dataVoteSenat = $vote;
                $isVoteSenat = true;
                break;
            }
        }
        $candidates = collect(Candidate::with('team', 'major')->whereHas('team', function ($q) {
            $q->where('name', 'like', '%' . auth()->user()->major->faculty->name . '%');
        })->orderBy('team_id', 'ASC')->get());
        $grouped = $candidates->mapToGroups(function ($item, $key) {
            return [$item['team']['name'] => $item];
        });
        return view('dashboard.home', [
            'active' => 'senat',
            'dataVoteSenat' => $dataVoteSenat,
            'isVoteSenat' => $isVoteSenat,
            'grouped' => $grouped,
        ]);
    }
}
