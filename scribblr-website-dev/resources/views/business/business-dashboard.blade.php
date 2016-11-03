{{--<style media="screen">
    .illustration {
        width: 100px;
        height: auto;
    }
</style>

<div class="container">
    @foreach($themes as $theme)
            <a href="?filter={{$theme->id}}">{{$theme->theme_name}}</a>
    @endforeach

    <a href="?filter=random">random</a>

    @foreach($businessQuotes as $businessQuote)
        <div class="container">
            <img src="/business_imgs/{{$businessQuote->illustration_name}}" alt="" class="illustration"/>
            {{ $businessQuote->quote->quote }}
            <p>
                theme: <strong>{{$businessQuote->theme->theme_name}}</strong>
            </p>
        </div>
    @endforeach
</div> --}}

@extends('layouts.layout-app')

@section('styles')
    <link rel="stylesheet" href="/css/_simple_sidebar.css" media="screen" title="no title">
    <link rel="stylesheet" href="/css/_business_dashboard.css" media="screen" title="no title">
    <link rel="stylesheet" href="/css/_body_dashboard_business.css" media="screen" title="no title">
    <style>
        nav{
            width: 100%;
            height: 80px;
            background-color: #2c3e50 !important;
        }
    </style>
@endsection

@section('content')
    <nav-bar></nav-bar>
    <dashboard-business></dashboard-business>
@endsection


@section('scripts')
    <script src="js/salvattore.js" charset="utf-8"></script>
@endsection
