<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class MyRegistrationController extends Controller
{
    public function index()
    {
        // $registrations = 'test';
        $id = auth()->user()->id;
        $registrations = Registration::where("user_id", $id)->paginate(10);
        return view("myRegistrations.index", compact("registrations", "id"));
    }
}
