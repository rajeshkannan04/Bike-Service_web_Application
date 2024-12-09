<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home page</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    body {
      color: #250140; 
    }
    .navbar{
      display: flex;
      border: none;
      background-color: #bfbebd;
      width: 90%;
      height: 50px;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      z-index: 5;
      margin: 2% 5%; 
    }
    .navbar-toggler-icon {
      width: 20px;
      height: 20px;
    }
    .navbar-collapse {
      background-color: rgba( 191, 190, 189, 0.9);
      padding-left: 4%;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0);
    }
    .nav-link, .navbar-brand{
      color: #250140; 
      font-size: 100%;
      font-weight: bold;
    }
    footer{
      margin-top: 4%;
      padding: 4%;
      display: flex;
      color: #250140; 
      justify-content: center;
      border: none;
      background-color: #bfbebd;
    }
    .div4{
      margin: 0% 5% 0% 0%;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .footer-link{
      text-decoration: none;
      color: #250140; 
    }
    .end{
      margin-top: 5%;
    }
  </style>
</head>
<body>
  
<nav class="navbar navbar-expand-lg">
    <div class="container">
      <img class="logo" src="{{ Storage::url('public/profile/bike-service-logo.png') }}"  alt="BIKE" width="60px" height="30px">
        <a class="navbar-brand" href="#">Brand</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon light"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/customerHome/{{$user->id}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/CustomerAbout/{{$user->id}}">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/bookService/{{$user->id}}">Book a Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/historyCustomer/{{$user->id}}">History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/CustomerContact/{{$user->id}}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div>
  @yield('condent')    
</div>
    
<footer>
    <div class="div4">
      <p><a href="" class="footer-link">BIKE SERVICE</a></p>
      <p><a href="" class="footer-link">About us</a></p>
      <p><a href="" class="footer-link">Book Service</a></p>
      <p><a href="" class="footer-link">History</a></p>
      <p><a href="" class="footer-link">Contact</a></p>
    </div>
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
      <p class="end">© Bike Service 2024</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>