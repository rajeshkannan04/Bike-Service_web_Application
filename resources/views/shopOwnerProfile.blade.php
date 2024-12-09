<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .input-box {
          margin-left: 10px;
          padding: 5px 20px;
          border:none;
          color: #000;
          font-family: Verdana, Geneva, Tahoma, sans-serif;
          font-weight: 300;
          border-bottom:1px solid #414141;
          background-color:rgba(0,0,0.5,0);
          transition: width 0.4s, height 1s;
        }
        .in1 {
          width: 65%;
        }
        .in2 {
          width: 20%;
        }
        .in3 {
          width: 100%;
        }
        .input-box:focus {
          outline: none;
          border-bottom: 2px solid #061c47;
        }
        .form-label {
          color: #061c47;
          font-weight: bold;
          font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .image {
          border-radius:50%;          
          width: 200px;
          height:200px;
          margin: 5% 0%;
          border: 1px solid #333333;
        }
        .profileIcon {
          display:flex;
          justify-content: center;
          align-items: center;
        }
        .container form {
          background-color: #ebf0eb;
          padding: 5%;
          border-radius: 10px;
          font-size: 90%;
        }
        .content {
          display:flex;
          justify-content: center;
          align-items: center;
        }
        .model-content {
          border-radius: 50%;
          display: grid;
          justify-content: center;
          align-items: center;
        }
        .rounded-circle {
          width: 500px;
          height: 500px;
        }
        label {
          font-weight: bold;
          color: #061c47;
        }
        .button {
          float: right;
          border: none;
          padding: 2%;
          border-radius: 10px;
          background-color: #333333;
          color: #fff;
          font-weight: bold;
          font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        @media screen and (max-width:999px) and (min-width:750px) {
          .rounded-circle {
            width: 400px;
            height: 400px;
          }   
        }
        @media screen and (max-width:749px) and (min-width:550px) {
          .rounded-circle {
            width: 350px;
            height: 350px;
          }
        }
        @media screen and (max-width:549px) {
          .rounded-circle {
            width: 300px;
            height: 300px;
          }
        }
    </style>
</head>
<body>


  <div class="profileIcon">
    <span class="nav-link profile-icon" data-toggle="modal" data-target="#profileModal">
      @if($image!='upload')
        <img class="image" src="{{ Storage::url('public/profile/'.$image->image) }}" alt="Profile Image">
      @endif
      @if($image=='upload')
        <img class="image" src="https://via.placeholder.com/500" alt="Profile Image">
      @endif
    </span>
  </div>

  <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered content" role="document">
      <div class="modal-content rounded-circle">

          @if($image!='upload')
          <img src="{{ Storage::url('public/profile/'.$image->image) }}" alt="Profile" class="rounded-circle">
          @endif
          @if($image=='upload')
          <img src="https://via.placeholder.com/500" alt="Profile" class="rounded-circle">
          @endif
      
          @if($user->userType)
          <form action="/uploadImage/{{ $user->id }}" method="post" enctype="multipart/form-data" class="position-relative">
          @endif
          @if($user->users_id)
          <form action="/uploadImage/{{ $user->users_id }}" method="post" enctype="multipart/form-data" class="position-relative">
          @endif
          @csrf

            <input type="file" name="image" id="fileInput" style="display: none;">
            
            <button type="button" class="btn btn-dark text-light fw-bold position-absolute" style="bottom: 20px; left: 20px;" onclick="document.getElementById('fileInput').click();">
                Change
            </button>

            <button type="submit" class="btn btn-dark text-light fw-bold" style="position: absolute; bottom: 20px; right: 20px;">
                Upload
            </button>
          </form>
        </div>
    </div>
  </div>

  <div class="container content">
    @if($user->users_id)
    <form action="/shopregister/{{$user->users_id}}" method="post" id="form">   
      @endif
      @if ($user->userType)     
      <form action="/shopregister/{{$user->id}}" method="post" id="form">   
      @endif
      @csrf
      <div class="mb-3">
        <label for="shopName" class="form-label">Shop Name</label><br>
        <input type="text" class="input-box in1" id="shopName" name="shopName" value="{{$user->shopName}}" required>
      </div>    
      <div class="mb-3">
        <label for="city" class="form-label">City</label><br>
        <input type="text" class="input-box in1" id="city" name="city" value="{{$user->city}}" required>
      </div>
      <div id="serviceto" class="form-label">Services</div>
      <div class="mb-3">
        <input type="text" class="input-box in1" id="service1" name="service1" value="{{$user->service1}}"> 
        <input type="number" class="input-box in2" id="rate1" name="rate1" value="{{$user->rate1}}"><label for="rate1">Rs</label>
      </div>
      <div class="mb-3">
        <input type="text" class="input-box in1" id="service2" name="service2" value="{{$user->service2}}">
        <input type="number" class="input-box in2" id="rate2" name="rate2" value="{{$user->rate2}}"><label for="rate2">Rs</label>
      </div>
      <div class="mb-3">
        <input type="text" class="input-box in1" id="service3" name="service3" value="{{$user->service3}}">
        <input type="number" class="input-box in2" id="rate3" name="rate3" value="{{$user->rate3}}"><label for="rate3">Rs</label>
      </div>
      <div class="mb-3">
        <input type="text" class="input-box in1" id="service4" name="service4" value="{{$user->service4}}">
        <input type="number" class="input-box in2" id="rate4" name="rate4" value="{{$user->rate4}}"><label for="rate4">Rs</label>
      </div>
      <div class="mb-3">
        <input type="text" class="input-box in1" id="service5" name="service5" value="{{$user->service5}}">
        <input type="number" class="input-box in2" id="rate5" name="rate5" value="{{$user->rate5}}"><label for="rate5">Rs</label>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label><br>
        <input type="text" class="input-box in3" id="address" name="address" value="{{$user->address}}" required>
      </div>
      <div id="error" class="text-danger">
      </div>
      <div class="mb-3">
        <input type="submit" class="button" value="Edit Shop">
      </div>
    </form>
  </div>

  <div class="logout content">
    <form action="{{ route('logout');}}" method="post">
      @csrf
      <input type="submit" class="btn text-secondary fw-bold" value="Logout">
    </form>
  </div>


  <script>
    document.getElementById('form').addEventListener('submit', function(event){
      event.preventDefault();

      const service = [
        document.getElementById('service1').value,
        document.getElementById('service2').value,
        document.getElementById('service3').value,
        document.getElementById('service4').value,
        document.getElementById('service5').value
      ];
      const rate = [
        document.getElementById('rate1').value,
        document.getElementById('rate2').value,
        document.getElementById('rate3').value,
        document.getElementById('rate4').value,
        document.getElementById('rate5').value
      ];

      const error = document.getElementById('error');
      error.textContent = '';
      var pair = 0;
      var con = 0;
      let notFillService = [];
      let notFillRate = [];
      
      for (let i=0;i<service.length;i++){
        let j = i+1;
        if(service[i] != "" && rate[i] != ""){
          pair++;
        }
        else if (service[i] != "" && rate[i] == ""){
          let fillRate = document.getElementById('rate' + j);
          fillRate.style.borderBottom = '2px solid red';
          con = j;
        }
        else if (service[i] == "" && rate[i] != ""){
          let fillService = document.getElementById('service' + j);
          fillService.style.borderBottom = '2px solid red ';
          con = j;
        }
      }
      if (pair >= 3 && con == 0){
        form.submit();
      } else {
        console.log('Validation failed, showing error message.');
        error.textContent = 'Please fill in at least three service and rate pairs.';
      }
    });
  </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
