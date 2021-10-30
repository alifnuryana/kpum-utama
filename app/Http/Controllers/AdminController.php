<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Organization;
use App\Models\Student;
use App\Models\Team;
use App\Models\Vote;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // dd(count(Vote::with(['student', 'team'])->get()));
        return view('dashboard.admin.home', [
            'active' => 'home',
            'votes' => Vote::with(['student', 'team'])->get()->take(50),
            'candidates' => Candidate::get(),
            'students' => Student::get(),
        ]);
    }

    public function cekSuara($organizationID)
    {
        $dataOrganization = Organization::where('id', '=', $organizationID)->get()->first();
        if ($dataOrganization->name == 'MPM' || $dataOrganization->name == 'Senat' || $dataOrganization->name == 'Presma') {
            $studentCount = count(Student::with(['major'])->get());
            $studentVotesCount = count(Vote::with(['team', 'student'])->whereHas('team', function ($q) use ($organizationID) {
                $q->where('organization_id', '=', $organizationID);
            })->get());
            $result = $studentVotesCount / $studentCount * 100;
            if ($result == null) {
                $result = 0;
            }
            return $result;
        } else {
            $studentCount = count(Student::where('ukm', 'like', '%' . $dataOrganization->name . '%')->get());
            $studentVotesCount = count(Vote::with(['team', 'student'])->whereHas('team', function ($q) use ($organizationID) {
                $q->where('organization_id', '=', $organizationID);
            })->get());
            if ($studentCount == 0) {
                return 0;
            }
            $result = $studentVotesCount / $studentCount * 100;
            if ($result == null) {
                $result = 0;
            }
            return $result;
        }
    }

    public function hasilAll()
    {
        $listOrganization = Organization::get();
        $votes = Vote::with(['team', 'student'])->get();
        $dataSuara = [];
        foreach ($listOrganization as $organization) {
            $dataSuara[$organization->name] = $this->cekSuara($organization->id);
        }
        return view('dashboard.admin.quickcount.index', [
            'active' => 'quickcount',
            'listOrganization' => $listOrganization,
            'votes' => $votes,
            'dataSuara' => $dataSuara,
        ]);
    }

    public function hasil($slug)
    {
        $data = Team::with('organization')->whereHas('organization', function ($q) use ($slug) {
            $q->where('name', 'like', '%' . $slug . '%');
        })->get();
        $names = [];
        foreach ($data as $team) {
            $names[] = $team->name;
        }
        $votes = [];
        foreach ($data as $vote) {
            $votes[] = $vote->votes;
        }
        return view('dashboard.admin.quickcount.show', [
            'active' => 'quickcount',
            'name' => $slug,
            'teams' => json_encode($names),
            'votes' => json_encode($votes),
        ]);
    }
}
