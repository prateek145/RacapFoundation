<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\InterventionImage;

class InterventionImageController extends Controller
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
                'image' => 'required',
            ];

            $custommessage = [];

            $this->validate($request, $rules, $custommessage);
            $data = $request->all();
            // dd($data);
            unset($data['_token']);
            unset($data['image']);

            $imagearr = [];
            if ($request->image) {
                # code...
                for ($i = 0; $i < count($request->image); $i++) {
                    # code...
                    $imagearr[$i] = rand() . $request->image[$i]->getClientOriginalName();
                    $destination_path = public_path('/uploads/interventionimage');
                    $request->image[$i]->move($destination_path, $imagearr[$i]);
                }
                $data['image'] = json_encode($imagearr);
            }

            // dd($data);
            $interventionimage = InterventionImage::find(1);
            if ($interventionimage) {
                # code...
                // dd($data);
                $data1 = json_decode($data['image']);
                $data2 = json_decode($interventionimage->image, true);
                // dd($data1, $data2, $interventionimage->image);

                if ($interventionimage->image == '{}') {
                    # code...
                    $data3['image'] = json_decode($data['image']);
                } else {
                    # code...
                    // dd($data1, $data2);
                    $data3['image'] = json_encode(array_merge($data1, $data2));
                }
                
                // dd($data)
                $interventionimage->update($data3);
                return redirect()
                    ->back()
                    ->with('success', 'InterventionImage Updated.');
            } else {
                # code...
                InterventionImage::create($data);
                return redirect()
                    ->back()
                    ->with('success', 'InterventionImage Updated.');
            }

            return redirect()
                ->back()
                ->with('success', 'Carasoul Updated.');
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
        
        try {
            //
            $interventionImage = InterventionImage::find(1);
            $data = json_decode($interventionImage->image, true);

            foreach ($data as $key => $value) {
                # code...
                // dd($data);
                if ($data[$key] == $id) {
                    # code...
                    unset($data[$key]);
                }
            }
      
            $data1['image'] = json_encode($data);
            $interventionImage->update($data1);
            return redirect()->back()->with('success', 'Image Successfully Deleted.');

        } catch (\Exception $th) {
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }

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
            // dd('prateek');
            $interventionImage = InterventionImage::find($id);
            if ($interventionImage) {
                # code...
                $images = json_decode($interventionImage->image);
            } else {
                # code...
                $images = null;
            }

            // dd($carasoul, $images);
            return view('backend.interventionimage.edit', compact('interventionImage', 'images'));
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