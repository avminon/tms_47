<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('supervisor.home');
    }
}
