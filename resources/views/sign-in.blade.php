<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
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
        .incorrect {
            font-weight: 200;
        }
        .btn {
            background-color: #3d71a1;
            color: #fff;
            font-size: 95%;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="text-center">
        <img class="logo" src="{{ Storage::url('public/profile/bike-service-logo.png') }}" alt="hello">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-container">
                    <form action="" method="post" id="signin">
                        @csrf
                        <input type="text" id="check" value="{{$email}}" hidden> 
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        </div>
                        <input type="text" value="{{$userType}}" id="userType" hidden>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                        </div>
                        <p style="display:none;" id="incorrect" class="text-center incorrect"> enter valid email and password</p>
                        <p class="mt-3 text-center">Don't have an account? 
                            <a href="/signup/{{$userType}}">Sign Up</a>
                            <input type="submit" class="btn " value="Sign in">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('signin').addEventListener('submit',function(e){
            e.preventDefault();
            var form = document.getElementById('signin');
            const user = document.getElementById('userType').value;
            if (user == 'customer') {
                form.action = "/loginc/customer";
            }
            else if (user == 'shopOwner'){
                form.action = "/logins/shopOwner";
            }
            form.submit();
        });

        var check = document.getElementById('check').value;
        if (check=="incorrect"){
            var incorrect = document.getElementById('incorrect');
            incorrect.style.display="block";
            incorrect.textContent="Incorrect Email or Password";
            incorrect.style.color="red";
        }

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
