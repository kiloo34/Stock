<?php

namespace App\Http\Controllers\Mandor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('mandor.dashboard', [
            'title' => 'dashboard',
            'subtitle'  => '',
            'active' => 'dashboard'
        ]);
    }
}
