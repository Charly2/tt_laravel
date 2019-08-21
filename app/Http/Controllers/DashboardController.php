<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $alumno= 1;
        return view('app.dashboard.dashboard',['alumno'=>$alumno]);
    }
}
