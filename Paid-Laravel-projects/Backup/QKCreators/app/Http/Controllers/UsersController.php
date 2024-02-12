<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// admin model 
use App\Models\admin;
// client model 
use App\Models\Clients_Table;

class UsersController extends Controller
{
    // Client Login 
    public function client_loginForm(){
        return view('login');
    }
    public function client_login(Request $r){
        $r->validate(
            [
                'email'=>'required|email',
                'password'=>'required'
            ]
            );
        $email=$r['email'];
        $password=$r['password'];
        $check=Clients_Table::Where('Client_Email','=',$email)->Where('Client_Password','=',$password)->get();
        $check=$check->toArray();
        if(!empty($check)){
            $clientName=$check[0]["client_Name"];
            session(['clientEmail'=>$email,'clientPassword'=>$password,'ClientName'=>$clientName]);
            return redirect(route('client.home'));
        }else{
            session()->flash('LoginCheckMessage','You Enter The Incorrect Data, plz Try Again');
            return redirect(route('client.login.page'));
        }
    }
    public function client_signUpForm(){
        return view('signUp');
    }

    // Admin Functions 
    public function admin_login(){
        return view('dashboard.admin');
    }
    public function login_admin(Request $r){
        $r->validate(
            [
                'name'=>'required',
                'password'=>'required'
            ]
            );
        $userName=$r['name'];
        $password=md5($r['password']);
        $check=admin::Where('user_name','=',$userName)->Where('password','=',$password)->get();
        $check=$check->toArray();
        if(!empty($check)){
            session(['adminName'=>$userName,'adminPassword'=>$password]);
            return redirect(route('dashboard.home'));
        }else{
            session()->flash('LoginCheckMessage','You Enter The Incorrect Data, plz Try Again');
            return redirect(route('dashboard.admin.form'));
        }
    }
}
