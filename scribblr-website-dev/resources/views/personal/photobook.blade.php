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

        .jumbotron h1 {
            font-family: lobster;
            color: rgb(70, 70, 70);
            text-align: center;
        }

        .jumbotron p {
            color: #000;
            font-family: 'Source Sans Pro', sans-serif;
            text-align: center;
            font-weight: 400;
            margin-top: 30px;
            margin-bottom: 0;
        }

        .top-buffer {
            margin-top: 90px;
        }

        .quote img {
            border-radius: 10px;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        input[type="checkbox"][id^="myCheckbox"] {
            display: none;
        }

        label {
            border: 1px solid #fff;
            padding: 10px;
            display: block;
            position: relative;
            margin: 10px;
            cursor: pointer;
        }

        label:before {
            background-color: white;
            color: white;
            content: " ";
            display: block;
            border-radius: 50%;
            border: 1px solid grey;
            position: absolute;
            top: -5px;
            left: -5px;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 28px;
            transition-duration: 0.4s;
            transform: scale(0);
        }

        label img {

            transition-duration: 0.2s;
            transform-origin: 50% 50%;
        }

        :checked + label {
            border-color: #ddd;
        }

        :checked + label:before {
            content: "✓";
            background-color: grey;
            transform: scale(1);
        }

        :checked + label img {
            transform: scale(0.9);
            /* box-shadow: 0 0 5px #333; */
            z-index: -1;
        }

        .printbutton {
            position: fixed;
            bottom: 0;
            right: 0;
            margin-right: 50px;
            margin-bottom: 10px;
            padding: 10px 30px;
            box-shadow: 2px 2px  5px #000;

        }

    </style>
@endsection

@section('content')
    <nav-bar></nav-bar>

    <div class="container top-buffer">

        <div class="jumbotron">
            <h1>Let's start printing!</h1>
            <p>
                Please select a minimum of {{$minQuotesPerPrint}} and a maximum of {{$maxQuotesPerPrint}} quotes to get your printed version.
            </p>
        </div>
        @if ( session()->has('message'))
            <div class="alert alert-info alert-dismissable">{{ session()->get('message') }}</div>
        @endif
        <form class="" action="" method="POST">
            {{ csrf_field() }}
            @foreach ($allQuotes as $quote)
                <div class="col-md-4">
                    <div class="quote">
                        <div class="show-image">
                            <input type="checkbox" id="myCheckbox{{$quote->id}}" name="myCheckbox{{$quote->id}}" />
                            <label for="myCheckbox{{$quote->id}}">
                                <img class="img-responsive" src="/pictures/uploadedbackground/withquote/{{ $quote->backgr_with_quote }}" />
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach
            <input type="submit" class="printbutton btn btn-success" name="print!" value="Print!">
        </form>
    </div>

@endsection

@section('scripts')

@endsection
