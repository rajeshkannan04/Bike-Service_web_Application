<?php
  $today = new DateTime();
  $day2 = date('d-m-y', strtotime('+2days'));
  $month = date('d-m-y', strtotime('+10 days'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bike Service Request Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{
      background-color: #bfbebd;
      color: #250140; 
      font-weight: bold;
      font-family: Verdana, Geneva, Tahoma, sans-serif;

    }
    .form-control, .form-select{
      background-color: #bfbebd;
      border:none;
      border-bottom: 2px solid #250140;
      border-radius: 0px;
      color: #000;
      font-weight: bold;
      width: 90%;
      padding: 0% 0% 0% 5%;
      margin: 0% 0% 0% 5%;
    }
    .form-control:focus, .form-select:focus{
      box-shadow: none;   
      background-color: #bfbebd;
      border:none;
      border-bottom: 2px solid #250140;
    }
    .form-label{
      margin-left: 2%;
    }
    .form-check-label{
      font-weight: bold;
      margin-bottom: 20px;
    }
    .form-check-input{
      border: 3px solid #64aff5;
      padding: 0% 2.5%;
      margin: 0% 2%; 
    }
     
  </style>

</head>
<body>

<div class="container">
  <h1 class="mt-5 mb-4">Bike Service Request Form</h1>
  <form action="/order" method="post" id="form">
    @csrf
    <div class="mb-3">
      <label for="BookDate" class="form-label">Booking Date</label>
      <input type="text" class="form-control" id="BookDate" name="BookDate" value="<?php echo $today->format('y-m-d h:i:s'); ?>" readonly>
    </div>
    <div class="mb-3">
      <label for="DeliverDate" class="form-label">Expected deliverd Date</label>
      <input type="date" onchange="deliverDate()" class="form-control" id="DeliverDate" name="DeliverDate" required>
      <p class="m-2 today"><span id="chooseDate"></span> <?php echo $day2 .' to '. $month ?></p>
    </div>
    <div class="mb-3">
      <label for="bikeBrand" class="form-label">Bike Brand</label>
      <input type="text" class="form-control" id="bikeBrand" name="bikebrand" placeholder="Enter your bike brand" required>
    </div>
    <div class="mb-3">
      <label for="bikeModel" class="form-label">Bike Model</label>
      <input type="text" class="form-control" id="bikeModel" name="bikeModel" placeholder="Enter your bike model" required>
    </div>
    <div class="mb-3">
      <label for="city" class="form-label">City</label>
      <input type="text" onchange="updateDesignations()" class="form-control" id="city" name="city" placeholder="Enter your city" required>
    </div>

    <div><input type="text" value="{{$id}}" name="users_id" hidden></div>
    
    <div class="mb-3">
      <label for="shopName" class="form-label">Shop Name</label>
      <select class="form-select" id="shopName" name="shopName" onchange="service()" required>
        <option value="">Select Shop Name</option>
      </select>
    </div>
    
    <div id="service" class="form-check"></div>

    <div class="mb-3">
      <label for="additionalInfo" class="form-label">Additional Information</label>
      <input class="form-control" id="additionalInfo" name="additional" placeholder="Enter any additional information">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<div><input type="text" value="{{$data}}" id="data" hidden></div>

<script>
  function updateDesignations() {
    var city = document.getElementById('city').value;
    const jsonData = JSON.parse(document.getElementById('data').value);
    let a =0;
    // console.log (jsonData)
    if(a==0){
      document.getElementById('shopName').innerHTML="";
    }
    for (var i=0; i<jsonData.length;i++){
      if (city == jsonData[i]['city']){
        let option0 = document.createElement('option');
        option0.text = "Select Service Type";
        option0.value = "";
        let option = document.createElement('option');
        option.value = jsonData[i].id;
        option.text = jsonData[i].shopName+"-"+jsonData[i].city;
        document.getElementById('shopName').append(option0,option)
        a++;
      }
    }
    for (var i=0; i<jsonData.length;i++){
      if (city != jsonData[i]['city']){
        let option0 = document.createElement('option');
        option0.text = "Select Another city";
        option0.value = "";
        let option = document.createElement('option');
        option.value = jsonData[i].id;
        option.text = jsonData[i].shopName+"-"+jsonData[i].city;
        document.getElementById('shopName').append(option0,option)
        a++;
      }
    }
  }

  function service(){
    var shopName = document.getElementById('shopName').value;
    const jsonData = JSON.parse(document.getElementById('data').value);
    let a =0;
    // console.log(shopName)
    
    if(a==0){
      document.getElementById('service').innerHTML="";
    }   

    for (var i=0; i<jsonData.length;i++){
      if (shopName == jsonData[i]['id']){
        if(jsonData[i]['service1'] != null){
          var label1 = document.createElement('label');
          label1.innerText = jsonData[i]['service1']+" : "+ jsonData[i]['rate1']+""+"-Rs";
          label1.className = 'form-check-label';
          var option1 = document.createElement('input');
          option1.type = 'checkbox';
          option1.name = 'service1';
          option1.className = 'form-check-input';
          option1.value = jsonData[i]['service1'];
          var br = document.createElement('br');
          document.getElementById('service').append(option1,label1,br);
        }
        if(jsonData[i]['service2'] != null){
          var label2 = document.createElement('label');
          label2.innerText = jsonData[i]['service2']+" : "+ jsonData[i]['rate2']+""+"-Rs";
          label2.className = 'form-check-label';
          var option2 = document.createElement('input');
          option2.type = 'checkbox';
          option2.name = 'service2';
          option2.className = 'form-check-input';
          option2.value = jsonData[i]['service2'];
          var br = document.createElement('br');
          document.getElementById('service').append(option2,label2,br);
        }
        if(jsonData[i]['service3'] != null){
          var label3 = document.createElement('label');
          label3.innerText = jsonData[i]['service3']+" : "+ jsonData[i]['rate3']+""+"-Rs";
          label3.className = 'form-check-label';
          var option3 = document.createElement('input');
          option3.type = 'checkbox';
          option3.name = 'service3';
          option3.className = 'form-check-input';
          option3.value = jsonData[i]['service3'];
          var br = document.createElement('br');

          document.getElementById('service').append(option3,label3,br);
        }
        if(jsonData[i]['service4'] != null){
          var label4 = document.createElement('label');
          label4.innerText = jsonData[i]['service4']+" : "+ jsonData[i]['rate4']+""+"-Rs";
          label4.className = 'form-check-label';
          var option4 = document.createElement('input');
          option4.type = 'checkbox';
          option4.name = 'service4';
          option4.className = 'form-check-input';
          option4.value = jsonData[i]['service4'];
          var br = document.createElement('br');
          document.getElementById('service').append(option4,label4,br);
        }
        if(jsonData[i]['service5'] != null){
          var label5 = document.createElement('label');
          label5.innerText = jsonData[i]['service5']+" : "+ jsonData[i]['rate5']+""+"-Rs";
          label5.className = 'form-check-label';
          var option5 = document.createElement('input');
          option5.type = 'checkbox';
          option5.name = 'service5';
          option5.className = 'form-check-input';
          option5.value = jsonData[i]['service5'];
          var br = document.createElement('br');
          document.getElementById('service').append(option5,label5,br);
        }
        a+=1;
      }
    } 
  } 

  function deliverDate(){
    var date1 = document.getElementById('DeliverDate').value;
    var today = new Date(); 

    var day2 = new Date();
    day2.setDate(today.getDate() + 2);

    var twoDayLater = String(day2.getDate()).padStart(2,'0');
    var monthLater2 = String(day2.getMonth() + 1).padStart(2,'0');
    var yearLater2 = day2.getFullYear();

    var Fday2 = yearLater2 + '-' + monthLater2 + '-' + twoDayLater;

    var day10 = new Date();
    day10.setDate(today.getDate() + 10);

    var dayLater = String(day10.getDate()).padStart(2,'0');
    var monthLater = String(day10.getMonth() + 1).padStart(2,'0');
    var yearLater = day10.getFullYear();

    var Fday10 = yearLater + '-' + monthLater + '-' + dayLater;

    console.log (date1 + '-' + Fday2 + '-' + Fday10);
    if (date1 >= Fday2 && date1 <= Fday10){
      document.getElementById('chooseDate').textContent = '';
      document.getElementById('DeliverDate').style.borderBottom ="2px solid #250140";

      return true;
    } else {
      document.getElementById('chooseDate').textContent = 'choose the valid date';
      document.getElementById('DeliverDate').style.borderBottom ="2px solid #d65413";
      return false;
    }
  }
 
 document.getElementById('form').addEventListener('submit', function(e){
  e.preventDefault();
  if (deliverDate() == true){
    form.submit();
  } else{
    console.log('Validation failed, showing error message.');
    alert("Enter valid deliver date");
    document.getElementById('DeliverDate').style.borderBottom = '1px solid red';
  }
 });
</script>
  
<!-- Bootstrap JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
