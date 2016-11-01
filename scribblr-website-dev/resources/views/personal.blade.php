@extends('layouts.layout-app')

@section('style')
    <link rel="stylesheet" href="/css/_dev_Banner.css" media="screen" title="no title">
    <link rel="stylesheet" href="/css/animate-vue.css" media="screen" title="no title">
@endsection

@section('content')
    @include('partials.navbar')
    <parent-wrap></parent-wrap>
@endsection
