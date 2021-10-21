<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Major;
use App\Models\Candidate;
use Illuminate\Http\Request;

class MpmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.mpm.index', [
            'active' => 'mpm',
            'mpms' => Candidate::with(['team', 'major'])->whereHas('team', function ($q) {
                $q->where('name', 'like', '%mpm%');
            })->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.mpm.create', [
            'active' => 'mpm',
            'majors' => Major::get(),
            'teams' => Team::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|min:7',
            'npm' => 'required|min:10|unique:candidates,npm',
            'position' => 'required',
            'path' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'cv' => 'required|mimes:pdf',
            'major_id' => 'required',
            'team_id' => 'required',
        ]);
        $attributes['path'] = $request->file('path')->store('candidate-pic');
        $attributes['cv'] = $request->file('cv')->store('candidate-cv');
        Candidate::create($attributes);
        return redirect(route('mpm.index'))->with('success', 'Kandidat MPM baru telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.admin.mpm.edit', [
            'active' => 'mpm',
            'teams' => Team::all(),
            'majors' => Major::all(),
            'mpm' => Candidate::with('team', 'major')->findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributes = request()->validate([
            'name' => 'required|min:7',
            'npm' => 'required|min:10',
            'position' => 'required',
            'path' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'cv' => 'required|mimes:pdf',
            'major_id' => 'required',
            'team_id' => 'required',
        ]);
        $attributes['path'] = $request->file('path')->store('candidate-pic');
        $attributes['cv'] = $request->file('cv')->store('candidate-cv');
        Candidate::find($id)->update($attributes);
        return redirect(route('mpm.index'))->with('success', 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Candidate::find($id)->delete();
        return redirect(route('mpm.index'))->with('success', 'Data Berhasil Di Hapus');
    }
}
