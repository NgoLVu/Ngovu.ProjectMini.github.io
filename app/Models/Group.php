<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Group extends Model
{
    use HasFactory;
    public $table='groups';
    public function getGroup(){
        $users=DB::table($this->table)
        ->orderBy('name','asc')
        ->get();
        return $users;
    }
}
