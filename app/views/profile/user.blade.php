@extends('layout.main')

@section('content')
    {{ e($user->username) }} ({{ e($user->email) }})
@stop
