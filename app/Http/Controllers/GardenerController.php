<?php

namespace App\Http\Controllers;

use App\Models\Gardener;
use Illuminate\Http\Request;

class GardenerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Gardener';
        $data['q'] = $request->get('q');
        $data['gardener'] = Gardener::where('nama_project', 'like', '%' . $data['q'] . '%')->get();
        return view('gardener.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add Project';
        return view('gardener.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_project' => 'required',
            'keterangan' => 'required',
        ]);

        $gardener = new Gardener($request->all());
        $gardener->save();
        return redirect('gardener')->with('success', 'Gardener added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gardener  $gardenerr
     * @return \Illuminate\Http\Response
     */
    public function show(Gardener $gardener)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gardener  $gardener
     * @return \Illuminate\Http\Response
     */
    public function edit(Gardener $gardener)
    {
        $data['title'] = 'Edit Project';
        $data['gardener'] = $gardener;
        return view('gardener.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gardener  $gardener
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gardener $gardener)
    {
        $request->validate([
            'nama_project' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
        ]);

        $gardener->nama_project = $request->nama_project;
        $gardener->keterangan = $request->keterangan;
        $gardener->status = $request->status;
        $gardener->save();
        return redirect('gardener')->with('success', 'Gardener updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gardener  $gardener
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gardener $gardener)
    {
        $gardener->delete();
        return redirect('gardener')->with('success', 'Gardener deleted successfully');
    }
}