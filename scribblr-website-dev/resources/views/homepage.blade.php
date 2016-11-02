@extends('layouts.layout-app')

@section('styles')
    <link rel="stylesheet" href="/css/_banner.css" media="screen" title="no title">
    <link rel="stylesheet" href="/css/animate-vue.css" media="screen" title="no title">
    <link rel="stylesheet" href="/css/_business_home_page.css" media="screen" title="no title">
@endsection

@section('content')
    @include('partials.navbar')
    <parent-wrap></parent-wrap>
@endsection
