<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.timeline.index', [
            'active' => 'timeline',
            'timelines' => Timeline::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.timeline.create', [
            'active' => 'timeline',
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
            'desc' => 'required|min:10',
            'from' => 'required',
            'to' => 'required',
        ]);
        Timeline::create($attributes);
        return redirect(route('timeline.index'))->with('success', 'Timeline baru telah ditambahkan.');
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
        return view('dashboard.admin.timeline.edit', [
            'active' => 'timeline',
            'timeline' => Timeline::findOrFail($id),
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
            'name' => 'required|min:7',
            'desc' => 'required|min:10',
            'from' => 'required',
            'to' => 'required',
        ]);

        Timeline::find($id)->update(request()->all());
        return redirect(route('timeline.index'))->with('success', 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Timeline::find($id)->delete();
        return redirect(route('timeline.index'))->with('success', 'Data Berhasil Di Hapus');
    }
}
