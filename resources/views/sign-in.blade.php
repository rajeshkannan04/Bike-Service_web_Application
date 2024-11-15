<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body{
            margin: 0;
            padding: 0;
            border: none;
            background-color: #f0f9f9;
        }
        .form-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            font-weight: bold;
            border: 2px solid #ccc;
            background-color: #f4f0f0;
            border-radius: 50px;
            margin-top: 50px;
        }
        .incorrect{
            font-weight: 100;
            font-family: italic;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-container">
                    <h2 class="text-center mb-4">{{$userType}} Sign In</h2>
                    <form action="" method="post" id="signin">
                        @csrf
        <input type="text" id="check" value="{{$email}}" hidden> <!-- email check -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        </div>
                        <input type="text" value="{{$userType}}" id="userType" hidden>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                        </div>
                        <p id="incorrect" class="text-center incorrect"> enter valid email and password</p>
                        <input type="submit" class="btn btn-primary btn-block" value="Sign in">
                    </form>
                    <p class="mt-3 text-center">Don't have an account? <a href="/signup/{{$userType}}">Sign Up</a></p>
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
            document.getElementById('incorrect').textContent="incorrect email or password";
            document.getElementById('incorrect').style.color="red";
            document.getElementById('email').style.border="1px solid red";
            document.getElementById('password').style.border="1px solid red";
        }

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
