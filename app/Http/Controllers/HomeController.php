<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use App\Models\Candidate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'active' => 'home',
            'timelines' => Timeline::all(),
        ]);
    }

    public function mpm()
    {
        return view('home', [
            'active' => 'mpm',
            'candidates' => collect(Candidate::with('team', 'major')->whereHas('team', function ($q) {
                $q->where('name', 'like', '%mpm%');
            })->get()),
        ]);
    }

    public function presma()
    {
        $candidates = collect(Candidate::with('team', 'major')->whereHas('team', function ($q) {
            $q->where('name', 'like', '%presma%');
        })->orderBy('team_id', 'ASC')->get());
        $grouped = $candidates->mapToGroups(function ($item, $key) {
            return [$item['team']['name'] => $item];
        });

        return view('home', [
            'active' => 'presma',
            'grouped' => $grouped,
        ]);
    }

    public function senat()
    {
        $candidates = collect(Candidate::with('team', 'major')->whereHas('team', function ($q) {
            $q->where('name', 'like', '%senat%');
        })->orderBy('team_id', 'ASC')->get());
        $grouped = $candidates->mapToGroups(function ($item, $key) {
            return [$item['team']['name'] => $item];
        });


        return view('home', [
            'active' => 'senat',
            'grouped' => $grouped,
        ]);
    }

    public function ukm()
    {
        $candidates = collect(Candidate::with('team', 'major')->whereHas('team', function ($q) {
            $q->where('name', 'not like', '%mpm%')->where('name', 'not like', '%presma%')->where('name', 'not like', '%senat%');
        })->orderBy('team_id', 'ASC')->get());
        $grouped = $candidates->mapToGroups(function ($item, $key) {
            return [$item['team']['name'] => $item];
        });
        
    
        return view('home', [
            'active' => 'ukm',
            'grouped' => $grouped,
        ]);
    }

    public function panitia()
    {
        return view('home', [
            'active' => 'panitia',
            'committees' => collect(Candidate::all()),
        ]);
    }

}
