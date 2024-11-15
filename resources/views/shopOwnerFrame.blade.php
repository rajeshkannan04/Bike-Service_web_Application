<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background-color: #e8effc;
        }
        .image1{
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
            font-size: 90%;
            font-weight: bold;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            z-index: 4;
        }
        .navbar-toggler-icon{
            width: 20px;
            height: 20px;
            border: 2px solid white;
            background-color: white;
        }
        .modal-content{
            margin: 0%;
            width: 500px;
            height: 500px;
            border-radius:50%;
        }
        .image2{
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }
        .nav-link, .navbar-brand{
            color: #b9dbf0;
            font-size: 100%;
        }
        .div6{
            margin: 5% 1% 2% 6%;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 80%;
            color: #b9dbf0;
            line-height: 200%;
        }
        footer{
            margin-top: 4%;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none;
            background-color: #061c47;
        }
        .div4{
            margin: 5% 1% 2% 6%;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 80%;
            color: #b9dbf0;
            line-height: 200%;
        }
        .footer-link{
            text-decoration: none;
            color: #ccd996;
        }
        .logo{
            border-radius: 10px;
            margin: 0% 3% 0% 0%;
        }
        @media screen and (max-width:499px) {
            .modal-content{
                margin: 0%;
                width: 250px;
                height: 250px;
                border-radius:50%;
            }
            .image2{
                width: 100%;
                height: 100%;
                border-radius: 50%;
            }
            footer{
                display: grid;
                grid-template-columns: 1fr 1fr;
                padding-bottom: 30%;
                z-index: 5;
            }
        }
        @media screen and (max-width:720px) and (min-width:500px) {
            .modal-content{
                margin: 0%;
                width: 350px;
                height: 350px;
                border-radius:50%;
            }
            .image2{
                width: 100%;
                height: 100%;
                border-radius: 50%;
            }
            footer{
                margin-top: 20%;
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                padding-bottom: 30%;
                z-index: 5;
            }
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
                <img src="https://via.placeholder.com/30" alt="Profile" class="rounded-circle  image1">
                @endif
                @if($image!='upload')
                <img src="{{ Storage::url('public/profile/'.$image->image) }}" alt="Profile" class="rounded-circle  image1">
                @endif
                </span>
            </li>
        </ul>
        </div>
    </div>
</nav>

<div class="modal fade  " id="profileModal" tabindex="-2" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
        @if($image=='upload')
        <img src="https://via.placeholder.com/500" alt="Profile" class="img-fluid  rounded-circle  image2">
        @endif
        @if($image!='upload')
        <img src="{{ Storage::url('public/profile/'.$image->image) }}" alt="Profile" class=" image2">
        @endif
    </div>
  </div>
</div>

<div>
    @yield('condent')
</div>

<footer>
    <div class="div4">
      <h6><a href="" class="footer-link">Shop Owner</a></h6>
      <p><a href="" class="footer-link">About us</a></p>
      <p><a href="" class="footer-link">Book Service</a></p>
      <p><a href="" class="footer-link">History</a></p>
      <p><a href="" class="footer-link">Contact</a></p>
    </div>
    <!-- <div class="div4">
      <h4>QUICK LINKS</h4>
      <p>Home</p>
      <p>How it Works</p>
      <p>Shop</p>
      <p><a style="text-decoration: none;color: #dba696;" href="">Download</a></p>
    </div>
    <div class="div4">
      <h4>HELP</h4>
      <p>FAQs</p>
      <p>Support Center</p>
      <p>Shipping and Sales</p>
    </div>
    <div class="div4">
      <h4>INFORMATION</h4>
      <p>About Us</p>
      <p>Work with us</p>
      <p>Privacy Policy</p>
      <p>Terms of Use</p>
      <p>Terms of Sale</p>
      <p>Press Kit</p>
    </div> -->
    <div class="div6">
      <h4>BOOK SERVICE APPLICATION</h4>
      <p>Master productivity with Creative Console and get all the latest Service news.
      </p>
      <div class="div5">
        <img src="https://cdn1.vectorstock.com/i/1000x1000/22/25/instagram-icon-vector-29782225.jpg" alt="insta" width="8%" height="40px">
        <img src="https://cdn3.iconfinder.com/data/icons/picons-social/57/43-twitter-512.png" alt="youtube" width="8%" height="40px">
        <img src="https://cdn3.iconfinder.com/data/icons/picons-social/57/46-facebook-512.png" alt="FB" width="8%" height="40px">
        <img src="https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/youtube-icon.png" alt="Twitter" width="8%" height="40px">
      </div>
      <p>© Bike Service 2024</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>