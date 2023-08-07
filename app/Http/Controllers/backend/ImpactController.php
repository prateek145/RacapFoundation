<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Impact;


class ImpactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'no' => 'required',

                'name1' => 'required',
                'no1' => 'required',

                'name2' => 'required',
                'no2' => 'required',

                'name3' => 'required',
                'no3' => 'required',
            ];

            $custommessage = [];

            $this->validate($request, $rules, $custommessage);
            $data = $request->all();
            // dd($data);
            unset($data['_token']);

            $impact = Impact::find(1);
            if ($impact) {
                # code...
                $impact->update($data);
                return redirect()
                    ->back()
                    ->with('success', 'Impact on Society Detials Updated.');
            } else {
                # code...
                Impact::create($data);
                return redirect()
                    ->back()
                    ->with('success', 'Impact on Society Detials Updated.');
            }

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
            $impact = Impact::find($id);
        
            // dd($impact);
            return view('backend.impact.edit', compact('impact'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}