<?php

namespace App\Http\Controllers;

use App\Models\Designer;
use Illuminate\Http\Request;

class DesignerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Designer';
        $data['q'] = $request->get('q');
        $data['designer'] = Designer::where('nama_project', 'like', '%' . $data['q'] . '%')->get();
        return view('designer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add Project';
        return view('designer.create', $data);
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

        $designer = new Designer($request->all());
        $designer->save();
        return redirect('designer')->with('success', 'Designer added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function show(Designer $designer)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function edit(Designer $designer)
    {
        $data['title'] = 'Edit Project';
        $data['designer'] = $designer;
        return view('designer.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designer $designer)
    {
        $request->validate([
            'nama_project' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
        ]);

        $designer->nama_project = $request->nama_project;
        $designer->keterangan = $request->keterangan;
        $designer->status = $request->status;
        $designer->save();
        return redirect('designer')->with('success', 'Designer updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designer $designer)
    {
        $designer->delete();
        return redirect('designer')->with('success', 'Designer deleted successfully');
    }
}