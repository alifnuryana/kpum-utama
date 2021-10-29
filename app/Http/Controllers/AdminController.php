<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
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
}
