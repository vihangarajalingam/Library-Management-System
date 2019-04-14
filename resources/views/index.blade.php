@extends('include.layout')
@section('content')
    <!-- Main content -->
    <div class="section">
        <div class="container">
            <div class="row">
                @foreach($books as $book)
                    <div class="col-md-3">
                        <div class="card">
                            <a href="#" onclick="document.getElementById('book-details-form').submit()">
                                <img class="card-img-top" src="{{asset('img/favicon.png')}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$book->title}}</h5>
                                </div>
                            </a>
                            <form id="book-details-form" action="{{route('bookDetails')}}"
                                  method="post">
                                @csrf
                                <input id="id" name="id" hidden value="{{$book->id}}">
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <br>
            <div class="row">
                <div class="col-md-8 offset-md-3">
                    <a class="pagination pagination-primary">{{$books->links()}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
