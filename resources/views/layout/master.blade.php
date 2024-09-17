<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/images/fb_icon.png') }}" type="image/x-icon">
    <title>@yield('title')</title>
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- Main CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
</head>

<body>
    <nav class="navbar">
        <div class="container ">
            <div class="nav-brand">
                <img style="width: 40px;" src="{{ asset('assets/images/fb_icon.png') }}" alt="">
            </div>
            <ul>
                <li class="nav-link"><a href="{{ url('/') }}"><i
                            class="fa fa-2x fa-solid fa-house-chimney"></i></a></li>
                <li class="nav-link"><a href="{{ url('/profile') }}"><i class="fa fa-2x fa-solid fa-user"></i></a></li>
            </ul>
            <div class="profile-sec d-flex">
                <a href="{{ url('profile') }}"><img style="width: 50px;" class="rounded-circle" src="{{ asset(Auth::user()->image) }}" alt=""></a>
                <ul style="list-style: none;padding: 0;">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="font-size: 20px;" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"></a>
                    <div class="dropdown-menu" style="min-width: 8rem !important;margin: 0.5rem 0 0;">
                      <a class="dropdown-item" href="{{ url('/profile') }}">Profile</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                    </div>
                  </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>
