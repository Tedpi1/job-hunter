<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Only job seekers should access this dashboard.
        if ((int) $request->user()->role !== 2) {
            abort(403, 'You are not authorized to access this dashboard.');
        }

        return view('dashboard');
    }
}
