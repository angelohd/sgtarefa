<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerAdmin extends Controller
{
    function viewlogin(){
        return view('admin.login.index');
    }

    function login(Request $request){

        if(filter_var($request->email,FILTER_VALIDATE_EMAIL)){
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
               return "success";
            }
            return "error";
        }
        return "error";

    }
}
