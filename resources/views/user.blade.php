<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bike Service APP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      border: none;
      font-size: 90%;
      font-weight: 600;
      display: grid;
      justify-content: center;
      align-items: center;
    }
    .container {
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      font-weight: bold;
      background-color: #ebf0eb;
      border-radius: 10px;
      padding: 4%;
    }
    .btn {
      background-color: #333333;
      color: #fff;
      margin-left: 60%;
      font-size: 90%;
      font-weight: bold;
    }
    .customer, .shopowner {
      margin: 2%;
    }
    .customer p,  .shopowner p {
      margin: 0;
    }

  </style>
</head>
<body>

<div class="text-center">
  <img class="logo" src="{{ Storage::url('public/profile/bike-service-logo.png') }}" alt="hello">
</div>

<div class="container">
  <h4 class="text-center">Welcome to the Bike Service!</h4>
  <p class="ms-4 mt-4">Please select your role:</p>
  <div class="customer">
    <p>Access your account, view orders, and explore products and services.</p>
    <a href="/customer/customer" class="btn">Customer</a>
  </div>
  <div class="shopowner">
    <p>Manage your shop, view orders, and update available services.</p>
    <a href="/shopOwner/shopOwner" class="btn">Shop Ownar</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
