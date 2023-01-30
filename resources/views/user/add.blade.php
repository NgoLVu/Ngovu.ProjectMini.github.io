@extends('layouts.client')
@section('title')
{{$title}}
@endsection

@section('content')
<h2>{{$title}}</h2>
<form action="" method="post">
    @if(session('msg'))
        <div class="alert aler-success">{{session('msg')}}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger text-center">
            <span>{{$errormessage}}</span>
        </div>
    @endif
    <div class="mb-2">
        <label for="name">Tên</label>
        <input type="text" class="form-control" name="name" id="name_id" placeholder="Tên" value="{{old('name')}}">
        @error('name')
        <span style="color:red;">{{$message}}</span>

        @enderror

    </div>
    <div class="mb-2">
        <label for="name">mật khẩu</label>
        <input type="text" class="form-control" name="pass" id="pass_id" placeholder="Mật khẩu" value="{{old('pass')}}">
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
            @if (!@empty($allGroups)){
                @foreach ($allGroups as $item )
                <option value="{{$item->id}}" {{old('groud_id')==$item->id?'selected':false}}>
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
            <option value="0" {{old('status')==0?'selected':false}}>Chưa kích hoạt</option>
            <option value="1" {{old('status')==1?'selected':false}}>kích hoạt</option>
        </select>
        @error('status')
        <span style="color:red;">{{$message}}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
    <a href="{{route('user.index')}}" class="btn btn-warning">Back</a>
    @csrf
</form>
@endsection
