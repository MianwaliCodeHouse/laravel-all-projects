<?php

namespace App\Http\Controllers;

use App\Events\test;
use Illuminate\Http\Request;

class websocketController extends Controller
{
    public function index($id){
echo $id;
event(new test('this is message'));
    }
}
