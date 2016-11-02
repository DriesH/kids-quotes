@extends('layouts.layout-app')

@section('style')
    <link rel="stylesheet" href="/css/_dev_Banner.css" media="screen" title="no title">
    <link rel="stylesheet" href="/css/animate-vue.css" media="screen" title="no title">
    <style>
        .nav-background {
            background: rgba(60, 60, 60, 0.6);
        }
    </style>
@endsection

@section('content')
    @include('partials.navbar')
    <parent-wrap></parent-wrap>
@endsection
