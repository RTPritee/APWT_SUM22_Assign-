<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function welcomepage()
    {
        return view('welcomepage');

    }
    function login(){
        return view('login');
    }

    function loginValidation(Request $rqst){
        $this -> validate($rqst, [
            "email" =>"required|email",
            "password" => "required|min:8"
        ]);
        $customers = new customer(); 
        $cusromers = customer::where('email', $rqst->email)->get();
        // $customers = customer::where('email', '=', Input::get('email'))->first();
            if ($customers === null) {
                return 'customers does not exist';
            } else {
                // User exits
            return view ('dashboard');
        }
    }
    function detail($id){
        $name="customer $id";
        return view('user.details') ->with('n',$name);
    }

    function showdetail(){
        $customers = customer::all(); //select * from customers
        return view('user.showDetails')->with('customers',$customers);

    }

    function register(){
        return view('register');
    }
    function registerValidation(Request $rqt){
        $this -> validate($rqt, [
            "name" => "required|regex:/^([A-Za-z])+$/i",
            "email" =>"required|email|unique:customers,email", // for unique email which is not already in database
            "password" => "required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z\d@$#!%*?&]{8,}$/i",
            "conf_password" => "required|same:password",
            "type"=> "required"
        ]);

        $obj = new customer();
        $obj ->name = $rqt->name;
        $obj ->email = $rqt->email;
        $obj ->password = $rqt->password;
        $obj ->type = $rqt->type;
        
        $obj -> save();

        return view ('dashboard');
        //return redirect()->route('welcomepage');
    }
    function dashboard(){
       
        return view('dashboard');
    }
}
