<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Dashboardcontroller extends Controller
{
    //
    public function index()
    {
        // return view('dashboard.index');
        return view('pages.admin.index');
    }
}
