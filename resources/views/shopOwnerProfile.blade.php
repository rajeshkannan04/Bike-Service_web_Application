<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background-image: linear-gradient(#f1f1f1,#f9f9f9);
            background-size: 100% 200%;
            color:#000;
            font-weight: 500;
        }
        .input-box{
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
        .in1{
            width: 65%;
        }
        .in2{
            width: 20%;
        }
        .in3{
            width: 100%;
        }
        .input-box:focus{
            outline: none;
        }
        .form-label{
          font-weight: bold;
          font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .image{
          border-radius:50%;          
          width: 200px;
          height:200px;
          border:none;
          margin: 5% 0%
        }
        .profileIcon{
          display:flex;
          justify-content: center;
          align-items: center;
        }
        .content{
          display:flex;
          justify-content: center;
          align-items: center;
        }
        .model-content{
          width: 300px;
          height: 300px;
          border-radius: 50%;
        }
        .rounded-circle{
          width: 100%;
          height: 100%;
        }
    </style>
</head>
<body>


<div class="profileIcon">
  <span class="nav-link profile-icon" data-toggle="modal" data-target="#profileModal">
    @if($Image!='upload')
      <img class="image" src="{{ Storage::url('public/profile/'.$Image->image) }}" alt="Profile Image">
    @endif
    @if($Image=='upload')
      <img class="image" src="https://via.placeholder.com/500" alt="Profile Image">
    @endif
  </span>
</div>

<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content rounded-circle">

         @if($Image!='upload')
        <img src="{{ Storage::url('public/profile/'.$Image->image) }}" alt="Profile" class="rounded-circle">
        @endif
        @if($Image=='upload')
        <img src="https://via.placeholder.com/500" alt="Profile" class="rounded-circle">
        @endif
     
        @if($owner->userType)
        <form action="/uploadImage/{{$owner->id}}" method="post" enctype="multipart/form-data" class="position-relative">
        @endif
        @if($owner->users_id)
        <form action="/uploadImage/{{$owner->users_id}}" method="post" enctype="multipart/form-data" class="position-relative">
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

<script>
    document.getElementById('fileInput').addEventListener('change', function() {
        console.log(this.files[0].name);
    });
</script>

<div class="container content">
  @if($owner->users_id)
  <form action="/shopregister/{{$owner->users_id}}" method="post" id="form">   
    @endif
    @if ($owner->userType)     
    <form action="/shopregister/{{$owner->id}}" method="post">   
    @endif
    @csrf
    <div class="mb-3">
      <label for="shopName" class="form-label">Shop Name</label><br>
      <input type="text" class="input-box in1" id="shopName" name="shopName" value="{{$owner->shopName}}" required>
    </div>    
    <div class="mb-3">
      <label for="city" class="form-label">City</label><br>
      <input type="text" class="input-box in1" id="city" name="city" value="{{$owner->city}}" required>
    </div>
    <div id="serviceto" class="form-label">Services</div>
    <div class="mb-3">
      <input type="text" class="input-box in1" id="service1" name="service1" value="{{$owner->service1}}"> 
      <input type="number" class="input-box in2" id="rate1" name="rate1" value="{{$owner->rate1}}"><label for="rate1">Rs</label>
    </div>
    <div class="mb-3">
      <input type="text" class="input-box in1" id="service2" name="service2" value="{{$owner->service2}}">
      <input type="number" class="input-box in2" id="rate2" name="rate2" value="{{$owner->rate2}}"><label for="rate2">Rs</label>
    </div>
    <div class="mb-3">
      <input type="text" class="input-box in1" id="service3" name="service3" value="{{$owner->service3}}">
      <input type="number" class="input-box in2" id="rate3" name="rate3" value="{{$owner->rate3}}"><label for="rate3">Rs</label>
    </div>
    <div class="mb-3">
      <input type="text" class="input-box in1" id="service4" name="service4" value="{{$owner->service4}}">
      <input type="number" class="input-box in2" id="rate4" name="rate4" value="{{$owner->rate4}}"><label for="rate4">Rs</label>
    </div>
    <div class="mb-3">
      <input type="text" class="input-box in1" id="service5" name="service5" value="{{$owner->service5}}">
      <input type="number" class="input-box in2" id="rate5" name="rate5" value="{{$owner->rate5}}"><label for="rate5">Rs</label>
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">Address</label><br>
      <input type="text" class="input-box in3" id="address" name="address" value="{{$owner->address}}" required>
    </div>
    <div id="error" class="text-danger">
    </div>
    <div class="mb-3">
      <input type="submit" class="btn text-secondary" value="Edit Shop">
    </div>
  </form>
</div>

<div class="logout content">
  <form action="{{ route('logout');}}" method="post">
    @csrf
    <input type="submit" class="btn text-secondary" value="Logout">
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
      if(service[i].trim() !== "" && rate[i].trim() !== ""){
        pair++;
      }
      else if (service[i].trim() !== "" && rate[i].trim() == ""){
        let fillRate = document.getElementById('rate' + j);
        fillRate.style.borderBottom = '2px solid orange';
        con = j;
      }
      else if (service[i].trim() == "" && rate[i].trim() !== ""){
        let fillService = document.getElementById('service' + j);
        fillService.style.borderBottom = '2px solid orange';
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
