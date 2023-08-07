<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'bname' => ['required', 'string', 'max:255'],
            'sector' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'image' => ['required', 'string', 'max:255'],
            'website' => ['required', 'string', 'max:255'],
            'country_code' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'min:10'],
            'show_business' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'bname' => $data['bname'],
            'sector' => $data['sector'],
            'city' => $data['city'],
            'role' => 'member',
            'state' => $data['state'],
            'image' => $data['image'],
            'website' => $data['website'],
            'country_code' => $data['country_code'],
            'phone' => $data['phone'],
            'show_business' => $data['show_business'],
            'email' => $data['email'],
        ]);
    }

    public function register(Request $request)
    {
        try {
            // dd($request->all());
            $data = $request->all();
            unset($data['_token']);
            unset($data['image']);

            $data['role'] = 'member';
            if ($request->image) {
                # code...
                $data['image'] = rand() . $request->image->getClientOriginalName();
                $destination_path = public_path('/uploads/users');
                $request->image->move($destination_path, $data['image']);
            }

            $data['specific_id'] = rand(1, 999999) . rand(1, 999999) . $request->firstname . $request->lastname;
            $user = User::create($data);
            return redirect()->route('login')->with('success', $user->email . ' is registered');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}