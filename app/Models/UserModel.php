<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class UserModel extends Model
{
    use HasFactory;
    public $table='test';

    public function getAllUsers($filters=[],$keywords=null,$sortByArray=null,$perPage=null){
        $users=DB::table('test')
        // ->orderBy('created_at','asc')
        // ->get();

        ->select('test.*','groups.name as group_name')
        ->join('groups','test.group_id','=','groups.id');
        // ->orderBy('test.created_at','DESC');
        $orderBy='test.created_at';
        $orderType='desc';
        if(!empty($sortByArray) && is_array($sortByArray)){
            if(!empty($sortByArray['sortBy'])&& !empty($sortByArray['sortType'])){
                $orderBy=trim($sortByArray['sortBy']);
                $orderType=trim($sortByArray['sortType']);
            }
        }
        $users=$users->orderBy($orderBy,$orderType);
        // $users=$users->orderBy('test.created_at','DESC');
        if(!empty($filters)){
            $users=$users->where($filters);
        }
        if(!empty($keywords)){
            $users=$users->where(function($query) use ($keywords){
                $query->orWhere('tendangnhap','like','%'.$keywords.'%');
                // $query->orWhere('matkhau','like','%'.$keywords.'%');
            });
        }
        //$users=$users->get();
        //Phan trang:
        if(!empty($perPage)){
            $users=$users->paginate($perPage)->withQueryString();;//PerPage ban ghi tren 1 trang
        }else{
            $users=$users->get();
        }
    //    $users=$users->paginate(5);//lay 5 ban ghi tren 1 trang
        // $sql=DB::getQuerylog();
        // dd($sql);
        return $users;
    }
    public function addUser($data){
      //DB::insert('INSERT INTO test (tendangnhap,matkhau,created_at) VALUES (?,?,?)',$data);
      return DB::table($this->table)->insert($data);
    }
    public function editUser($id){
        return DB::select('SELECT*FROM '.$this->table.' where id=?',[$id]);
    }
    public function updateUser($data,$id){
      //  $data[]=$id;
       // return DB::update('UPDATE '.$this->table.' SET tendangnhap=?,matkhau=?,updated_at=? where id=?',$data);
       return DB::table($this->table)->where('id',$id)->update($data);
    }
    public function deleteUser($id){
       // return DB::delete('delete from ' .$this->table.' where id = ?', [$id]);
       return DB::table($this->table)->where('id',$id)->delete();

    }
    public function statementUser($sql){
        return DB::statement($sql);
    }
    //Query Builder
    public function UserQB(){
        // Lay tat ca ban ghi
        $list=DB::table($this->table)->get();
        // lay ban ghi dau tien
        $list=DB::table($this->table)->first();
        //lay mot so cot nhat dinh ,voi dinh danh la ten
        $list=DB::table($this->table)
        ->select('tendangnhap as ten')
        ->where('id',2)
        ->orwhere('id',3)
        ->get();
        return $list;

    }
}
