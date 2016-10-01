@extends('layouts.app')


@section('styles')
    <link rel="stylesheet" href="/css/_children_dashboard.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="/css/_simple_sidebar.css" media="screen" title="no title" charset="utf-8">
@endsection


@section('content')

    <!-- Modal transparent -->
    <div class="modal modal-transparent fade" id="modal-transparent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="dashboardMain">
        <div class="row" id="dashboardMainRow">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar" id="childrenList">
                    @if($children == 'empty')
                        <li><a>No children yet!</a></li>
                    @else
                        @foreach($children as $child)
                            <li><a >{{ $child->name }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Dashboard</h1>

                <div class="row placeholders">
                    <div class="col-xs-6 col-sm-3 placeholder">
                        <div class="thumbnail" id="addNewChildThumb">
                            <h3>Add a new child!</h3>
                            <div class="caption">
                                <button type="button" name="showForm" id="showFormButton" class="btn btn-default"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>


                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder">
                        <form id="newChildForm" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="childName">Name: </label>
                                <input type="text" name="childName" value="Test" id="childName">
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="boy" value="boy" checked>
                                    Boy
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="girl" value="girl">
                                    Girl
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="dateOfBirth">Date of birth: </label>
                                <input type="text" name="dateOfBirth" value="11/11/01">
                            </div>
                            <button type="submit" name="addChild" id="addChildButton" class="btn btn-default"><i class="fa fa-plus"></i> add child</button>
                        </form>
                    </div>
                </div>

                <h2 class="sub-header"></h2>
                <div class="table-responsive">
                    <table class="table table-striped">

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="js/serializeObject.js" charset="utf-8"></script>
    <script src="js/app.js" charset="utf-8"></script>
    <script src="js/quote.js" charset="utf-8"></script>
@endsection
