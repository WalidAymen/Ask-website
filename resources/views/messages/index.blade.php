@extends('layout')
@section('title')
All messages
@endsection
@section('main')
@foreach ($cats as $cat)
<hr>
<h3><a href="{{ url("cats/show/$cat->id") }}">
    {{ $cat->id }} - {{ $cat->name }}</a></h3>
<a href="{{ url("cats/edit/$cat->id") }}">edit</a>
<a href="{{ url("cats/delete/$cat->id") }}">delete</a>
<p>{{ $cat->desc }}</p>
<img src="{{asset("uploads/$cat->img")}}" width='25%'>
@endforeach
{{$cats->links()}}
@endsection

