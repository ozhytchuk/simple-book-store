@extends('layouts.main')

@section('title', "Book store")
@section('page_name', 'search_tag')

@section('content')
    @include('partials.search_tag.search')
    @include('partials.search_tag.index')
@stop