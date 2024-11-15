<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Home Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .navbar{
      position: fixed;
      top: 2%;
      right: 2%;
      left: 2%;
      display: flex;
      border: none;
      background-color: #313d2e;
      width: 96%;
      height: 50px;
      padding: 1.5%;
      color: #ccd996;
      font-size: 90%;
      font-weight: bold;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      z-index: 4;
    }
    .nav-link, .navbar-brand{
      color: #ccd996;
      font-size: 100%;
    }
    .console{
      border: none;
      width: 100%;
      height: 500px;
      padding: 20% 25% 20% 25%;
      text-align: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-size: 100%;
      color: #000;
      opacity: 5;
      background-image: url(https://t3.ftcdn.net/jpg/09/55/30/42/360_F_955304273_DeokmLIangfh4Xsyx6L824FSOqw6Aueq.jpg);
      background-size: 100% 100%;
    }
    .div2{
      margin: 3% 0%;
      text-align: center;
      font-size: 200%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    #div2{
      border: none;
      height: 400px;
      background-image: url(https://img.freepik.com/premium-vector/motorcycle-icon-logo-design_775854-635.jpg);
      background-size: 100% 100%;
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
        height: 270px;
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
        height: 270px;
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


@extends('customerFrame')
@section('condent')
  <div class="console">
    <h1>BOOK A SERVICE TO GET REWARD</h1>
    <p>Discover the perfect console for yours.</p>
  </div>

  <div id="div2">
    <div class="div2">
        <h1>BOOK SERVICE NOW</h1>
        <p>Add-on to make it perfect.</p>
    </div>
  </div>

  @endsection
 

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
