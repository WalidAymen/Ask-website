@extends('layout')

@section('title')
    Login
@endsection

@section('main')


    <div class="text-center m-auto">
        <h1>Login</h1>
        @include('errors')
        <form method="POST" action="{{ url('/login') }}">
            @csrf

            <input class="m-auto form-control w-50" type="email" name="email" placeholder="E-Mail">
            <br>
            <input class="m-auto form-control w-50" type="password" name="password" placeholder="Password">
            <br>
            <input class="btn btn-outline-primary form-control w-25 m-auto" type="submit" value="login">
        </form>
    </div>
@endsection
