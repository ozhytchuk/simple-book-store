@extends('layouts.main')

@section('title', "Book store: $parameter")
@section('page_name', 'sort')

@section('content')
    @include('partials.sort.search')
    @include('partials.sort.index')
@stop