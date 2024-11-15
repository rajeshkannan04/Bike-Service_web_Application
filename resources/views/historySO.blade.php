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
            background-color: #e8effc;
        }

        .basic {
            color: #353d06;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border-bottom: 1px solid #ccc;
        }

        .basic-detail {
            color: #0b4733;
            display: flex;
            justify-content: center;
            text-align: center;
        }

        .more-details {
            background-color: #e8effc;
            justify-content: center;
            text-align: center;
            display: flex;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .profile-icon button {
            border: none;
            color: #007bff;
            cursor: pointer;
        }

        .extra-content{
            color: #0b4733;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        @media screen and (max-width:499px) {
            .cross-line{
                display: none;
            }
            .basic-detail, .more-details{
                display: block;
            }
        }

    </style>
</head>
<body>

@extends('shopOwnerFrame')
@section('condent')

<div class="container mt-5">
    <div class="text-danger-emphasis mt-3"><h5>Pending</h5></div>
    @foreach ($ShopOwnerHistory as $index=>$soh)
        @if($soh->status != 'done' && $soh->status != 'cancle')
            <div class="mt-3 basic" id="basic">
                <p class="ml-4 text-uppercase text-center">Customer Name : {{$CustomerName[$index]}}</p>
                <div class="basic-detail text-center">     
                    <p class="ml-4 mr-4">Bike Name : {{$soh->bikebrand}}</p>
                    <span class="cross-line">|</span>
                    <p class="ml-4 mr-4">Booking Date : {{$soh->bookingDate}}</p>
                    <span class="cross-line">|</span>
                    <p class="ml-4 mr-4">Expected Date : {{$soh->deliverDate}}</p>
                    <span class="cross-line">|</span> 
                    <span class="profile-icon ml-4">
                        <button class="btn text-primary fw-bold" id="more-btn{{$soh->id}}" onclick="history({{$soh->id}})"> ↓ </button>
                    </span>
                </div>
                <div id="details{{$soh->id}}" style="display: none; font-size: 90%; " class="text-center extra-content">
                    <div class="more-details">
                        <p class="mr-3">Bike Model: {{$soh->bikemodel}}</p>
                        <span class="cross-line"> | </span>
                        <p class="ml-3">City: {{$soh->city}}</p>
                    </div>
                    <p class="fw-bold">Services</p>
                    <div class="row service">
                        @if ($soh->service1)
                            <p class="col">{{$soh->service1}}</p>
                        @endif
                        @if ($soh->service2)
                            <p class="col">{{$soh->service2}}</p>
                        @endif
                        @if ($soh->service3)
                            <p class="col">{{$soh->service3}}</p>
                        @endif
                        @if ($soh->service4)
                            <p class="col">{{$soh->service4}}</p>
                        @endif
                        @if ($soh->service5)
                            <p class="col">{{$soh->service5}}</p>
                        @endif
                        @if ($soh->aditional)
                            <p class="col">{{$soh->aditional}}</p>
                        @endif
                    </div>
                    <div class="text fw-bold">
                        @if ($soh->status == null)
                            <a href="/bookingStatus/cancle/{{$soh->id}}" class="mr-2">Cancel</a>
                            <a href="/bookingStatus/accept/{{$soh->id}}" class="ml-2">Accept</a>
                        @elseif ($soh->status == 'accept')
                            <a href="/bookingStatus/readyForDelivery/{{$soh->id}}" class="">Ready for Delivery</a>
                        @elseif ($soh->status == 'readyForDelivery')
                            <a href="/bookingStatus/done/{{$soh->id}}" class="">Done</a>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @endforeach 

    <div class="text-danger-emphasis mt-3"><h5>Completed Bookings</h5></div>
    @foreach ($ShopOwnerHistory as $index=>$soh)
        @if($soh->status == 'done')
            <div class="mt-3 basic" id="basic">
                <p class="ml-4 text-uppercase text-center">Customer Name : {{$CustomerName[$index]}}</p>
                <div class="basic-detail text-center">     
                    <p class="ml-4 mr-4">Bike Name : {{$soh->bikebrand}}</p>
                    <span class="cross-line">|</span>
                    <p class="ml-4 mr-4">Booking Date : {{$soh->bookingDate}}</p>
                    <span class="cross-line">|</span>
                    <p class="ml-4 mr-4">Expected Date : {{$soh->deliverDate}}</p>
                    <span class="cross-line">|</span> 
                    
                    <span class="profile-icon ml-4">
                    <button class="btn text-primary fw-bold" id="more-btn{{$soh->id}}" onclick="history({{$soh->id}})">
                         ↓ 
                    </button>
                    </span>
                </div>
                <div id="details{{$soh->id}}" style="display: none; font-size: 90%; " class="extra-content text-center">
                    <div class="more-details">
                        <p class="mr-3">Bike Model: {{$soh->bikemodel}}</p>|
                        <p class="ml-3">City: {{$soh->city}}</p>
                    </div>
                    <h5 class="fw-bold">Services</h5>
                    <div class="service row">
                        @if ($soh->service1)
                            <p class="col">{{$soh->service1}}</p>
                        @endif
                        @if ($soh->service2)
                            <p class="col">{{$soh->service2}}</p>
                        @endif
                        @if ($soh->service3)
                            <p class="col">{{$soh->service3}}</p>
                        @endif
                        @if ($soh->service4)
                            <p class="col">{{$soh->service4}}</p>
                        @endif
                        @if ($soh->service5)
                            <p class="col">{{$soh->service5}}</p>
                        @endif
                        @if ($soh->aditional)
                            <p class="col">{{$soh->aditional}}</p>
                        @endif
                    </div>
                    <div class="text">
                            <span class="text-success fw-bold">Done</span>
                    </div>
                </div>
            </div>
        @endif
    @endforeach 
    
    <div class="text-danger-emphasis mt-3"><h5>Cancled Bookings</h5></div>
    @foreach ($ShopOwnerHistory as $index=>$soh)
        @if($soh->status == 'cancle')
            <div class="mt-3 basic" id="basic">
                <p class="ml-4 text-uppercase text-center">Customer Name : {{$CustomerName[$index]}}</p>
                <div class="basic-detail text-center">     
                    <p class="ml-4 mr-4">Bike Name : {{$soh->bikebrand}}</p>
                    <span class="cross-line">|</span>
                    <p class="ml-4 mr-4">Booking Date : {{$soh->bookingDate}}</p>
                    <span class="cross-line">|</span>
                    <p class="ml-4 mr-4">Expected Date : {{$soh->deliverDate}}</p>
                    <span class="cross-line">|</span> 
                    <span class="profile-icon ml-4">
                    <button class="btn text-primary fw-bold" id="more-btn{{$soh->id}}" onclick="history({{$soh->id}})">
                         ↓ 
                    </button>
                    </span>
                </div>
                <div id="details{{$soh->id}}" style="display: none; font-size: 90%; " class="extra-content text-center">
                    <div class="more-details">
                        <p class="mr-3">Bike Model: {{$soh->bikemodel}}</p>|
                        <p class="ml-3">City: {{$soh->city}}</p>
                    </div>
                    <h5 class="fw-bold">Services</h5>
                    <div class="service row">
                        @if ($soh->service1)
                            <p class="col">{{$soh->service1}}</p>
                        @endif
                        @if ($soh->service2)
                            <p class="col">{{$soh->service2}}</p>
                        @endif
                        @if ($soh->service3)
                            <p class="col">{{$soh->service3}}</p>
                        @endif
                        @if ($soh->service4)
                            <p class="col">{{$soh->service4}}</p>
                        @endif
                        @if ($soh->service5)
                            <p class="col">{{$soh->service5}}</p>
                        @endif
                        @if ($soh->aditional)
                            <p class="col">{{$soh->aditional}}</p>
                        @endif
                    </div>
                    <div class="text">
                        @if ($soh->status == 'cancle')
                            <span class="text-danger fw-bold">Canceled</span>
                        @endif
                   </div>
                </div>
            </div>
        @endif
    @endforeach 

</div>

@endsection


<script>

    function history(a) {

        const allExtraDetails = document.querySelectorAll('.extra-content');
        const allButtons = document.querySelectorAll('.profile-icon button');

        // console.log(allExtraDetails.detail);
        // console.log(btn);

        allExtraDetails.forEach((detail) => {
            if (detail.id !== 'details' + a) {
                detail.style.display = 'none';
            }
        });

        allButtons.forEach((btn) => {
            if (btn.id !== 'more-btn' + a) {
                btn.style.transform = 'rotate(0deg)';
            }
        });

        var detail = document.getElementById('details' + a);
        var moreBtn = document.getElementById('more-btn' + a);

        if (detail.style.display === 'none') {
            detail.style.display = "block";
            moreBtn.style.transform = "rotate(180deg)";
        } else {
            detail.style.display = "none";
            moreBtn.style.transform = "rotate(0deg)";
        }
    }

</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>