<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\UserModel;
use App\Models\Group;
use App\Http\Requests\UserRquest;
class UserController extends Controller
{
    public $data=[];
    private $users;
    const _Per_name=4;
    public function __construct(){
      $this->users= new UserModel();
    }

    public function index(Request $request){
        $title='List users';
      //  $users=DB::table('tb_user')->get();
       // $user=DB::select('select `username`, `email`, `fullname`  from tb_user');
    //   $users=DB::select('select *from tb_user',[1]);
    //  $users=DB::select('select *from test');
    //   foreach ($users as $user) {
    //     echo $user->matkhau;
    // }
     //  dd($user);
           // return view('client.user',compact('title','users'));
     //model :

    // $statement=$this->users->statementUser("Delete from users");
   //  $userslistQB=$this->users->UserQB();
   //  dd($userslistQB);

   //Dung de loc (filters)
   $filters=[];
   $keywords=null;
   if(!empty($request->status)){
    $status=$request->status;
    echo $status;
    if($status=='active'){
        $status=1;
    }else {
        $status=0;
    }
    $filters[]=['test.status','=',$status];
   }

   if(!empty($request->group_id)){
    $Group_id=$request->group_id;
    $filters[]=['test.group_id','=',$Group_id];
   }

   if(!empty($request->keywords)){
    $keywords=$request->keywords;
   }

   //Xu ly logic xap xep
   $sortBy=$request->input('sort-by');
   $sortType=$request->input('sort-type');
   $allowSort=['asc','desc'];
   if(!empty($sortType) && in_array($sortType,$allowSort)){
    if($sortType=='desc'){
      $sortType='asc';
    }else{
      $sortType='desc';
    }
   }else{
    $sortType='asc';
   }
   $sortByArray=[
    'sortBy'=>$sortBy,
    'sortType'=>$sortType
   ];
     $userslist= $this->users->getAllUsers($filters,$keywords,$sortByArray,self::_Per_name);
    return view('user.list',compact('title','userslist','sortType'));
    }
    public function add(){
      $title="Add New";
      $allGroups=getAllGroup();
      $errormessage="vui long kiem tra du lieu vao";
      return view('user.add',compact('title','errormessage','allGroups'));
    }
    // public function postadd(Request $request){
   public function postadd(UserRquest $request){
    //   $addUsers=[
    //     $request->name,
    //     $request->pass,
    //     // 'created_at'=>date('Y-m-d H:i:s')
    //     date('Y-m-d H:i:s')
    //   ];
      $addUsers=[
        'tendangnhap'=>$request->name,
        'matkhau'=>$request->pass,
        'group_id'=>$request->group_id,
        'status'=>$request->status,
         'created_at'=>date('Y-m-d H:i:s')
      ];
      $this->users->addUser($addUsers);
      return redirect()->route('user.index')->with('msg','Them thanh cong');
    }


    public function edit(Request $request,$id=0){
 //     dd($id);
 $title="Update Users";
 $errormessage="vui long kiem tra du lieu vao";
 // lien quan den bao mat
 //$editUsers=$this->users->editUser($id);
 //
 if(!empty($id)){
  $editUsers=$this->users->editUser($id);
  //dd($editUsers);
  if(!empty($editUsers[0])){
    $request->session()->put('id',$id);
    $editUsers=$editUsers[0];
  }else{
    return redirect()->route('user.index')->with('msg','nguoi dung khong ton tai');
  }
 }else
 {
  return redirect()->route('user.index')->with('msg','Lien ket khong ton tai');
 }
 $allGroups=getAllGroup();
 return view('user.edit',compact('title','editUsers','errormessage','allGroups'));
    }

public function postedit(UserRquest $request){
      $id=session('id');
      if(empty($id)){
        return back()->with('msg','Lien ket khong ton tai');
      }
    //   $rule=[
    //     'name'=>'required|min:5',
    //     'pass'=>'required|integer'
    //   ];
    //   $message=[
    //     'required'=>'Truong :attribute bat buoc phai nhap',
    //     'name.min'=>'Truong :attribute it nhat phai :min ky tu',
    //     'pass.integer'=>'Truong :attribute phai nhap so'
    //   ];
    //   $request->validate($rule,$message);
      $UpdateUsers=[
        'tendangnhap'=>$request->name,
        'matkhau'=>$request->pass,
        'group_id'=>$request->group_id,
        'status'=>$request->status,
         'updated_at'=>date('Y-m-d H:i:s')
      ];


    //   $UpdateUsers=[
    //     $request->name,
    //     $request->pass,
    //     //cai nay cua update
    //     date('Y-m-d H:i:s')
    //   ];
      $this->users->updateUser($UpdateUsers,$id);
      return back()->with('msg','Cap nhap thanh cong');

    }
    public function delete($id=0){
        if(!empty($id)){
            $deleteUsers=$this->users->editUser($id);
            if(!empty($deleteUsers[0])){
               $deleteUsers= $this->users->deleteUser($id);
               if($deleteUsers){
                $msg="Xoa nguoi dung thanh cong";
               }else{
                $msg="Ban khong the xoa nguoi dung nay ,vui long thu lai";
               }
            }else{
              $msg="nguoi dung khong ton tai";
            }
           }else
           {
            $msg="Lien ket khong ton tai";
           }
           return redirect()->route('user.index')->with('msg',$msg);
    }
}
