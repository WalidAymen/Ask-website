@extends('layout')

@section('title')
    {{ $message->user->name }}
@endsection

@section('main')

    <div class="container m-auto text-center">
        @if ($message->user->img!=null)
            <img class="rounded-circle" src="{{asset("uploads/".$message->user->img)}}" width='25%'>
        @else
        <img class="rounded-circle my-4" src="{{asset("uploads/user/unknown.png")}}" width='25%'>
        @endif
    <h1 class="my-4 text-dark">{{ $message->user->name }}</h1>
    <p>{{ $message->user->bio }}</p>
    <hr>
    </div>
        @if (!$message->show)
            <form class="w-75 m-auto text-center" action="{{url("/reply/$message->id")}}" method="post">
                @csrf
                <h3 class="shadow-lg w-auto rounded text-danger m-2 p-3">{{$message->content}}</h3>
                <textarea class="form-control my-4" name="reply" rows="3" placeholder="Reply..."></textarea>
                <input class="w-25 btn btn-outline-warning form-control" type="submit" value="Reply">
            </form>
        @endif
    </div>
@endsection
