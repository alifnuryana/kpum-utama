<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Organization;
use App\Models\Student;
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
            'listUKM' => $this->isHasUKM(),
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
            'listUKM' => $this->isHasUKM(),
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
            'listUKM' => $this->isHasUKM(),
        ]);
    }

    public function isHasUKM()
    {
        $student = collect(Student::with('major', 'votes')->where('npm', auth()->user()->npm)->get());
        $listUKM = explode('_', $student[0]->ukm);
        if ($student[0]->ukm == '') {
            $listUKM = [];
        }
        // foreach ($listUKM as $key => $UKM) {
        //     $listUKM[$key] = [
        //         'name' => $listUKM[$key],
        //         'active' => strtolower(str_replace(" ", "", $UKM)),
        //     ];
        // }
        // dd($listUKM);
        return $listUKM;
    }

    public function ukm($ukmName)
    {
        $isVoteUKM = false;
        $dataVoteUKM = Vote::with('team', 'student')->whereHas('student', function ($q) {
            $q->where('npm', auth()->user()->npm);
        })->get();
        foreach ($dataVoteUKM as $vote) {
            if ($vote->team->organization->slug == $ukmName) {
                $dataVoteUKM = $vote;
                $isVoteUKM = true;
                break;
            }
        }
        $organization = Organization::where('slug', '=', $ukmName)->get()->first();
        $organizationID = $organization->id;
        $organizationName = $organization->name;
        $candidates = Candidate::with('team', 'major')->whereHas('team', function ($q) use ($organizationID) {
            $q->where('organization_id', '=', $organizationID);
        })->orderBy('team_id', 'ASC')->get();
        $grouped = $candidates->mapToGroups(function ($item) {
            return [$item['team']['name'] => $item];
        });
        return view('dashboard.home', [
            'active' => $ukmName,
            'name' => $organizationName,
            'dataVoteUKM' => $dataVoteUKM,
            'isVoteUKM' => $isVoteUKM,
            'grouped' => $grouped,
            'listUKM' => $this->isHasUKM(),
        ]);
    }
}
