<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{/*
    public function my_data(){
        return view('test');
    }*/
    public function info(Request $request){
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        return view('form1', compact('fname', 'lname'));
    }
    
}
