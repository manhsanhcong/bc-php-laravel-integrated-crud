@extends('home1')

@section('content')
    <a class="navbar-brand">My Book</a>
    <p>
        <a href="{{route('book.index')}}" class="btn btn-default">Return book</a>
    </p>

    <h1>{{$book->title}}</h1>
    <p>{{$book->descriptron}}</p>
    <p>{{$book->content}}</p>
    <p>{{$book->image}}</p>

@endsection