<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\OurProject;

class OurProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $projects = OurProject::latest()->get();
            return view('backend.ourproject.index', compact('projects'));
        } catch (\Exception $th) {
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('backend.ourproject.create');
        } catch (\Exception $th) {
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // dd($request->all());
            $rules = [
                'name' => 'required',
                'link' => 'required',
                'description' => 'required',
                'img' => 'required',
            ];

            $custommessage = [];

            $this->validate($request, $rules, $custommessage);
            $data = $request->all();

            unset($data['_token']);
            unset($data['img']);

            if ($request->img) {
                # code...
                $data['logo'] = rand() . $request->img->getClientOriginalName();
                $destination_path = public_path('/uploads/projects');
                $request->img->move($destination_path, $data['logo']);
            }

            // dd($data);
            OurProject::create($data);

            return redirect()
                ->route('ourproject.index')
                ->with('success', 'Project Created.');
        } catch (\Exception $th) {
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
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
        try {
            $project = OurProject::find($id);
            // dd($project);
            return view('backend.ourproject.edit', compact('project'));
        } catch (\Exception $th) {
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
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
        try {
            // dd($request->all());
            $rules = [
                'name' => 'required',
                'link' => 'required',
                'description' => 'required',
                'img' => 'required',
            ];

            $custommessage = [];

            $this->validate($request, $rules, $custommessage);
            $data = $request->all();

            unset($data['_token']);
            unset($data['img']);

            if ($request->img) {
                # code...
                $data['logo'] = rand() . $request->img->getClientOriginalName();
                $destination_path = public_path('/uploads/projects');
                $request->img->move($destination_path, $data['logo']);
            }

            // dd($data);
            $project = OurProject::find($id);
            $project->update($data);
            $project->save();

            return redirect()
                ->back()
                ->with('success', 'Project Updated.');
        } catch (\Exception $th) {
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            OurProject::destroy($id);
            return redirect()
                ->back()
                ->with('success', 'Project Deleted.');
        } catch (\Exception $th) {
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }
}
