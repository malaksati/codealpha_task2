<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/images/fb_icon.png') }}" type="image/x-icon">
    <title>Facebook - Sign up</title>
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

<body style="background-color: #F2F4F7">
    <div class="container py-5">
        <div class="w-50 m-auto">
            <h2 class="my-2" style="width: fit-content;">Sign Up</h2>
            <p class="my-1" style="width: fit-content;">It's quick and easy</p>
            <hr>
        </div>

        <form action="{{ url('/register') }}" method="post" enctype="multipart/form-data" class="w-50 m-auto">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <input type="text" required class="form-control" placeholder="First Name" name="fname">
                </div>
                <div class="col">
                    <input type="text" required class="form-control" placeholder="Surname" name="lname">
                </div>
            </div>
            <div class="mb-3">
                <input type="email" required class="form-control" placeholder="Email Address" name="email">
            </div>
            <div class="mb-3">
                <input type="password" required class="form-control" placeholder="Password" name="password">
            </div>
            <div class="mb-3">
                <label for="date">Date of birth</label>
                <input type="date" class="form-control" id="date" name="birthdate">
            </div>
            <div class="mb-3">
                <label for="gender">Gender</label>
                <div class="d-flex gender">
                    <div class="p-2 border">
                        <label for="female">Female</label>
                        <input type="radio" name="gender" id="female" value="female">
                    </div>
                    <div class="p-2 border mx-2">
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="male" value="male">
                    </div>
                    <div class="p-2 border">
                        <label for="other">Other</label>
                        <input type="radio" name="gender" id="other" value="other">
                    </div>
                </div>
            </div>
            <button type="submit" class="reg">Register</button>
        </form>
    </div>
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
</body>

</html>
