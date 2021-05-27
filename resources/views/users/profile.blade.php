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
    <a href="{{url('/edit/'.$user->id)}}"><button class="btn btn-outline-info">Edit profile</button></a>
    <a href="{{url('/pending/'.$user->id)}}"><button class="btn btn-outline-danger">Pending Messager</button></a>

    <hr>
    </div>
    <div class="container-fluid w-75">
        @foreach ($user->messages as $message)
            @if ($message->show)
                <div class=" m-auto border border-3 border-primary rounded-3 my-5">
                    <h6 class="rounded-3 text-warning text-center shadow-lg my-3 p-4">{{$message->content}}</h6>
                    <h5 class="text-danger reply my-2 p-3 text-left">{{$message->reply}}</h5>
                </div>
            @endif
        @endforeach
    </div>
@endsection
