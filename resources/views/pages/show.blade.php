@extends('layouts.main')

@section('title', "$book->title")
@section('page_name', 'show')

@section('content')
    @include('partials.show.breadcrumb')
    @include('partials.show.index')
@stop