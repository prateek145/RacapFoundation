<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class LoginController extends Controller
{
    public function register_user(Request $request)
    {

        try {
            //code...
            $rules = [
                'email' => 'required|unique:users',
                'phone' => 'required|unique:users',
                'firstname' => 'required',
                'lastname' => 'required',
                'bname' => 'required',
                'sector' => 'required',
                'city' => 'required',
                'state' => 'required',
                'website' => 'required',
                'country_code' => 'required',
            ];

            $custommessages = [
                'email.required' => 'Email is required',
                'phone.required' => 'Phone is required',
                'email.unique' => 'Email already exists',
                'phone.unique' => 'Phone already exists',
            ];

            $this->validate($request, $rules, $custommessages);


            if ($request->email != 'admin@gmail.com') {
                # code...
                $data = $request->all();
                $data['specific_id'] = rand(1, 999999) . rand(1, 999999) . $request->firstname . $request->lastname;
                $data['role'] = 'member';
                // dd($data);

                if ($request->image) {
                    $base64_image = $base64; // your base64 encoded
                    @[$type, $file_data] = explode(';', $base64_image);
                    @[, $file_data] = explode(',', $file_data);
                    $imageName = \Str::random(10) . '.' . 'png';
                    // dd($base64_image, $imageName);
                    \Storage::disk('public')->put($imageName, base64_decode($file_data));
                }

                $user = User::create($data);
                return response()
                    ->json([
                        'status' => 'success',
                        'data' => $user,
                    ]);
            } else {
                return response()
                    ->json([
                        'status' => 'success',
                        'data' => [
                            'exceptional' => 'admin@gmail.com',
                        ],
                    ]);
            }
        } catch (\Exception $e) {
            //throw $th;
            return response()
                ->json([
                    'status' => 'error',
                    'data' => [
                        'message' => $e->getMessage(),
                    ],
                ]);
        }
    }
}
