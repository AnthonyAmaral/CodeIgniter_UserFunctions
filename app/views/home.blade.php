@extends('layout.main')

@section('content')
    @if(Auth::check())
        Hello, {{ Auth::user()->username }}
        
    
    @else
        You are not signed in.
    @endif
@stop