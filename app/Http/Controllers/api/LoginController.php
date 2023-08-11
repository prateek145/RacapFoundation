<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class LoginController extends Controller
{
    public function register_user(Request $request)
    {
        
        // $rules = [
        //     'email' => 'required|unique:users',
        //     'phone' => 'required|unique:users',
        //     'firstname' => 'required',
        //     'lastname' => 'required',
        //     'bname' => 'required',
        //     'sector' => 'required',
        //     'city' => 'required',
        //     'state' => 'required',
        //     'website' => 'required',
        //     'country_code' => 'required',
        // ];

        // $custommessages = [
        //     'email.required' => 'Email is required',
        //     'phone.required' => 'Phone is required',
        //     'email.unique' => 'Email already exists',
        //     'phone.unique' => 'Phone already exists',
        // ];

        // $this->validate($request, $rules, $custommessages);
        //code...
    
        if ($request->email != 'admin@gmail.com') {
            # code...
            $data = $request->all();
            $data['specific_id'] = rand(1, 999999) . rand(1, 999999) . $request->firstname . $request->lastname;
            $data['role'] = 'member';
            // dd($data);
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
        try {


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

    public function login(Request $request)
    {
        // dd($request->all());

        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $custommessages = [];

        $this->validate($request, $rules, $custommessages);

        try {
            //code...
            $useremail = $request->email;
            $data = [
                'email' => $useremail,
                'password' => $request->password,
            ];
            if (Auth::attempt($data)) {
                if (auth()->user()->role == 'admin') {
                    return response()
                        ->status(200)
                        ->json([
                            'status' => 'success',
                            'data' => [
                                'email' => auth()->user()->email,
                                'role' => auth()->user()->role,
                            ],
                        ]);
                } else {
                    # code...
                    return redirect()->route('user.home');
                }
            } else {
                // validation not successful, send back to form
                return redirect()
                    ->back()
                    ->with('error', 'Login Failure');
            }
        } catch (\Exception $e) {
            //throw $th;
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    // $response  = $this->registerapi($request);

    // public function registerapi($firstname, $lastname, $email, $phone, $bname, $sector, $city, $state, $website, $country_code){
    //     $data = [
    //         'firstname' => $firstname,
    //         'lastname' => $lastname,
    //         'email' => $email,
    //         'phone' => $phone,
    //         'bname' => $bname,
    //         'sector' => $sector,
    //         'city' => $city,
    //         'state' => $state,
    //         'website' => $website,
    //         'country_code' => $country_code,
    //     ];
    //     $curl = curl_init();
    //     curl_setopt_array($curl, [
    //         CURLOPT_URL => 'https://greenathol.extensionerp.com/api/method/login',
    //         CURLOPT_RETURNTRANSFER => 1,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_COOKIEFILE => 'file.txt',
    //         CURLOPT_COOKIEJAR => 'file.txt',
    //         CURLOPT_POSTFIELDS => json_encode($data),
    //         CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    //     ]);

    //     $response = curl_exec($curl);
    //     $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    //     curl_close($curl);
    //     $res = json_decode($response);
    //     dd($res);

   
    // }
}