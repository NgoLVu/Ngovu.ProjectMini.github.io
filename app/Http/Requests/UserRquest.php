<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:5',
            'pass'=>'required|integer',
            'group_id'=>['required',function($attribute,$value,$fail){
                if($value==0){
                    $fail('Bắt buộc phải chọn nhóm');
                }
            }],
            'status'=>'required|integer'
        ];
    }
    public function messages(){
        return [
      'required'=>'Truong :attribute bat buoc phai nhap',
        'name.min'=>'Truong :attribute it nhat phai :min ky tu',
        'pass.integer'=>'Truong :attribute phai nhap so',
        'name.unique'=>'truong :attrubute da ton tai tren he thong',
        'group_id.required'=>[function($attribute,$value,$fail){
            if($value==0){
                $fail('Bắt buộc phải chọn nhóm');
            }
        }],
        'status.required'=>'Trạng thái không được bỏ trống',
        'status.integer'=>'Trạng thái không hợp lệ'

        ];
    }
    public function attributes(){
        return [
            'name'=>'Ten nguoi dung',
            'pass'=>'mat khau'
        ];
    }
}
