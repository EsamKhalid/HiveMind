<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard(){
    return view('admin-dashboard.admin-dashboard');
    }

    public function manageusers(){
        return view('user-management.user-management');
        }
}
