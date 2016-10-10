@extends('layouts.development-app')

@section('style')
    <link rel="stylesheet" href="/css/_dev_Banner.css" media="screen" title="no title">
@endsection

@section('content')
    <dev-nav-bar></dev-nav-bar>
    <dev-banner></dev-banner>
    <dev-content-home-page></dev-content-home-page>
@endsection

@section('script')
    <script src="js/app.js" charset="utf-8"></script>
@endsection
