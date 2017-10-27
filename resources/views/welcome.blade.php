<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RecommApp</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #000;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .vcontainer{

            justify-content: center;
            width: 100%;
            padding: 5px;
            height: auto;
            display: flex;
            margin-left: .5%;
            flex-wrap: wrap;
            align-content: center;
            }
            .box,.front,.back{
            height: 285px;
            width: 305px;

            }
            .box{

            perspective: 1000;  
            border:0px solid #fff;

            }
            .box:hover .flipper,.box.hover .flipper{
            -webkit-transform:rotateY(180deg);
            transform: rotateY(180deg);
            }
            .flipper{

            -webkit-transition:1s;
            -webkit-transform-style:preserve-3d;
            transition: 0.8s;
            transform-style: preserve-3d;
            position: relative;
            }
            .front{
            background-size:305px 285px;
            background-repeat:no-repeat;

            z-index: 2;

            }
            .back{
            text-align: center;
            -webkit-transform:rotateY(180deg);
            transform: rotateY(180deg);

            }
            .front,.back{
            position: absolute;
            top: 0;
            left: 0;
            -webkit-backface-visibility:hidden;
            backface-visibility: hidden;
            }
            .back p{
            margin: auto;
            margin-top: 40%;
            width: 100%;
            line-height: 30px;
            font-family: raleway;
            font-weight: bold;
            font-size: 30px;

            position: absolute;
            color: white;
            }

            
            .fvenue{
            background-image:url("http://cdn.movieweb.com/img.teasers.posters/FIigJrmohSTEmi_3_c/Baywatch.jpg");
            }
            .foutfit{
            background-image:url("http://cdn.movieweb.com/img.teasers.posters/FIORXUOSEqvuTR_362_c/Inception.jpg");
            }
            .fmakeover{
            background-image:url("https://goodmovieslist.com/best-movies/movie-posters/tt0111161.jpg");
            }
            .fcards{
            background-image:url("http://cdn.movieweb.com/img.teasers.posters/FItz8hErDYz6wB_377_c/Inside-Out.jpg");
            }
            .fjewellery{
            background-image:url("https://qph.ec.quoracdn.net/main-qimg-9f22dde3c9837e136bd7c3f6657a1f02-c");
            }
            .fsangeet{
            background-image:url("https://i.ytimg.com/vi/qCvW2r2CqQg/maxresdefault.jpg");
            }
            .bphoto{
            background-color: #F48FB1;
            }
            .bdecorators{
            background-color: #AB47BC;
            }
            .bvenue{
            background-color: #F48FB1;
            }
            .boutfit{
            background-color: #AB47BC;
            }
            .bmakeover{
            background-color: #AB47BC;
            }
            .bcards{
            background-color: #F48FB1;
            }
            .bjewellery{
            background-color: #AB47BC;
            }
            .bsangeet{
            background-color: #F48FB1;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    RecommApp
                </div>

                <div class="links">
                    <!--<a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>-->
                    <a href="/login">Find movies for me!</a>
                </div>
            </div>
        
        <div class="vcontainer" id="ven">
        

        <a href="/select_vendor?catg=Venue"><div class="box">
        <div class="flipper">
        <div class="front fvenue"></div>
        <div class="back bvenue">
        <p>COMEDY</p>
        </div>
        </div>
        </div></a>

        <a href="/select_vendor?catg=Outfit"><div class="box">
        <div class="flipper">
        <div class="front foutfit"></div>
        <div class="back boutfit">
        <p>THRILLER</p>
        </div>
        </div>
        </div></a>

        <div class="box">
        <div class="flipper">
        <div class="front fmakeover"></div>
        <div class="back bmakeover">
        <p>DRAMA</p>
        </div>
        </div>
        </div>
        <div class="box">
        <div class="flipper">
        <div class="front fcards"></div>
        <div class="back bcards">
        <p>ANIMATION</p>
        </div>
        </div>
        </div>
        <div class="box">
        <div class="flipper">
        <div class="front fjewellery"></div>
        <div class="back bjewellery">
        <p>ROMANTIC</p>
        </div>
        </div>
        </div>
        <div class="box">
        <div class="flipper">
        <div class="front fsangeet"></div>
        <div class="back bsangeet">
        <p>MUSICAL</p>

        </div>
        </div>
        </div>
        </div>
        </div>
    </body>
</html>
