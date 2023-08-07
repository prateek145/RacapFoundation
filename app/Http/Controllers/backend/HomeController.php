<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\ContactForm;

class HomeController extends Controller
{
    public function backend_home(){
        try {
            return view('backend.home');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function contact_list(){
        try {
            $contacts = ContactForm::latest()->get();
            return view('backend.contact.index', compact('contacts'));
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}