<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function filtrafecha(){

        return view('generales.');
    }
}
