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

    public function sendotp()
    {
        try {
            return view('auth.sendotp');
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
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
}
