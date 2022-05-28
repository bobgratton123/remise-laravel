<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}}</title>
     <!-- Fonts -->
     <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
    <style>
        body{
            font-family: 'Nunito'
        }
    </style>
</head>
<body>
    @php $locale = session()->get('locale'); @endphp
<nav class="navbar navbar-light navbar-expand-lg mb-5">
        <div class="container">          
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link @if($locale=='en')bg-secondary text-light @endif" href="{{route('lang', 'en')}}"><img src="{{ asset('img/flag/en.png')}}" alt="English"> English</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($locale=='fr') bg-secondary text-light @endif" href="{{route('lang', 'fr')}}"><img src="{{ asset('img/flag/fr.png')}}" alt="Français"> Français</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login')}}">@lang('lang.menu_login')</a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('registration')}}">@lang('lang.menu_register')</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog')}}">@lang('lang.menu_forum')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fileUpload')}}">@lang('lang.menu_fileUpload')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout')}}">@lang('lang.menu_logout')</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</body>
    <script src="{{asset('js/bootstrap.min.js')}}" ></script>
</html>