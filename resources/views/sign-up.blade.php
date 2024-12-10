<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{
            margin: 0;
            padding: 0;
            border: none;
            font-size: 90%;
            font-weight: 600;
        }
        .form-container {
            padding: 4%;
            background-color: #ebf0eb;
            border-radius: 10px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .form-control {
            font-size: 90%;
        }
        .form-control:focus {
            border: 1px solid #3d71a1;
            box-shadow: none;
        }
        .btn {
            background-color: #3d71a1;
            color: #fff;
            font-size: 90%;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="text-center">
    <img class="logo" src="{{ asset('images/bike-service-logo.png') }}" alt="hello">
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="form-container">
                <form action="/register" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="name" placeholder="Enter your full name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"> 
                        @if($alert == 'exits')
                        <p class="text-danger">Email Already Exits</p>
                        @endif
                    </div>
                    <div>
                        <input type="text" value="{{$user}}" name="userType" hidden>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" pattern="^[6-9]\d{9}$" title="Phone number must start with 7, 8, or 9 and be 10 digits long" maxlength="10">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    </div>
                    <p class="mt-3 text-center">Already have an account? 
                        <a href="/signin/{{$user}}">Sign In</a>
                        <button type="submit" class="btn ">Sign Up</button>
                    </p>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
