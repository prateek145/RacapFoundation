<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Intervention;

class InterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $interventions = Intervention::latest()->get();
            return view('backend.intervention.index', compact('interventions'));
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
            return view('backend.intervention.create');
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
                'description' => 'required'
            ];

            $custommessage = [];

            $this->validate($request, $rules, $custommessage);
            $data = $request->all();

            unset($data['_token']);
            Intervention::create($data);

            return redirect()
                ->route('intervention.index')
                ->with('success', 'Intervention Created.');
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
            $intervention = Intervention::find($id);
            // dd($project);
            return view('backend.intervention.edit', compact('intervention'));
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
                'description' => 'required'
            ];

            $custommessage = [];

            $this->validate($request, $rules, $custommessage);
            $data = $request->all();
            unset($data['_token']);
            $intervention = Intervention::find($id);
            $intervention->update($data);
            $intervention->save();

            return redirect()
                ->back()
                ->with('success', 'Intervention Updated.');
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
            Intervention::destroy($id);
            return redirect()
                ->back()
                ->with('success', 'Intervention Deleted.');
        } catch (\Exception $th) {
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }
}