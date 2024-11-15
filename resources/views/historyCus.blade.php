

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: bold;
            background-color: #e8effc;
        }
        
        .content{
            padding-top: 5%;
        }

        .basic { 
            color: #061c47;
            font-weight: bold;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border-bottom: 1px solid #ccc;
            padding: 10px 0px;
        }

        .basic-detail {
            color: #061c47;
            display: flex;
            justify-content: center;
            text-align: center;
            gap: 10px;
        }

        .more-details {
            background-color: #e8effc;
            border-radius: 10px;
            color: #061c47;
            display: flex;
            justify-content: center;
            font-size: 90%;
        }

        .profile-icon button {
            border: none;
            background-color: transparent;
            color: #007bff;
            font-size: 90%;
            cursor: pointer;
        }

    </style>
</head>
<body>

@extends('customerFrame')
@section('condent')

<div class="container mt-5 content">

    @foreach ($history as $index=>$his)
    <div class="mt-3 basic" id="basic">
        <p class="ml-4 text-uppercase text-center">Shop Name : {{$shopOwner[$index]["name"]}}</p>
        <div class="basic-detail text-center">     
            <p class="ml-4 mr-4">Bike Name : {{$his->bikebrand}}</p><span>|</span>
            <p class="ml-4 mr-4">Booking Date : {{$his->bookingDate}}</p><span>|</span>
            <p class="ml-4 mr-4">Expected Date : {{$his->deliverDate}}</p><span>|</span> 
            
            <span class="profile-icon ml-4">
            <button class="btn text-primary fw-bold" onclick="history({{$his->id}})">
                Show More ↓
            </button>
            </span>
        </div>

        <div id="details{{$his->id}}" style="display: none; " class="more-details text-center">
            <div class="">
            <p class="text-center">Shop address : <span class="text-success">{{$shopOwner[$index]["address"]}}</span></p>
                <div class="more-details">
                    <p class="mr-2">Bike Model: {{$his->bikemodel}}</p>|
                    <p class="ml-2">City: {{$his->city}}</p>
                </div>
                <h4 class="fw-bld">Services</h4>
                <div class="services row text-success">
                    @if ($his->service1)
                        <p class="col">{{$his->service1}}</p>
                    @endif
                    @if ($his->service2)
                        <p class="col">{{$his->service2}}</p>
                    @endif
                    @if ($his->service3)
                        <p class="col">{{$his->service3}}</p>
                    @endif
                    @if ($his->service4)
                        <p class="col">{{$his->service4}}</p>
                    @endif
                    @if ($his->service5)
                        <p class="col">{{$his->service5}}</p>
                    @endif
                    @if ($his->aditional)
                        <p class="col">{{$his->aditional}}</p>
                    @endif
                </div>
            </div>
            <div class="text-danger">
                @if ($his->status == null)
                    <a href="/cancleCus/{{$his->id}}" class="btn fw-bold">cancle</a>
                @endif
                @if ($his->status != null)
                    <p>{{$his->status}}</p>
                @endif
            </div>
        </div>
    </div>
    @endforeach    

</div>

@endsection

<script>
    function history (a) {
        var detail = document.getElementById('details' + a);
        if (detail.style.display == 'block'){
            detail.style.display = "none";
            // document.getElementById('basic').style.transition = "max-height 4s ease";
        }
        else if (detail.style.display == 'none'){
            detail.style.display = "block";
            // document.getElementById('basic').style.transition = "max-height 4s ease";
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>