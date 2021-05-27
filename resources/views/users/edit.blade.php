@extends('layout')

@section('title')
    {{ $user->name }}
@endsection

@section('main')
@include('errors')

<form action="{{url('/update/'.$user->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container text-center w-75 m-auto">
        @if ($user->img!=null)
            <img class="rounded-circle" src="{{asset("uploads/$user->img")}}" width='25%'>
        @else
            <img class="rounded-circle my-4" src="{{asset("uploads/user/unknown.png")}}" width='25%'>
        @endif
        <input type="file" class="form-control-file" name="img" >
        <input class="my-4 text-dark form-control" type="text" name="name" placeholder="nem" value="{{ $user->name }}">
        <textarea class="w-75 m-auto form-control"  name="bio" rows="3" placeholder="bio">{{ $user->bio }}</textarea><br>
        <a class="text-decoration-none " href="{{url('/edit/'.$user->id)}}"><button class="m-auto w-25 btn btn-outline-info form-control">update</button></a>
        <hr>
    </div>
</form>
@endsection
