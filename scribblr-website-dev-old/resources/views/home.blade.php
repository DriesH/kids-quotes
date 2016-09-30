@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <home></home>
    @else

    @endif
@endsection
