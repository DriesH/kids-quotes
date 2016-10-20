<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="_token" name="_csrf-token" value="{{ csrf_token() }}">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon.ico">

        <title>Scribblr</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Lobster|Raleway:300,400,500,700" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/animate.css" media="screen" title="no title">
        <link rel="stylesheet" href="/css/_global.css" media="screen" title="no title">

        @yield('styles')

    </head>
    <body>
        <div id="app">
            {{-- @include('partials.navbar') --}}
            @yield('content')
        </div>
        @include('partials.script')
    </body>
</html>
