@extends('layouts.client')
@section('title')
{{$title}}
@endsection

@section('content')
<h2>{{$title}}</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>UserName</th>
            <th>Password</th>
        </tr>
    </thead>
    <tbody>
    @if(!empty($userslist)){
            @foreach($userslist as $key=>$item){
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->tendangnhap}}</td>
                    <td>{{$item->matkhau}}</td>
                </tr>
                @endforeach
            }
        }
        @else{
                <tr>
                    <td colspan="4">Khong co nguoi dung</td>
                </tr>
            }
        @endif    
    </tbody>
</table>
@endsection