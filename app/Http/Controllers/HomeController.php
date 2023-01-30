<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $data=[];
   /* public function index(){
        $title ='Data home';
        $content='Content Data';
        $footer='Footer data';
        // $dataview =[
        //     'datatitle'=> $title,
        //     'contentdata'=>$content,
        //     'footerdata'=>$footer,
        // ];
        // return view('homev',$dataview);
       // return view('homev',compact('title','content','footer'));

        $this->data['Webcome']='hoc lap trinh php laravel';
        $this->data['contents']='Nhap mon:
        <p>Kien thuc 1</p>
        <p>Kien thuc 1</p>';
        return view('homev',$this->data);
    } */
    public function index(){

        $this->data['noidung']='Day la noi dung cua footer';
        return view ('client.home',$this->data);
    }
}
