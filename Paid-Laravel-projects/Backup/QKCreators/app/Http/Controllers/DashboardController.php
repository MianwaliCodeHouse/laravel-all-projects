<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// client model 
use App\Models\Clients_Table;

// Mail setup 
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }   
    public function logout(){
        session()->flush();
        return redirect(route('dashboard.admin.form'));
    } 
    public function registerForm(){
        return view('dashboard.register');
    } 
    public function register(Request $r){
        $r->validate(
            [
                'Client_Name'=>'required',
                'Client_Mobile'=>'required|min:10|unique:clients',
                'Client_Country'=>'required',
                'Client_City'=>'required',
                'Client_Email'=>'required|email|unique:clients',
                'Client_Password'=>'required|min:8'
            ]
            );
        $client_record=new Clients_Table;
        $client_record->Client_Name=$r['Client_Name'];
        $client_record->Client_Mobile=$r['Client_Mobile'];
        $client_record->Client_Country=$r['Client_Country'];
        $client_record->Client_City=$r['Client_City'];
        $client_record->Client_Email=$r['Client_Email'];
        $client_record->Client_Password=$r['Client_Password'];
        $client_record->Is_Verify='1';
        $client_record->save();
        $mailData=[
            'name'=>$r['Client_Name'],
            'email'=>$r['Client_Email'],
            'password'=>$r['Client_Password']
        ];
        Mail::to($r['Client_Email'])->send(new RegistrationMail($mailData));
        session()->flash('Registration','Client Record Added to DataBase and Also Sent Email to Client');
        return redirect(route('dashboard.registerForm'));
    } 
}
