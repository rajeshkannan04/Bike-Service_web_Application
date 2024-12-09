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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{
      background-color: #bfbebd;
      color: #250140; 
      font-weight: bold;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      margin-bottom: 5%;
    }
    .form-control, .form-select, .form-input{
      background-color: #bfbebd;
      border:none;
      border-bottom: 2px solid #250140;
      border-radius: 0px;
      color: #000;
      font-weight: bold;
      padding: 0% 0% 0% 5%;
      margin: 0% 0% 0% 5%;
    }
    .form-control, .form-select, .btn-btn{
      width: 90%;
    }
    .form-input{
      width: 5%;
      margin: 0%;
      padding: 0% 0% 0% 1%;
    }
    .form-control:focus, .form-select:focus, .form-input:focus{
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
    .btn-btn{
      background-color: #250140;
      color: #bfbebd;
      margin: 3% 3%;
      font-weight: bold;
    }
     
  </style>

</head>
<body>

<div class="container">
  <h1 class="mt-5 mb-4">Bike Service Request Form</h1>
    <form action="/order/{{$id}}" method="post" id="form">
      @csrf
      <div class="mb-3">
        <label for="BookDate" class="form-label">Booking Date</label>
        <input type="text" class="form-control" id="BookDate" name="BookDate" value="<?php echo $today->format('y-m-d'); ?>" readonly>
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
      <button type="submit" class="btn-btn btn">Submit</button>
    </form>
</div>

<div><input type="text" value="{{ $encryptedData }}" id="data" hidden></div>

<script>
  let decrtptedData = null;
  decrypted();
  function decrypted(){
    let encryptedData = document.getElementById('data').value;
      var Data = 0;

      fetch('/decrypt-data',{
        method : 'post',
        headers: {
          'content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ encryptedData: encryptedData })
      })
      .then(response => response.json())
      .then(data =>{
        if (data.error){
          console.error('decrypted data failed.')
        } else {
          decryptedData = data;
        }
      })
      .catch(error => console.error('Erreo:', error));
  
  }

  function updateDesignations() {
    var city = document.getElementById('city').value;
    const jsonData = JSON.parse(decryptedData);
    let a = 0;
    let b = 0;
    if(a==0 && b==0){
      document.getElementById('shopName').innerHTML="";
      let option0 = document.createElement('option');
        option0.text = "Select Service Type";
        option0.style.fontWeight = "bold";
        option0.value = "";
        document.getElementById('shopName').append(option0)
    }
    for (var i=0; i<jsonData.length;i++){
      if (city == jsonData[i]['city']){
        let option = document.createElement('option');
        option.value = jsonData[i].id;
        option.text = jsonData[i].shopName+"-"+jsonData[i].city;
        document.getElementById('shopName').append(option)
        a++;
      }
      if (city != jsonData[i]['city']){
        b++;
      }
    }
    
    if(b!=0){
      let option0 = document.createElement('option');
        option0.text = "Select Another City";
        option0.value = "";
        option0.style.fontWeight = "bold";
        document.getElementById('shopName').append(option0)
    }
    for (var i=0; i<jsonData.length;i++){
      if (city != jsonData[i]['city']){
        let option = document.createElement('option');
        option.value = jsonData[i].id;
        option.text = jsonData[i].shopName+"-"+jsonData[i].city;
        document.getElementById('shopName').append(option)
      }
    }
  }

  function service(){
    var shopName = document.getElementById('shopName').value;
    const jsonData = JSON.parse(decryptedData);
    let a =0;
    
    if(a==0){
      document.getElementById('service').innerHTML="";
    }   

    for (var i = 0; i<jsonData.length;i++){
      if (shopName == jsonData[i]['id']){
        for (var j = 0; j<=5;j++){
          if(jsonData[i]['service' + j]){
            var label = document.createElement('label');
            label.innerText = jsonData[i]['service' + j] +" / INR -";
            label.className = 'form-check-label';

            var checkbox = document.createElement('input');
            
            checkbox.type = 'checkbox';
            checkbox.name = 'service' + j;
            checkbox.className = 'form-check-input';
            checkbox.id = 'service' + j;
            checkbox.value = jsonData[i]['service' + j];

            var rate = document.createElement('input');
            rate.type = 'text';
            rate.name = 'rate' + j;
            rate.className = 'form-input';
            rate.id = 'rate' + j;
            rate.value = jsonData[i]['rate' + j];
            rate.readOnly = true;

            var br = document.createElement('br');
            document.getElementById('service').append(checkbox,label,rate,br);
          }   
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

  if ( deliverDate() == true ){
    for ( var i = 1; i<=5; i++ ) {
      var checkValue = document.getElementById( 'service' + i );
      if (checkValue) {
        if ( !checkValue.checked ) {
          var rateValue = document.getElementById( 'rate' + i );
          rateValue.value = null; 
        }
      }
    }
    form.submit();
  } else{
    console.log('Validation failed, showing error message.');
    alert("Enter valid deliver date");
    document.getElementById('DeliverDate').style.borderBottom = '1px solid red';
  }

 });
</script>
  
</body>
</html>
