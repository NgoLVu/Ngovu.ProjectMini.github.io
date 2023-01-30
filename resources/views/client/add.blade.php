@extends('layouts.client')
@section('title')
{{$title}}
@endsection
@section('content')
<h2>Them san pham</h2>
<form action="" method="post">
    <input type="text" name="username" id="">
    @csrf
    <button type="submit">Submit</button>
    @method('PUT')
</form>
@endsection


