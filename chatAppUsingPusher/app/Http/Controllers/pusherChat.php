<?php

namespace App\Http\Controllers;

use App\Events\myEvent;
use Illuminate\Http\Request;

class pusherChat extends Controller
{
    public function index(){
        event(new myEvent('hello world'));
    }
}
