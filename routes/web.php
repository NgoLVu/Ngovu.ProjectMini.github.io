<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//  //   return view('welcome');;
//     return view('home');
// });
Route::get('/home',[HomeController::class,'index'])->name('homev');
 //{
    // $title ='Data home';
    // $content='Content Data';
    // $footer='Footer data';
    // $dataview =[
    //     'datatitle'=> $title,
    //     'contentdata'=>$content,
    //     'footerdata'=>$footer,
    // ];
	// return view('homev',$dataview);
//});
Route::get('/sanpham',function(){
    $content="Hello world";
    return $content;
});
Route::prefix('admin')->group(function () {
    Route::get('sanpham/{id?}',function($id){
        $content="phuong thuc get cua path/sanpham voi tham so:";
        $content.='id='.$id;
        return $content;
    });
    Route::get('/sanpham',function(){
        $content="Hello world";
        return $content;
    });
});

//Client Routes
Route::prefix('Product')->group(function (){
    //Lay danh sach sp
    Route::get('/list',[PruductController::class,'index'])->name('Product.add');
    //Lay chi tiet 1 san pham
    Route::get('/edit/{id}',[PruductController::class,'getProduct']);
    //Them  1 san pham
    Route::get('/add/{id}',[PruductController::class,'addProduct']);
});
// Admin Routes
Route::prefix('Admin')->group(function(){
    Route::get('/',[DashboardController::class]);
});

Route::get('/client',function(){
    return view('client.home');
});
//Route::get('/contact',[HomeController::class,'index'])->name('contact');
Route::get('/contact',function(){
    return view('home');
});
Route::get('/Them-san-pham',[AddController::class,'getadd']);
Route::post('/Them-san-pham',[AddController::class,'postadd']);

Route::prefix('/session')->group(function(){
    Route::get('/',[SessionController::class,'setSession']);
    Route::get('/get',[SessionController::class,'getSession']);
    Route::get('/unset',[SessionController::class,'unsetSession']);
});

// Route::prefix('/user')->name('user.')->group(function(){
Route::prefix('/')->name('user.')->group(function(){
    Route::get('/',[UserController::class,'index'])->name('index');
    Route::get('/add',[UserController::class,'add'])->name('add');
    Route::post('/add',[UserController::class,'postadd'])->name('postadd');
    Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit');
    Route::post('/update',[UserController::class,'postedit'])->name('update');
    Route::get('/delete/{id}',[UserController::class,'delete'])->name('delete');
});
