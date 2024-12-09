<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Home Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

  <style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    .head {
      position: relative;
      margin: 0% 20% 10% 20%;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      width: 60%;
      height: 400px;
      color: #250140;
      background-image: url(https://img.freepik.com/premium-vector/ridercraft-evolution-vector-motorbike-arts-rideshade-creative-motorbike-logo-craft_706143-30025.jpg);
      background-size: 100% 100%;
    }
    .head .headAdditional {
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      font-size: 90%;
      position: absolute;
      top: 2%;
      left: 4%;
    }
    .bodyadditional {
      text-align: center;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .body {
      color: #250140;
    }
    .headService {
      margin: 5%;
      width: 90%;
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      grid-gap: 2%;
      color: #250140;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .service {
      position: relative;
      overflow: hidden;
      width: 100%;
      height: 100%;
    }
    .service img{
      width: 100%;
      height: 80%;
    }
    .headService .rate {
      position: absolute;
      right: 2%;
      font-weight: bold;
    }
    .label{
      position: absolute;
      top: 8%;
      right: 36%;
      width: 100%;
      background-color: #250140;
      color: #bfbebd;            
      text-align: center;
      font-size: 90%;
      font-weight: 600;
      transform: rotate(-45deg);
    }
    @media screen and (max-width:999px) and (min-width:750px) {
      .head{
        height: 300px;
      }
    }
    @media screen and (max-width:749px) and (min-width:550px) {
      .head{
        height: 250px;
      }
      .headService {
        grid-template-columns: 1fr 1fr;
      }
      .service {
        width: 100%;
      }
      .service img{
        width: 100%;
        height: 80%;
      }
      .label{
        right: 34%;
        font-size: 80%;
        font-weight: 500;
      }
    }
    @media screen and (max-width:549px) {
      .head{
        height: 200px;
      }
      .headService {
        display: block;
        margin: 10%;
        width: 80%;
      }
      .service {
        margin-bottom: 10%;
      }
      .service img{
        width: 100%;
        height: 70%;
      }
      .label{
        right: 34%;
        font-size: 80%;
        font-weight: 500;
      }
    }
  </style>
  
</head>
<body>


@extends('customerFrame')
@section('condent')
  <div class="head">
    <div class="headAdditional">
      <h5>Book a Service to Get Reward</h5>
      <p>Discover the perfect console for yours.</p>
    </div>
  </div>

  <div class="body">
    <div class="bodyadditional">
        <h1>BOOK SERVICE NOW</h1>
        <p>Add-on to make it perfect.</p>
    </div>
  </div>

  <div class="headService">
    <div class="service">
      <img src="https://www.shutterstock.com/image-vector/logo-vector-auto-parts-repair-600nw-2318420573.jpg" alt="service">
      <h6 class="rate"></h6>
      <p class="label"></p>
    </div>
    <div class="service">
      <img src="https://thumbs.dreamstime.com/b/engine-power-automotive-logo-can-be-used-auto-company-club-workshop-spare-part-store-shop-many-other-business-135797577.jpg" alt="service">
      <p class="rate"></p>
      <p class="label"></p>
    </div>
    <div class="service">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_xbhCpv8b9O3zvfkj2rOKLNBMA0qxLno3Z5KfMGdug3s9TFuLMkZxj-rSTkgpZrsiRqY&usqp=CAU" alt="service">
      <p class="rate"></p>
      <p class="label"></p>
    </div>
    <div class="service">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4-iwa5C54abbxkucNDzVuqu1yZsXxycMmRw&s" alt="service">
      <p class="rate"></p>
      <p class="label"></p>
    </div>
    <div class="service">
      <img src="https://images-platform.99static.com/_0cmp7AnqRaN5XidZcNOY4D8Rrg=/500x500/top/smart/99designs-contests-attachments/58/58344/attachment_58344906" alt="service">
      <p class="rate"></p>
      <p class="label"></p>
    </div>
    <div class="service">
      <img src="https://www.shutterstock.com/shutterstock/photos/1798102300/display_1500/stock-vector-black-and-white-illustration-of-a-wrench-bicycle-gear-text-on-a-white-background-vector-1798102300.jpg" alt="service">
      <p class="rate"></p>
      <p class="label"></p>
    </div>
    <div class="service">
      <img src="https://www.shutterstock.com/shutterstock/photos/1798102300/display_1500/stock-vector-black-and-white-illustration-of-a-wrench-bicycle-gear-text-on-a-white-background-vector-1798102300.jpg" alt="service">
      <p class="rate"></p>
      <p class="label"></p>
    </div>
  </div>

@endsection
 
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const services = document.querySelectorAll('.service');

      services.forEach((service, index) => {
        const pTag = service.querySelector('.rate');
        const label = service.querySelector('.label');
        if (pTag) {
          var rate = Math.floor(Math.random() * 30);
          pTag.textContent = rate + 30 + " - rs" ;
        }
        if (label) {
          var rate = Math.floor(Math.random() * 20);
          label.textContent = rate + 10 + " % OFFER";
        }
        const h5Tag = document.createElement('h5');
        h5Tag.textContent = "Service" + index;
        service.appendChild(h5Tag);
      });
    });
  </script>


</body>
</html>
