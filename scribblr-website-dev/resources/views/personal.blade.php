@extends('layouts.layout-app')

@section('style')
    <link rel="stylesheet" href="/css/_dev_Banner.css" media="screen" title="no title">
    <link rel="stylesheet" href="/css/animate-vue.css" media="screen" title="no title">
    <style>
        nav {
            width: 100%;
            height: 80px;
            background-color: rgba(0, 0, 0, 0.7);
        }
    </style>
@endsection

@section('content')
    @include('partials.navbar')
    <parent-wrap></parent-wrap>
@endsection
