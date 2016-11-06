@extends('layouts.layout-app')

@section('styles')
    <style media="screen">
        h1 {
            font-family: 'Lobster';
            text-align: center;
            font-size: 5em;
        }
        h1 a, h1 a:visited {
            color: #000;
            text-decoration: none;
            transition: all 0.5s;
        }
        h1 a:hover {
            text-decoration: none;
            color: #303030;
            text-shadow: 0px 2px 2px #000;
        }

        h1 {
            transition: 0.5s;
        }

        h1:hover {
            transform: translateY(-10px);
        }

        .row {
            text-align: center;
        }

        i.fa.fa-external-link:before {
            margin-top: 5px;
        }



    </style>
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <h1><a href="/">Scribblr</a></h1>
        </div>

        <div class="row">
        <div class="panel panel-default col-md-4 col-md-push-4">
            <div class="panel-body">
                <img class="center-block img-responsive" src="/pictures/uploadedbackground/withquote/{{$img}}" alt="" />
            </div>
        </div>
        </div>

        <div class="row">
            <a class="text-center btn btn-default" href="/"><i class="fa fa-external-link fa-fw"></i> Start Scribblin' today</a>
        </div>
    </div>
@endsection
