<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://kit.fontawesome.com/5c3f06488c.css" crossorigin="anonymous"> --}}

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg bg-body-tertiary d-flex align-items-center" data-bs-theme="dark" >
            <div class="container container-fluid d-flex align-items-center">
                <h3 class="text-center" style="color: #66EB9A;">We -  Fashion</h3>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll" style="margin-left: 50px;">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('product')}}" active="{{request()->routeIs('admin')}}" >PRODUITS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('category')}}" active="{{request()->routeIs('admin')}}">CATEGORIES</a>
                    </li>
                    </ul>
                    <div class="d-flex align-items-center">
                        <li class="nav-item dropdown" style="margin-left: -100px; color:white; list-style:none">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('profile.edit')}}">{{ __('Profile') }}</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                        this.closest('form').submit();">{{ __('Log Out') }}</a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </div>
                </div>
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('solde') }}" style="text-decoration:none">
                       <h1 style="color: white;"><i class="fa-solid fa-house"></i></h1>
                    </a>
                </div>
            </div>
        </nav>

        <main>
            @yield('content crud')
        </main>

    </body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/5c3f06488c.js" crossorigin="anonymous"></script>
