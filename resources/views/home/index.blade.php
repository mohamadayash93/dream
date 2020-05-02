@extends('home.layout')
@section('home-content')
    @includeif('home._'.Auth::user()->role)
@overwrite
