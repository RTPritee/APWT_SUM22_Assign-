<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    /*function __construct(){
        $this->middleware('logged.user');
    }*/

    public function welcomepage()
    {
        return view('welcomepage');

    }
    function login(){
        return view('login');
    }

    function loginValidation(Request $rqst){
        $this -> validate($rqst, [
            "email" =>"required|email|exists:customers,email",
            "password" => "required|min:8|exists:customers,password"
        ]);
        
        $usr = new customer();
        $usr-> email = $rqst->email;
        $usr-> password = $rqst->password;
        $user=customer::where('email', $rqst->email)
                       ->where('password',$rqst -> password )->first();
        if ($user == null){
            return "user not found";
        }
        if ($usr->email == $user->email){
            if ($usr->password == $user->password){
                if ($user -> type =="Admin"){
                    session()->put('logged',$user->email);
                    return redirect()->route('dashboard'); 
                }
                else {
                     session()->put('logged',$user->email);
                    //session()->flash('msg','user not valid');
                    return redirect()->route('userdashboard');
                }
            
            }
            else {
                return "User invalid";
            }
        }
        else 
         return "Email Invalid";
        

        /*
        $customers = new customer(); 
        $cusromers = customer::where('email', $rqst->email)->get();
        // $customers = customer::where('email', '=', Input::get('email'))->first();
            if ($customers === null) {
                return 'customers does not exist';
            } else {
                // User exits
            return view ('dashboard');
        } */
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
        //session()->forget('msg');
        return view('register');
    }
    function registerValidation(Request $rqt){
        $this -> validate($rqt, [
            "name" => "required|regex:/^[a-zA-Z\s]*$/i",
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
       $user = customer::where('email',session()->get('logged'))->first();
        return view('dashboard');
    }

    function userdashboard(){
        $cusromers = [];
        
        $customers = customer::all(); //select * from customers
        return view('user.userDashboard')->with('customers',$customers)->with('customer',$cusromers);
    }
}
