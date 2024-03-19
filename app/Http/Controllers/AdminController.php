<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Auth;

class AdminController extends Controller
{
    public function Dashboard(){
        return view('admin.dashboard');
    }
}