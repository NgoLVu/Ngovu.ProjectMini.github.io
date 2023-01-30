@extends('layouts.client')
@section('title')
{{$title}}
@endsection

@section('content')
<h2>{{$title}}</h2>
@if(session('msg'))
        <div class="alert alert-success">{{session('msg')}}</div>

    @endif
<a href="{{route('user.add')}}" class="btn btn-primary">Add new user</a>
<hr />
<form action="" method="GET" class="mb-3">
    <div class="row">
        <div class="col-3">
            <select class="form-control" name="group_id">
                <option value="0">All</option>
                {{-- Lấy dữ liệu bên function :group --}}
                @if (!@empty(getAllGroup()))
                @foreach (getAllGroup() as $item)
                <option value="{{$item->id}}"
                    {{request()->group_id==$item->id?'selected':false}}>
                    {{$item->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="col-3">
            <select  id="" class="form-control" name="status">
                <option  value="0">tat ca trang thai</option>
                <option  value="active" {{request()->status=='active'?'selected':false}} >kich hoat</option>
                <option value="inactive" {{request()->status=='inactive'?'selected':false}}>chua kich hoat</option>
            </select>
        </div>
        <div class="col-4">
            <input type="search" name="keywords" id="" class="form-control" placeholder="sreach" value="{{request()->keywords}}">

        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-secondary btn-block">Sreach</button>
        </div>
    </div>
</form>
<hr/>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th><a href="?sort-by=tendangnhap&sort-type={{$sortType}}"> UserName</a></th>
            <th><a href="?sort-by=matkhau&sort-type={{$sortType}}">Password</a></th>
            <th>Nhóm</th>
            <th width="17%">Trạng thái</th>
            <th width="10%"><a href="?sort-by=created_at&sort-type={{$sortType}}">Create_at</a></th>
            <th width="10%">Update_at</th>
            <th width="5%">Edit</th>
            <th width="5%">Delete</th>
        </tr>
    </thead>
    <tbody>
    @if(!empty($userslist))
            @foreach($userslist as $key=>$item)
                <tr>
                    {{-- <td>{{$key+1}}</td> --}}
                    <td>{{$item->id}}</td>
                    <td>{{$item->tendangnhap}}</td>
                    <td>{{$item->matkhau}}</td>
                    <td>{{$item->group_name}}</td>
                    <td>
                        {!!$item->status==0?
                        '<Button class="btn btn-danger btn-sm">Chua kich hoat</Button>':
                        '<Button class="btn btn-success btn-sm">kich hoat</Button>'
                    !!}
                    </td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td><a href="{{route('user.edit',['id'=>$item->id])}}" class="btn btn-warning btn-sm">Edit</a></td>
                    <td><a onclick="return confirm('Ban co chac chac muon xoa khong')" href="{{route('user.delete',['id'=>$item->id])}}" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                @endforeach

        @else
                <tr>
                    <td colspan="6">Khong co nguoi dung</td>
                </tr>
        @endif
    </tbody>
</table>
<div class="d-flex justify-content-center">{{$userslist->links()}}</div>
@endsection
