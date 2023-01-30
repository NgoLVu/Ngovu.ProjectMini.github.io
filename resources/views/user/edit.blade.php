@extends('layouts.client')
@section('title')
{{$title}}
@endsection

@section('content')
<h2>{{$title}}</h2>
<form action="{{route('user.update')}}" method="post">
    @if(session('msg'))
        <div class="alert aler-success">{{session('msg')}}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger text-center">
            <span>{{$errormessage}}</span>
        </div>
    @endif
    <div class="mb-4">
        <label for="name">UserName</label>
        <input type="text" class="form-control" name="name" id="name_id" placeholder="UserName" value="{{old('name') ?? $editUsers->tendangnhap}}">
        @error('name')
        <span style="color:red;">{{$message}}</span>

        @enderror

    </div>
    <div class="mb-4">
        <label for="name">Password</label>
        <input type="text" class="form-control" name="pass" id="pass_id" placeholder="Password" value="{{old('pass')?? $editUsers->matkhau}}">
        @error('pass')
        <span style="color:red;">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-2">
        <label for="name">Nhóm</label>
        <select name="group_id" id="" class="form-control">
            <option value="0">
                Chọn nhóm
            </option>
            @if (!@empty(allGroups)){
                @foreach ($allGroups as $item )
                <option value="{{$item->id}}" {{old('groud_id')==$item-> id|| $editUsers->group_id==$item->id?'selected':false}}>
                    {{$item->name}}
                </option>
                @endforeach
            }
            @endif
        </select>
        @error('group_id')
        <span style="color:red;">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-2">
        <label for="name">Trạng thái</label>
        <select name="status" id="" class="form-control">
            <option value="0" {{old('status')==0 || $editUsers->status==0 ?'selected':false}}>Chưa kích hoạt</option>
            <option value="1" {{old('status')==1 || $editUsers->status==1 ?'selected':false}}>kích hoạt</option>
        </select>
        @error('status')
        <span style="color:red;">{{$message}}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{route('user.index')}}" class="btn btn-warning">Back</a>
    @csrf
</form>
@endsection
