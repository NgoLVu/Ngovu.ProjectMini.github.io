<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruductController extends Controller
{
    public function __construct()
    {
        
    }
    public function index()
    {
      //  return 'Danh sach san pham';
      return view('Product/list');

    }
    //lay ra 1 san pham theo id (GET)
    public function getProduct($id)
    {
        $content='San pham theo Id: ';
        $content.=$id;
       return $content;
    }
    //Cap nhap/sua 1 chuyen muc (POST)
    public function updateProduct($id)
    {
     
    }
    // show from them du lieu
    public function showProduct(){

    }
    // Them 1 san pham (POST)
    public function addProduct($id)
    {
      return view('Product/add');

    }// Xoa san pham (POST)
    public function deleteProduct($id)
    {

    }

}
