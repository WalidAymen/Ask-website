@extends('layout')

@section('title')
    {{ $user->name }}
@endsection

@section('main')
@include('errors')

    <div class="container text-center">
        @if ($user->img!=null)
            <img class="rounded-circle" src="{{asset("uploads/$user->img")}}" width='25%'>
        @else
        <img class="rounded-circle my-4" src="{{asset("uploads/user/unknown.png")}}" width='25%'>
        @endif
    <h1 class="my-4 text-dark">{{ $user->name }}</h1>
    <p>{{ $user->bio }}</p>
    <hr>
    </div>
    <div class="my-5 w-75 container text-center ">
        <form method="POST" action='{{url("/message/send/$user->id")}}'>
            @csrf
            <textarea class="form-control" name="content" cols="30" rows="10"></textarea>
            <input class="my-3 w-25 btn btn-outline-danger form-control" type="submit" value="send message">
        </form>

    </div>
@endsection
