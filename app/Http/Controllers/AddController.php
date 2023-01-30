<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddController extends Controller
{
    public $data=[];
    public function getadd(){
        $this->data['title']='them san pham aa';
        return view('client.add',$this->data);
    }
    public function postadd(Request $request){
        dd($request);
    }
}
