@extends('layouts.layout-app')

@section('styles')
    <link rel="stylesheet" href="/css/_simple_sidebar.css" media="screen" title="no title">
    <link rel="stylesheet" href="/css/_personal_dashboard.css" media="screen" title="no title">
    <link rel="stylesheet" href="/css/_body_dashboard_personal.css" media="screen" title="no title">
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
@endsection

@section('scripts')

@endsection
