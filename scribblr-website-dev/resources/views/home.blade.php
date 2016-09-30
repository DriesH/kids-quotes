@extends('layouts.app')


@section('styles')
    <link rel="stylesheet" href="/css/_child_view.css" media="screen" title="no title">
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <button type="button" name="showForm" id="showFormButton" class="btn btn-default"><i class="fa fa-plus"></i> add child</button>
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
                                    <input type="radio" name="optionsRadios" id="boy" value="girl">
                                    Girl
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="childName">Date of birth: </label>
                                <input type="text" name="dateOfBirth" value="11/11/01">
                            </div>
                            <button type="submit" name="addChild" id="addChildButton" class="btn btn-default"><i class="fa fa-plus"></i> add child</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="js/serializeObject.js" charset="utf-8"></script>
    <script src="js/app.js" charset="utf-8"></script>
@endsection
