<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// use Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function send_otp(Request $request)
    {
        $rules = [
            'email' => 'required|exists:users'
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
                $user->password =  Hash::make($random);
                $user->save();

                if (!$mail) {
                    # code...
                    throw new \Exception("Mail is not available");
                }
            } else {
                $user = User::where('email', $request->email)->first();
            }

            session()->put('useremail', $user->email);
            return redirect()->route('sendotp')->with('success', 'OTP Sent.');
        } catch (\Exception $e) {
            //throw $th;
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function resendotp(Request $request)
    {
        $rules = [
            'email' => 'required|exists:users'
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
                $user->password =  Hash::make($random);
                $user->save();

                if (!$mail) {
                    # code...
                    throw new \Exception("Mail is not available");
                }
            } else {
                $user = User::where('email', $request->email)->first();
            }

            session()->put('useremail', $user->email);
            return redirect()->route('sendotp')->with('success', 'OTP Sent.');
        } catch (\Exception $e) {
            //throw $th;
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function sendotp()
    {
        try {
            $useremail = session()->get('useremail');
            return view('auth.sendotp', compact('useremail'));
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }



    public function login(Request $request)
    {
        // dd($request->all());

        $rules = [
            'password' => 'required'
        ];

        $custommessages = [];

        $this->validate($request, $rules, $custommessages);

        try {
            //code...
            $useremail = session()->get('useremail');
            $data = [
                'email' => $useremail,
                'password' => $request->password,
            ];
            if (Auth::attempt($data)) {
                if (auth()->user()->role == 'admin') {
                    return redirect()->route('backend.home');
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

    public function emailotp(Request $request)
    {

        try {

            $rules = [
                'email' => 'required|unique:users'
            ];

            $custommessages = [
                'email.required' => 'Email is required',
            ];

            $this->validate($request, $rules, $custommessages);
            //code...
            $data = $request->all();
            // dd($data);
            unset($data['_token']);
            $random = rand(1, 999999);
            $array = [
                'email' => $request->email,
                'otp' => $random,
            ];

            $mail = Mail::send('email.registeremail', ['body' => $array], function ($message) use ($request) {
                $message->sender(env('MAIL_FROM_ADDRESS'));
                $message->subject('RACAP FOUNDATION REGISTER EMAIL');
                $message->to($request->email);
            });
            // dd('prateek');
            if (!$mail) {
                # code...
                throw new \Exception("Mail not working");
            } else {
                # code...
                $user = new User();
                $user->email = $request->email;
                $user->otp = $random;
                $user->save();
                return response()->json([
                    'success' => 'Working'

                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
}
