<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .basic {
            font-weight: 600;
            color: #353d06;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border-bottom: 1px solid #ccc;
            font-size: 90%;
        }

        .basic-detail {
            color: #0b4733;
            display: flex;
            justify-content: center;
            text-align: center;
        }

        .more-details {
            justify-content: center;
            text-align: center;
            display: flex;
            font-size: 110%;
        }

        .profile-icon button {
            border: none;
            color: #007bff;
            cursor: pointer;
        }

        .extra-content{
            color: #0b4733;
        }

        .extra-content table{
            width: 60%;
            margin: 0% 20%;
            font-size: 100%;
            font-weight: bold;
        }
        table .head {
            background-color: #061c47;
            color: #b9dbf0;
        }
        table .body {
            color: #061c47;
            background-color: #b9dbf0;
        }
        .btn {
            font-size: 90%;
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

@extends ( 'shopOwnerFrame' )
@section ( 'content' )
<?php $a=0; $b=0; $c=0; ?>

<div class="container mt-5">
    <div id="noHistory"></div>

    <div style="display:none" id="pending" class=" mt-3">
        <h5>  PENDING BOOKINGS:-</h5>
    </div>
    @foreach ( $ShopOwnerHistory as $index => $soh )
        @if( $soh->status != 'done' && $soh->status != 'cancle' )
            <div class="mt-3 basic" <?php $a+=1; ?>>
                <p class="ml-4 text-uppercase text-center">Customer Name : {{ $CustomerName[$index] }}</p>
                <div class="basic-detail text-center">     
                    <p class="ml-4 mr-4">Bike Name : {{$soh->bikebrand}}</p>
                    <span class="cross-line ms-2 me-2"> | </span>
                    <p class="ml-4 mr-4">Booking Date : {{$soh->bookingDate}}</p>
                    <span class="cross-line ms-2 me-2"> | </span>
                    <p class="ml-4 mr-4">Expected Date : {{$soh->deliverDate}}</p>
                    <span class="cross-line ms-2 me-2"> | </span> 
                    <span class="profile-icon ml-4">
                        <button class="btn text-primary fw-bold" id="more-btn{{$soh->id}}" onclick="history({{$soh->id}})"> ↓ </button>
                    </span>
                </div>
                <div id="details{{$soh->id}}" style="display: none; font-size: 90%; " class="text-center extra-content">
                    <div class="more-details">
                        <p class="mr-3">Bike Model: {{$soh->bikemodel}}</p>
                        <span class="cross-line ms-2 me-2"> | </span>
                        <p class="ml-3">City: {{$soh->city}}</p>
                    </div>
                    <table>
                        <tr class="head">
                            <th>SERVICE</th>
                            <th>RATE</th>
                        </tr>
                        @if ( $soh->service1 )
                        <tr class="body">
                            <td>{{ $soh->service1 }}</td>
                            <td>{{ $soh->rate1 }}</td>
                        </tr>
                        @endif
                        @if ( $soh->service2 )
                        <tr class="body">
                            <td>{{ $soh->service2 }}</td>
                            <td>{{ $soh->rate2 }}</td>
                        </tr>
                        @endif
                        @if ( $soh->service3 )
                        <tr class="body">
                            <td>{{ $soh->service3 }}</td>
                            <td>{{ $soh->rate3 }}</td>
                        </tr>
                        @endif
                        @if ( $soh->service4 )
                        <tr class="body">
                            <td>{{ $soh->service4 }}</td>
                            <td>{{ $soh->rate4 }}</td>
                        </tr>
                        @endif
                        @if ( $soh->service5 )
                        <tr class="body">
                            <td>{{ $soh->service5 }}</td>
                            <td>{{ $soh->rate5 }}</td>
                        </tr>
                        @endif
                        @if ( $soh->aditional )
                        <tr class="body">
                            <td>{{ $soh->aditional }}</td>
                            <td></td>
                        </tr>
                        @endif
                    </table>
                    <div class="text fw-bold">
                        @if ($soh->status == null)
                            <a href="/bookingStatus/cancle/{{$soh->id}}" class="mr-2 btn fw-bold">Cancel</a>
                            <a href="/bookingStatus/accept/{{$soh->id}}" class="ml-2 btn  fw-bold">Accept</a>
                        @elseif ($soh->status == 'accept')
                            <a href="/bookingStatus/readyForDelivery/{{$soh->id}}" class="btn fw-bold">Ready for Delivery</a>
                        @endif 
                        @if($soh->status == 'readyForDelivery' || $soh->status == 'accept')
                            <a href="/bookingStatus/done/{{$soh->id}}" class="btn  fw-bold">Delivered</a>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @endforeach 
    <input type="num" id="pendingData" value="<?php echo $a; ?>" hidden>

    <div style="display:none" id="DeliveredBookings" class="mt-3">
        <h5> Delivered Bookings </h5>
    </div>
    @foreach ($ShopOwnerHistory as $index=>$soh)
        @if($soh->status == 'done')
            <div class="mt-3 basic" <?php $b+=1; ?>>
                <p class="ml-4 text-uppercase text-center">Customer Name : {{$CustomerName[$index]}}</p>
                <div class="basic-detail text-center">     
                    <p class="ml-4 mr-4">Bike Name : {{$soh->bikebrand}}</p>
                    <span class="cross-line ms-2 me-2">|</span>
                    <p class="ml-4 mr-4">Booking Date : {{$soh->bookingDate}}</p>
                    <span class="cross-line ms-2 me-2">|</span>
                    <p class="ml-4 mr-4">Expected Date : {{$soh->deliverDate}}</p>
                    <span class="cross-line ms-2 me-2">|</span> 
                    
                    <span class="profile-icon ml-4">
                    <button class="btn text-primary fw-bold" id="more-btn{{$soh->id}}" onclick="history({{$soh->id}})">
                         ↓ 
                    </button>
                    </span>
                </div>
                <div id="details{{$soh->id}}" style="display: none; font-size: 90%; " class="extra-content text-center">
                    <div class="more-details">
                        <p class="mr-3">Bike Model: {{$soh->bikemodel}}</p>
                        <span class="cross-line ms-2 me-2">|</span>
                        <p class="ml-3">City: {{$soh->city}}</p>
                    </div>
                    <table>
                        <tr class="head">
                            <th>SERVICE</th>
                            <th>RATE</th>
                        </tr>
                        @if ( $soh->service1 )
                        <tr class="body">
                            <td>{{ $soh->service1 }}</td>
                            <td>{{ $soh->rate1 }}</td>
                        </tr>
                        @endif
                        @if ( $soh->service2 )
                        <tr class="body">
                            <td>{{ $soh->service2 }}</td>
                            <td>{{ $soh->rate2 }}</td>
                        </tr>
                        @endif
                        @if ( $soh->service3 )
                        <tr class="body">
                            <td>{{ $soh->service3 }}</td>
                            <td>{{ $soh->rate3 }}</td>
                        </tr>
                        @endif
                        @if ( $soh->service4 )
                        <tr class="body">
                            <td>{{ $soh->service4 }}</td>
                            <td>{{ $soh->rate4 }}</td>
                        </tr>
                        @endif
                        @if ( $soh->service5 )
                        <tr class="body">
                            <td>{{ $soh->service5 }}</td>
                            <td>{{ $soh->rate5 }}</td>
                        </tr>
                        @endif
                        @if ( $soh->aditional )
                        <tr class="body">
                            <td>{{ $soh->aditional }}</td>
                            <td></td>
                        </tr>
                        @endif
                    </table>
                    <div class="text">
                            <span><h6 class="fw-bold">Delivered</h6></span>
                    </div>
                </div>
            </div>
        @endif
    @endforeach 
    <input type="num" id="completedBooking" value="<?php echo $b; ?>" hidden>
    
    <div style="display:none" id="CancledBooking" class="mt-3">
        <h5> Cancled Bookings </h5>
    </div>
    @foreach ($ShopOwnerHistory as $index=>$soh)
        @if($soh->status == 'cancle')
            <div class="mt-3 basic" <?php $c+=1; ?>>
                <p class="ml-4 text-uppercase text-center">Customer Name : {{$CustomerName[$index]}}</p>
                <div class="basic-detail text-center">     
                    <p class="ml-4 mr-4">Bike Name : {{$soh->bikebrand}}</p>
                    <span class="cross-line ms-2 me-2">|</span>
                    <p class="ml-4 mr-4">Booking Date : {{$soh->bookingDate}}</p>
                    <span class="cross-line ms-2 me-2">|</span>
                    <p class="ml-4 mr-4">Expected Date : {{$soh->deliverDate}}</p>
                    <span class="cross-line ms-2 me-2">|</span> 
                    <span class="profile-icon ml-4">
                    <button class="btn text-primary fw-bold" id="more-btn{{$soh->id}}" onclick="history({{$soh->id}})">
                         ↓ 
                    </button>
                    </span>
                </div>
                <div id="details{{$soh->id}}" style="display: none; font-size: 90%; " class="extra-content text-center">
                    <div class="more-details">
                        <p class="mr-3">Bike Model: {{$soh->bikemodel}}</p>
                        <span class="cross-line ms-2 me-2">|</span>
                        <p class="ml-3">City: {{$soh->city}}</p>
                    </div>
                    <table>
                        <tr class="head">
                            <th>SERVICE</th>
                            <th>RATE</th>
                        </tr>
                        @if ( $soh->service1 )
                        <tr class="body">
                            <td>{{ $soh->service1 }}</td>
                            <td>{{ $soh->rate1 }}</td>
                        </tr>
                        @endif
                        @if ( $soh->service2 )
                        <tr class="body">
                            <td>{{ $soh->service2 }}</td>
                            <td>{{ $soh->rate2 }}</td>
                        </tr>
                        @endif
                        @if ( $soh->service3 )
                        <tr class="body">
                            <td>{{ $soh->service3 }}</td>
                            <td>{{ $soh->rate3 }}</td>
                        </tr>
                        @endif
                        @if ( $soh->service4 )
                        <tr class="body">
                            <td>{{ $soh->service4 }}</td>
                            <td>{{ $soh->rate4 }}</td>
                        </tr>
                        @endif
                        @if ( $soh->service5 )
                        <tr class="body">
                            <td>{{ $soh->service5 }}</td>
                            <td>{{ $soh->rate5 }}</td>
                        </tr>
                        @endif
                        @if ( $soh->aditional )
                        <tr class="body">
                            <td>{{ $soh->aditional }}</td>
                        </tr>
                            <td></td>
                        @endif
                    </table>
                    <div class="text">
                        <span><h6 class="fw-bold">Canceled</h6></span>
                   </div>
                </div>
            </div>
        @endif
    @endforeach 
    <input type="num" id="cancleBooking" value="<?php echo $c; ?>" hidden>

</div>

@endsection

<script>

    setTimeout(defineStatus,500);
    function defineStatus(){

        let pending = document.getElementById('pendingData').value;
        let DeliveredBookings = document.getElementById('completedBooking').value;
        let cancleBooking = document.getElementById('cancleBooking').value;

        if (pending == 0 && DeliveredBookings == 0 && cancleBooking == 0){
            const noContent =document.createElement('H1');
            noContent.innerText = "History Not Yet";
            noContent.style.margin = "10%"
            document.getElementById('noHistory').append(noContent);
        }
        if (pending > 0){
            document.getElementById('pending').style.display='block';
        } else {
            document.getElementById('pending').style.display='none';
        }
        if (DeliveredBookings > 0) {
            document.getElementById('DeliveredBookings').style.display='block';
        } else {
            document.getElementById('DeliveredBookings').style.display='none';
        }
        if(cancleBooking > 0){
            document.getElementById('CancledBooking').style.display='block';
        } else {
            document.getElementById('CancledBooking').style.display='none';
        }
        console.log(pending)
        console.log(DeliveredBookings)
        console.log(cancleBooking)
    }
   
    function history(a) {

        const allExtraDetails = document.querySelectorAll('.extra-content');
        const allButtons = document.querySelectorAll('.profile-icon button');

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


</body>
</html>