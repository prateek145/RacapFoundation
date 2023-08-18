<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Aboutus;
use App\Models\User;
use App\Models\backend\Impact;
use App\Models\backend\Intervention;
use App\Models\backend\InterventionImage;
use App\Models\backend\Mission;
use App\Models\backend\Vision;
use App\Models\backend\OurProject;
use App\Models\frontend\ContactForm;

class HomeController extends Controller
{
    //

    public function frontend_home(){
        try {

            $aboutus = Aboutus::find(1);
            $mission = Mission::find(1);
            $vision = Vision::find(1);
            $impact = Impact::find(1);
            $interventionimage = InterventionImage::find(1);
            $members = User::where('role', 'member')->orwhere('role', 'user')->where('show_business', 'on')->latest()->get();
 
            if (!is_null($interventionimage)) {
                # code...
                $interventionimages = json_decode($interventionimage->image);
            } else {
                # code...
                $interventionimages = null;
            }
  
            $interventions = Intervention::latest()->get();
            $ourprojects = OurProject::latest()->get();
            // dd($interventionimages, $interventions, $ourprojects);
            // dd($ourprojects, count($ourprojects));
            return view('frontend.home', compact('members','vision', 'impact','interventionimages', 'interventionimage', 'interventions', 'ourprojects', 'aboutus', 'mission'));
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
        
    }

    public function user_home(){
        try {
            return view('frontend.myaccount');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
        
    }

    public function memberlist(){
        try {
            $members = User::where('role', 'member')->orwhere('role', 'user')->where('show_business', 'on')->latest()->get();
            // dd($members);
            return view('frontend.memberlist', compact('members'));
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
        
    }

    public function contact(Request $request){
        try {
            $rules = [
                'firstname' => 'required',
                'email' => 'required',
                'lastname' => 'required',
                'phone' => 'required|min:10',
                'message' => 'required',

            ];

            $custommessage = [];

            $this->validate($request, $rules, $custommessage);

            $data = $request->all();
            unset($data['_token']);
            // dd($data);
            ContactForm::create($data);
            return redirect()
                ->back()
                ->with('success', 'Form submitted.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}