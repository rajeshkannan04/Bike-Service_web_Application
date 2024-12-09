<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop Owner Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
  <h1 class="mt-5 mb-4">Shop Owner Registration Form</h1>
  <form action="/shopregister" method="post">
    @csrf
    <div class="mb-3">
      <label for="shopName" class="form-label">Shop Name</label>
      <input type="text" class="form-control" id="shopName" name="shopName" placeholder="Enter your shop name" required>
    </div>

    <div><input type="text" value="{{$id}}" name='users_id' hidden></div>
    
    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <input class="form-control" id="address" name="address" placeholder="Enter your shop address" required>
    </div>
    <div class="mb-3">
      <label for="city" class="form-label">City</label>
      <input class="form-control" id="city" name="city" placeholder="Enter your city" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Services Offered</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="service1" name="service1" value="Bike Repairs">
        <label class="form-check-label" for="service1">Bike Repairs</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="service2" name="service2" value="Tire Replacement" required>
        <label class="form-check-label" for="service2">Tire Replacement</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="service3" name="service3" value="Bike Maintenance">
        <label class="form-check-label" for="service3">Bike Maintenance</label>
      </div>
      <div class="mb-3">
      <label for="service4" class="form-label">Other</label>
      <input class="form-control" id="service4" name="service4" placeholder="Enter your own service">
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
