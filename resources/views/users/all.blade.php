@extends('layout')
@section('title')
All users
@endsection
@section('main')
<form class="text-center d-flex justify-content-center" action="{{ url('/search') }}" method="GET">
    <input class="mx-3 form-control w-50" type="text" name="keyword" placeholder="Search for users by name... ">
    <input class="btn btn-outline-warning form-control w-25" type="submit" value="search">
</form>
<div class="d-flex justify-content-between text-center row my-5">
@foreach ($users as $user)
    <div class="col-md-4">
        @if ($user->img!=null)
            <img class="rounded-circle img-fluid" src="{{asset("uploads/$user->img")}}" width='25%'>
        @else
            <img class="rounded-circle my-4" src="{{asset("uploads/user/unknown.png")}}" width='25%'>
        @endif<h3><a href="{{ url("user/show/$user->id") }}">
        <a class="text-decoration-none" href='{{url("/users/$user->id")}}'><h1>{{ $user->name }}</h1></a>
    </div>
@endforeach
</div>
{{$users->links()}}
@endsection

