<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.major.index', [
            'active' => 'programstudi',
            'majors' => Major::with(['faculty'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.major.create', [
            'active' => 'programstudi',
            'faculties' => Faculty::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:7',
            'slug' => '',
            'faculty_id' => 'required',
        ]);
        $attributes['slug'] = strtolower(str_replace(' ', '-', request()->name));
        Major::create($attributes);
        return redirect(route('major.index'))->with('success', 'Program studi baru telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.admin.major.edit', [
            'active' => 'program-studi',
            'faculties' => Faculty::all(),
            'major' => Major::findOrFail($id),
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
            // 'slug' => '',
            'faculty_id' => ['required'],
        ]);

        Major::find($id)->update(request()->all());
        return redirect(route('major.index'))->with('success', 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Major::find($id)->delete();
        return redirect(route('major.index'))->with('success', 'Data Berhasil Di Hapus');
    }
}
