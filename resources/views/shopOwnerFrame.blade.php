<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
        }
        .image1 {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }
        .navbar {
            display: flex;
            border: none;
            margin: 2%;
            background-color: #061c47;
            width: 96%;
            height: 50px;
            padding: 1.5%;
            color: #b9dbf0;
            font-weight: bold;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            z-index: 4;
        }
        .navbar-toggler-icon {
            width: 20px;
            height: 20px;
            border: 2px solid white;
            background-color: white;
        }
        .navbar-collapse {
            background-color: rgba(6, 28, 71, 0.9);
            padding-left: 4%;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }
        .modal-content {
            margin: 0%;
            width: 500px;
            height: 500px;
            border-radius: 50%;
        }
        .image2 {
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }
        .nav-link, .navbar-brand {
            color: #b9dbf0;
            font-size: 90%;
        }
        footer {
            margin-top: 4%;
            padding: 5%;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none;
            background-color: #061c47;
            color: #fff;
        }
        .footer-link {
            text-decoration: none;
            color: #ccd996;
        }
        .logo {
            border-radius: 10px;
            margin: 0% 3% 0% 0%;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <img class="logo" src="https://c8.alamy.com/comp/2BKG67G/speed-fire-bike-logo-2BKG67G.jpg" alt="BIKE" width="50px" height="30px">
        <a class="navbar-brand" href="#">Brand</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon light"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    @if($user && $user->userType)
                        <a class="nav-link" href="/shopOwnerHome/{{$user->id}}">Home</a>
                    @elseif($user && $user->users_id)
                        <a class="nav-link" href="/shopOwnerHome/{{$user->users_id}}">Home</a>
                    @endif
                </li>
                <li class="nav-item">
                    @if($user && $user->userType)
                        <a class="nav-link" href="/shopOwnerAbout/{{$user->id}}">About us</a>
                    @elseif($user && $user->users_id)
                        <a class="nav-link" href="/shopOwnerAbout/{{$user->users_id}}">About us</a>
                    @endif
                </li>
                <li class="nav-item">
                    @if($user && $user->userType)
                        <a class="nav-link" href="/editShop/{{$user->id}}">Register MY Shop</a>
                    @endif
                </li>
                @if($user && $user->users_id)
                    <li class="nav-item">
                        <a class="nav-link" href="/historySO/{{$user->id}}">History</a>
                    </li>
                    <li>
                        <a class="nav-link" href="/editShop/{{ $user->users_id}}">Update Profile</a>
                    </li>
                @endif
                <li class="nav-item">
                    @if($user && $user->userType)
                        <a class="nav-link" href="/shopOwnerContact/{{$user->id}}">Contact</a>
                    @elseif($user && $user->users_id)
                        <a class="nav-link" href="/shopOwnerContact/{{$user->users_id}}">Contact</a>
                    @endif            
                </li>
                <li class="nav-item">
                    <span class="nav-link profile-icon" data-toggle="modal" data-target="#profileModal">
                        @if($image=='upload')
                            <img src="https://via.placeholder.com/30" alt="Profile" class="rounded-circle image1">
                        @else
                            <img src="{{ Storage::url('public/profile/'.$image->image) }}" alt="Profile" class="rounded-circle image1">
                        @endif
                    </span>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            @if($image=='upload')
                <img src="https://via.placeholder.com/500" alt="Profile" class="img-fluid rounded-circle image2">
            @else
                <img src="{{ Storage::url('public/profile/'.$image->image) }}" alt="Profile" class="image2">
            @endif
        </div>
    </div>
</div>

<div>
    @yield('content')
</div>

<footer>
    <div class="div6">
        <h4>BOOK SERVICE APPLICATION</h4>
        <p>Master productivity with Creative Console and get all the latest Service news.</p>
        <div class="div5">
            <img src="https://cdn1.vectorstock.com/i/1000x1000/22/25/instagram-icon-vector-29782225.jpg" alt="insta" width="8%" height="40px">
            <img src="https://cdn3.iconfinder.com/data/icons/picons-social/57/43-twitter-512.png" alt="youtube" width="8%" height="40px">
            <img src="https://cdn3.iconfinder.com/data/icons/picons-social/57/46-facebook-512.png" alt="FB" width="8%" height="40px">
            <img src="https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/youtube-icon.png" alt="Twitter" width="8%" height="40px">
        </div>
        <p class="text-center">© Bike Service 2024</p>
    </div>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

