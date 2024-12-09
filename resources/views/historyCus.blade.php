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

        .basic { 
            color: #061c47;
            font-weight: bold;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border-bottom: 1px solid #ccc;
            padding: 10px 0px;
        }

        .top-content {
            display: flex;
        }

        .basic-detail {
            color: #061c47;
            display: flex;
            justify-content: center;
            text-align: center;
            gap: 10px;
        }

        .more-details {
            background-color: #ebf0eb;
            border-radius: 10px;
            color: #061c47;
            display: flex;
            justify-content: center;
            font-size: 100%;
        }

        .profile-icon button {
            border: none;
            background-color: transparent;
            color: #007bff;
            font-size: 90%;
            cursor: pointer;
            float: right;
        }

        @media screen and (max-width:499px) {
            .cross-line{
                display: none;
            }
            .basic-detail, .more-details, .top-content {
                display: block;
            }
        }
        @media screen and (max-width:999px) and (min-width:500px) {
            .top-content {
                display: block;
            }
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
        <div class="top-content">
            <div class="basic-detail text-center">     
                <p class="ml-4 mr-4">Bike Name : {{ $his->bikebrand }}</p>
                <span class="cross-line">|</span>
                <p class="ml-4 mr-4">Booking Date : {{ $his->bookingDate }}</p>
                <span class="cross-line">|</span>
                <p class="ml-4 mr-4">Expected Date : {{$his->deliverDate}}</p>
                <span class="cross-line">|</span> 
            </div>
            <span class="profile-icon ml-4">
            <button class="btn text fw-bold" onclick="history({{$his->id}})">
                Show More ↓
            </button>
            </span>
        </div>

        <div id="details{{$his->id}}" style="display: none; " class="more-details text-center">
            <div class="">
            <p class="text-center">Shop address :{{ $shopOwner[$index]["address"] }}</p>
                <div class="more-details">
                    <p class="mr-2">Bike Model: {{ $his->bikemodel }}</p>
                    <span class="cross-line">|</span>
                    <p class="ml-2">City: {{ $his->city }}</p>
                </div>
                <table class="table table-secondary table-hover">
                    <tr class="table-dark">
                        <th>SERVICE</th>
                        <th>RATE</th>
                    </tr>
                    @if ( $his->service1 )
                    <tr>
                        <td>{{ $his->service1 }}</td>
                        <td>{{ $his->rate1 }} - INR</td>
                    </tr>
                    @endif
                    @if ( $his->service2 )
                    <tr>
                        <td>{{ $his->service2 }}</td>
                        <td>{{ $his->rate2 }} - INR</td>
                    </tr>
                    @endif
                    @if ( $his->service3 )
                    <tr>
                        <td>{{ $his->service3 }}</td>
                        <td>{{ $his->rate3 }} - INR</td>
                    </tr>
                    @endif
                    @if ( $his->service4 )
                    <tr>
                        <td>{{ $his->service4 }}</td>
                        <td>{{ $his->rate4 }} - INR</td>
                    </tr>
                    @endif
                    @if ( $his->service5 )
                    <tr>
                        <td>{{ $his->service5 }}</td>
                        <td>{{ $his->rate5 }} - INR</td>
                    </tr>
                    @endif
                    @if ( $his->aditional )
                    <tr>
                        <td>{{ $his->aditional }}</td>
                        <td></td>
                    </tr>
                    @endif
                    <tr>
                        <td>Total</td>
                        <td>{{  $his->rate1 + $his->rate2 + $his->rate3 + $his->rate4 + $his->rate5 + $his->rate6}} - INR</td>
                    </tr>
                </table>
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
        }
        else if (detail.style.display == 'none'){
            detail.style.display = "block";
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>