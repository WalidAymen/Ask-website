@extends('layout')

@section('title')
    Register
@endsection

@section('main')
<div class="text-center m-auto">
    <h1>Register</h1>
    @include('errors')
    <form method="POST" action="{{ url('/register') }}">
        @csrf
        <input class="m-auto form-control w-50"  type="text" name="name" placeholder="name">
        <br>
        <input class="m-auto form-control w-50"  type="email" name="email" placeholder="email">
        <br>
        <input class="m-auto form-control w-50"  type="password" name="password" placeholder="password">
        <br>
        <input class="m-auto form-control w-50"  type="password" name="password_confirmation" placeholder="password confirm">
        <br>
        <input class="btn btn-outline-primary form-control w-25 m-auto" type="submit" value="register">
    </form>
</div>
@endsection
