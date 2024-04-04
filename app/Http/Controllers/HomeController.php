<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $authUser = Auth::user();

        if($authUser) {
            if($authUser->isSuperAdmin() === true || $authUser->hasRole('Admin')) {
                return redirect(route('filament.admin.pages.dashboard'));
            } else {
                return redirect(route('dashboard'));
            }
        } else {
            return redirect(route('welcome'));
        }
    }
}
