<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Vision;


class VisionController extends Controller
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
                'description' => 'required',

            ];

            $custommessage = [];

            $this->validate($request, $rules, $custommessage);
            $data = $request->all();
            unset($data['_token']);
            unset($data['image']);

            $imagearr = [];
            if ($request->image) {
                # code...
                $imagearr = rand() . $request->image->getClientOriginalName();
                $destination_path = public_path('/uploads/vision');
                $request->image->move($destination_path, $imagearr);
                $data['image'] = $imagearr;
            }

            // dd($data);
            $vision = Vision::find(1);
            if ($vision) {
                # code...
                $vision->update($data);
                return redirect()
                    ->back()
                    ->with('success', 'About Us Content Updated.');
            } else {
                # code...
                Vision::create($data);
                return redirect()
                    ->back()
                    ->with('success', 'About Us Content Created.');
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
            $vision = Vision::find($id);
            // dd($aboutus);
            // dd($carasoul, $images);
            return view('backend.vision.edit', compact('vision'));
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