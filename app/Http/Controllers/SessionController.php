<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class SessionController extends Controller
{
    public $data=[];
    public function getSession(){
       // $data = Session::get('username');
       $data=Session::all();
        dd($data);
    }
    public function setSession(){
        Session::put('username','Ngovu');
        Session::put('username','vu');
        Session::put('username','Ngo');
    }
    public function unsetSession(){
        Session::forget('username');//Xoa 1 du lieu
    //    Session::flush; //Xoa ca
    }
}
