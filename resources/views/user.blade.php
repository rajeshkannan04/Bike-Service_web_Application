<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
  <h1 class="mt-5 mb-4">Welcome to the Dashboard!</h1>
  <p>Please select your role:</p>
  <div class="row">
    <div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Customer</h5>
          <p class="card-text">Access your account, view orders, and explore products and services.</p>
          <a href="/customer/customer" class="btn btn-primary">Customer</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Shop Owner</h5>
          <p class="card-text">Manage your shop, view orders, and update available services.</p>
          <a href="/shopOwner/shopOwner" class="btn btn-primary">Register Shop </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
