@extends('layouts.main')

@section('title', 'Book store')
@section('page_name', 'home')

@section('content')
    @include('partials.after_register.index')
    @include('partials.home.search')
    @include('partials.home.index')
@stop