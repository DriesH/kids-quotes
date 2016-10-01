@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="/css/_quotes_dashboard.css" media="screen" title="no title">
@endsection

@section('content')
<div class="container">
    <div class="row" id="dashboardMainRow">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">These are your quotes.</div>
                    <div class="panel-body">
                        <ul id="quotesList">

                        </ul>
                        <button type="button" name="showForm" id="showFormButton" class="btn btn-default"><i class="fa fa-plus"></i> add quote</button>
                        <form id="newQuoteForm" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="quote">Quote: </label>
                                <textarea name="quote" rows="8" cols="40" id="quote"></textarea>
                            </div>
                            @foreach($children as $child)
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="child_id_radio" id="{{$child->id}}" value="{{$child->id}}" checked>
                                        {{$child->name}}
                                    </label>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <label for="backgrImg">Background image </label>
                                <img src="backgr_imgs/wood.jpg" alt="" class="backgr_thumbnail" />
                                <img src="backgr_imgs/chalkboard.jpg" alt="" class="backgr_thumbnail" />
                                <img src="backgr_imgs/paper.jpg" alt="" class="backgr_thumbnail" />
                            </div>
                            <button type="submit" name="addQuote" id="addQuoteButton" class="btn btn-default"><i class="fa fa-plus"></i> add quote</button>
                        </form>
                    </div>
            </div>

            <div class="panel panel-default">
                <p>
                    <h2>Preview</h2>

                    <img src="" alt="" class="img_preview" />
                </p>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="js/serializeObject.js" charset="utf-8"></script>
    <script src="js/app.js" charset="utf-8"></script>
@endsection
