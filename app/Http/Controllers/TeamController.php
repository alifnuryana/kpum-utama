<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Organization;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.team.index', [
            'active' => 'paslon',
            'teams' => Team::with(['organization'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.team.create', [
            'active' => 'paslon',
            'organizations' => Organization::get(),
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
            'name' => 'required',
            'organization_id' => 'required',
        ]);
        // $attributes['slug'] = strtolower(str_replace(' ', '-', request()->name));
        Team::create($attributes);
        return redirect(route('team.index'))->with('success', 'Pasangan Calon baru telah ditambahkan.');
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
        return view('dashboard.admin.team.edit', [
            'active' => 'program-studi',
            'organizations' => Organization::all(),
            'team' => Team::findOrFail($id),
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
        request()->validate([
            'name' => ['required', 'min:7'],
            'organization_id' => ['required'],
        ]);

        Team::find($id)->update(request()->all());
        return redirect(route('team.index'))->with('success', 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Team::find($id)->delete();
        return redirect(route('team.index'))->with('success', 'Data Berhasil Di Hapus');
    }
}
