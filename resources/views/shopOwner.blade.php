<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .jumbotron {
            background-image: url('https://cdn.shopify.com/s/files/1/0770/5739/2958/files/BIKE-02.png?v=1686035195');
            opacity: 1;
            background-size: 60% 120%;
            background-position: center;
            background-repeat: no-repeat;
            color: #061c47;
            font-weight: bold;
            padding: 10%;
            margin-bottom: 0;
            width: 100%;
            height: 450px;
            position: relative;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 100%;
        }
        .jumbotron .shopName{
            position: absolute;
            top: 4%;
            left: 4%;
            width: 45%; 
        }
        .jumbotron .detail{
            position: absolute;
            bottom: 4%;
            right: 4%;
            width: 45%;
        }
        .image1{
            width: 30px;
            height: 30px;
            border-radius: 50%;
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
        .service{
            color: #061c47;
        }

  </style>

</head>
<body>


@extends('shopOwnerFrame')
@section('content')


<div class="jumbotron">
    @if($user && $user->userType)
        <h1 class="text-center">Welcome to Bike Service!</h1>
    @endif
    @if($user && $user->users_id)
    <div class="shopName">
        <h2>{{$user->shopName}} !</h2>    
        <p>{{$user->address}}</p>
    </div>
    @endif
    <div class="detail">
        <p class="lead">We provide top-notch service for your bikes. Whether it's a regular maintenance checkup or a major repair, we've got you covered.</p>
        <a class="btn text-danger fw-bold" href="#">Learn more</a>
    </div>
</div>

<div class="container service">
    <h2 class="text-center mb-4">Our Services</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="https://www.shutterstock.com/image-vector/logo-vector-auto-repair-parts-600nw-2318858107.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                @if($user && $user->userType)
                <h5 class="card-title">Regular Service</h5>
                @endif
                @if($user && $user->users_id)
                <h5 class="card-title">{{$user->service1}}</h5>
                @endif
                    <p class="card-text">Keep your bike in top condition with our regular service packages.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://images-platform.99static.com/_0cmp7AnqRaN5XidZcNOY4D8Rrg=/500x500/top/smart/99designs-contests-attachments/58/58344/attachment_58344906" class="card-img-top" alt="...">
                <div class="card-body">
                @if($user && $user->userType)
                <h5 class="card-title">Tune-up Service</h5>
                @endif
                @if($user && $user->users_id)
                <h5 class="card-title">{{$user->service2}}</h5>
                @endif
                 <p class="card-text">Enhance your bike's performance with our professional tune-up services.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdt9uPFf9tbyhaD1_OoPXOptELxz0YGG3jkA&s" class="card-img-top" alt="...">
                <div class="card-body">
                    @if($user && $user->userType)
                    <h5 class="card-title">Repairs</h5>
                    @endif
                    @if($user && $user->users_id)
                    <h5 class="card-title">{{$user->service3}}</h5>
                    @endif
                    <p class="card-text">We specialize in all types of bike repairs, from minor fixes to major overhauls.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


</body>
</html>
