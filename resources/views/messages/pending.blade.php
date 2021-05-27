@extends('layout')

@section('title')
    {{ $user->name }}
@endsection

@section('main')

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
    <div class="container-fluid text-center m-auto w-75">
        @foreach ($user->messages as $message)
            @if (!$message->show)
                <h3 class="shadow-lg w-auto rounded text-danger m-2 p-3">{{$message->content}}</h3>
                <a href="{{url('/reply/'.$message->id)}}"><button class="btn btn-outline-info ">Reply</button></a>
            @endif
        @endforeach
    </div>
@endsection
