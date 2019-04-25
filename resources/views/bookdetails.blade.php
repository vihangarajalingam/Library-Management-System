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
                        <form action="{{route('changeStatus')}}" method="post">
                            @csrf
                            Status:
                            @if($statusDescription->id == 1)
                                <label class="bg-success">{{$statusDescription->description}}</label>
                            @elseif($statusDescription->id == 2)
                                <label>{{$statusDescription->description}}</label>
                            @endif
                            <input id="id" name="id" hidden value="{{$book->id}}">
                            <br>
                            <button type="submit" class="btn btn-primary">MARK AS BORROWED</button>
                        </form>
                    </h4>
                    <form action="{{route('home')}}" method="get">
                        <button type="submit" class="btn btn-default">BACK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
