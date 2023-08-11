<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function send_otp(Request $request)
    {
        $rules = [
            'email' => 'required|exists:users',
        ];

        $custommessages = [
            'email.required' => 'Email is required',
        ];

        $this->validate($request, $rules, $custommessages);

        try {
            //code...
            $data = $request->all();
            unset($data['_token']);

            if ($request->email != 'admin@gmail.com') {
                # code...
                $random = rand(1, 999999);
                $array = [
                    'email' => $request->email,
                    'otp' => $random,
                ];

                $mail = Mail::send('email.loginmail', ['body' => $array], function ($message) use ($request) {
                    $message->sender(env('MAIL_FROM_ADDRESS'));
                    $message->subject('RACAP FOUNDATION LOGIN EMAIL');
                    $message->to($request->email);
                });

                $user = User::where('email', $request->email)->first();
                $user->password = Hash::make($random);
                $user->save();

                if (!$mail) {
                    # code...
                    throw new \Exception('Mail is not available');
                }
            } else {
                $user = User::where('email', $request->email)->first();
            }

            return response()
                ->status(200)
                ->json([
                    'status' => 'success',
                    'data' => $array,
                ]);
        } catch (\Exception $e) {
            //throw $th;
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
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
}