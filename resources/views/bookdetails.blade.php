@extends('include.layout')
@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{$book->title}}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"><br>
                    <img src="{{asset('img/favicon.png')}}">
                </div>
                <div class="col-md-9">
                    <h4>
                        Description:
                        <mark>{{$book->synopsis}}</mark>
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 offset-md-3">
                    <h4>
                        Status:
                        <mark>{{$statusDescription->description}}</mark>
                    </h4>
                </div>
            </div>
        </div>
    </div>
@endsection
