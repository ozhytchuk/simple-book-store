@extends('layouts.main')

@section('title', "Book store: $q")
@section('page_name', 'search_word')

@section('content')
    @include('partials.search.index')
@stop