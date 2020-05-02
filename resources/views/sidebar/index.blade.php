@extends('sidebar.layout')
@section('sidebar-content')
    @if(Auth::user()->role == "admin")
        @include('sidebar._admin')
    @else
        @include('sidebar._entry')
    @endif
@overwrite