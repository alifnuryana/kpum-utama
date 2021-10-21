<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\Major;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.committee.index', [
            'active' => 'panitia',
            'committees' => Committee::with(['major'])->get(),
            'majors' => Major::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.committee.create', [
            'active' => 'panitia',
            'majors' => Major::get(),
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
            'major_id' => 'required',
        ]);
        $attributes['path'] = $request->file('path')->store('candidate-pic');
        Committee::create($attributes);
        return redirect(route('committee.index'))->with('success', 'Panitia baru telah ditambahkan.');
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
        return view('dashboard.admin.committee.edit', [
            'active' => 'panitia',
            'majors' => Major::all(),
            'committee' => Committee::with('major')->findOrFail($id),
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
            'major_id' => 'required',
        ]);
        $attributes['path'] = $request->file('path')->store('candidate-pic');
        Committee::find($id)->update($attributes);
        return redirect(route('committee.index'))->with('success', 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Committee::find($id)->delete();
        return redirect(route('committee.index'))->with('success', 'Data Berhasil Di Hapus');
    }
}
