{{--<nav class="navbar navbar-toggleable-md bg-black fixed-top">--}}
    {{--<div class="container">--}}
        {{--<div class="navbar-translate">--}}
            {{--<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"--}}
                    {{--data-target="#navigation" aria-controls="navigation-index" aria-expanded="false"--}}
                    {{--aria-label="Toggle navigation">--}}
                {{--<span class="navbar-toggler-bar bar1"></span>--}}
                {{--<span class="navbar-toggler-bar bar2"></span>--}}
                {{--<span class="navbar-toggler-bar bar3"></span>--}}
            {{--</button>--}}
            {{--<a class="navbar-brand" href="{{url('/')}}" rel="tooltip" data-placement="bottom">--}}
                {{--<p style="font-size: x-large; font-weight: bold">Library</p>--}}
            {{--</a>--}}
        {{--</div>--}}
        {{--<div class="collapse navbar-collapse justify-content-end" id="navigation">--}}
            {{--<ul class="navbar-nav">--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{url('/home')}}">--}}
                        {{--<p>Home</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{url('/home#packages')}}">--}}
                        {{--<p>Check-in</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{url('/home#packages')}}">--}}
                        {{--<p>Login</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{url('/comments')}}">--}}
                        {{--<p>Contact</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</nav>--}}
<nav class="navbar navbar-expand-lg bg-primary navbar-toggleable-md fixed-top bg-black">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><p style="font-size: x-large; font-weight: bold">Library</p></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
