<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
         .form-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            font-weight: bold;
            border: 2px solid #ccc;
            background-color: #f2f2f4;
            border-radius: 50px;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="form-container">
                <h2 class="text-center mb-4">Sign Up</h2>
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
                        <small class="form-text text-muted">Phone number must start with 6, 7, 8, or 9 and be 10 digits long.</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                </form>
                <p class="mt-3 text-center">Already have an account? <a href="/signin/{{$user}}">Sign In</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
