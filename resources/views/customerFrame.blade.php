<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
  <style>
    .navbar{
      display: flex;
      border: none;
      background-color: #313d2e;
      width: 90%;
      height: 50px;
      padding: 1.5%;
      color: #ccd996;
      font-size: 90%;
      font-weight: bold;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      z-index: 4;
      margin: 2% 5%; 
    }
    .nav-link, .navbar-brand{
      color: #ccd996;
      font-size: 100%;
    }
    .navbar-toggler-icon{
      width: 20px;
      height: 20px;
      border: 2px solid white;
      background-color: white;
    }
    /* .console{
      border: none;
      width: 100%;
      height: 500px;
      padding: 20% 25% 20% 25%;
      text-align: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-size: 100%;
      color: #ccd996;
      opacity: 5;
      background-image: url(https://monogramcc.com/static/9a0b554db1990565457610c5f83b3ad7/91943/shop_cta_xl_896f6b8270.webp);
      background-size: 100% 100%;
    }
    .div2{
      margin: 10% 25% 10% 25%;
      text-align: center;
      font-size: 200%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    #div2{
      border: none;
      height: 400px;
      background-image: url(https://monogramcc.com/static/fb6b98aa90bbce383e12a09c50936e96/9ee2a/shop-banner-module.webp);
      background-size: 100% 100%;
    }
    .div6{
      margin: 5% 1% 2% 6%;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      font-size: 80%;
      color: #ccd996;
      line-height: 200%;
    } */
    footer{
      margin-top: 4%;
      display: flex;
      justify-content: center;
      align-items: center;
      border: none;
      background-color: #313d2e;
    }
    .div4{
      margin: 5% 1% 2% 6%;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      font-size: 80%;
      color: #ccd996;
      line-height: 200%;
    }
    .footer-link{
      text-decoration: none;
      color: #ccd996;
    }
    @media screen and (max-width:499px) {
      .console{
        font-size: 100%;
        height: 300px;
        background-repeat: no-repeat;
      }
      .div2{
        font-size: 90%;
      }
      #div2{
        height: 300px;
      }
      footer{
        display: grid;
        grid-template-columns: 1fr 1fr;
        padding-bottom: 30%;
        z-index: 5;
      }
    }
    @media screen and (max-width:720px) and (min-width:500px) {
      .console{
        font-size: 120%;
        height: 400px;
      }
      #div2{
        height: 300px;
      }
      .div2{
        margin-top: 5%;
        font-size: 120%;
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
        <a class="navbar-brand" href="#">Brand</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
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
      <h6><a href="" class="footer-link">MONOGRAM</a></h6>
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