<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Service Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        
        body {
            background-color: #f8f9fa;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .navbar{
            border: none;
            background-color: #3b3b3b;
            color: #fff;
            width: 100%;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            z-index: 5;
            position: fixed;
            bottom: 1%;
        }

        .navbar-toggler-icon img {
            border-radius: 50%;
        }
        .navbar-collapse {
            padding-left: 4%;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0);
            color:  rgba( 191, 190, 189, 0.9); 
        }
        .nav-link, .navbar-brand{
            color: #e5e5e5; 
            font-size: 90%;
            font-weight: bold;
        }
            
        .main-content {
            margin-bottom: 5%;
            padding: 2%;
        }

        .heading {
            font-weight: bold;
            margin-left: 2%;
        }

        .content {
            margin-left: 4%;
            font-size: 90%;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>
    
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Bike Service App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon dark" >
                    <img src="{{ Storage::url('public/profile/toggel-icon.png') }}" alt=" hello" width="100%" height="100%">
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-warning" href="/user">START</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Station-Owner"> Station Owner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Customer">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Key-Workflows"> Key Workflows </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Technical-Specifications">Technical</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Advantages">Advantages</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <h1>Welcome to Bike Service Application </h1>
        <div class="container">
            <div class="card-body" style="display: flex;">
                <img class="logo" src="{{ Storage::url('public/profile/bike-service-logo.png') }}"  alt="BIKE" width="200px " height="100px">
                <p><li class="content">Bike Service Application designed for owners of bike service stations and their customers. Its purpose is to provide a streamlined, user-friendly platform to manage bike services, bookings, and customer communications. Here's an overview and breakdown of its functionality.</li></p>
            </div>
        </div>
        <div class="card-body" id="Station-Owner">

            <h3>Bike Station Owners</h3>

            <p class="heading">1. Manage Services</p>
            <p class="content">The owner can create, edit, or delete services they offer, such as "General service check-up," "Oil change," etc.
            Each service will have detailed information (e.g., price, duration).</p>

            <p class="heading">2. Manage Bookings</p>
            <p class="content">Owners can view all pending, ready for delivery, and completed bookings in a structured manner.
            Owners can see the details of each booking, including the customer's name, service type, and date of the booking.</p>
            
            <p class="heading">3. Update Booking Status</p>
            <p class="content">Mark a booking as "ready for delivery" once the service is completed. This triggers an email notification to the customer, informing them their bike is ready for delivery.
            After delivery, the owner can mark the booking as "completed."
            </p>
            
            <p class="heading">4. Email Notifications:</p>
            <p  class="content">Owners receive an email whenever a customer books a service. This ensures they are immediately aware of new requests.</p>
        </div>
        <div class="card-body" id="Customer">
            <h3> Customers</h3>
                <p class="heading">1. Register an Account</p>
                <p class="content">Customers register using their email address and mobile number. This allows them to log in and track their bookings.</p>

                <p class="heading">2. Book Services</p>
                <p  class="content">Customers can select one or more services (e.g., General check-up, Oil change) and book them for a specific date.</p>

                <p class="heading">3. Track Booking Status:</p>
                <p  class="content">Customers can view the status of their current bookings:
                <li class="content">Pending: Booking has been made but not yet processed.</li>
                <li class="content">Ready for Delivery: The service is complete, and the bike is ready for pickup.</li>
                <li class="content">Completed: The bike has been delivered.</li></p>
                
                <p class="heading">4. View Booking History</p>
                <p class="content">Customers can access a history of all their previous bookings for reference.</p>
                
                <p class="heading">5. Receive Notifications:</p>
                <p class="content">Customers receive an email notification when their bike is ready for delivery. This improves customer satisfaction and communication.</p>
            </dl>
        </div>
        <div class=" card-body" id="Key-Workflows">
            <h3>Key Workqflows</h3>
            <p class="heading">1. Booking Workflow</p>
            <li class="content">
            Customer logs into the app and selects one or more services.
            They choose a date and confirm the booking.
            The system sends an email notification to the owner with booking details.
            The booking status is initially marked as Pending.</li>
            
            <p class="heading">2. Service Completion Workflow:</p>
            <li class="content">The owner completes the service and marks the booking as Ready for Delivery.</li>
            <li class="content">The system sends an email notification to the customer that their bike is ready for pickup.</li>
            
            <p class="heading">3. Delivery Workflow:</p>
            <li class="content">Once the customer picks up the bike, the owner marks the booking as Completed.</li>
            
            <p class="heading">4. Service Management Workflow:</p>
            <li class="content">Owners can update the list of services (add new ones, modify existing ones, or remove obsolete ones) as needed.</li>
            </dl>
        </div>

        <div class="card-body " id="Technical-Specifications">
            <h3>Technical Specifications</h3>
            
            <p class="heading">1. Frontend:-</p>
            <li  class="content">HTML, CSS, JavaSc  ript, and Bootstrap for a responsive and user-friendly interface.</li>
            <p class="content"><li class="content">Pages include:</li>
            <li  class="content">Customer Dashboard: For bookings, status tracking, and history.</li>
            <li class="content">Owner Dashboard: For managing services and bookings.</li></p>
            
            <p class="heading">2. Backend:-</p>
            <p class="content">Developed using a backend framework like PHP (Laravel) or Node.js.
            Handles data storage, user authentication, and communication between frontend and database.</p>
            
            <p class="heading">3. Database:-</p>
            <p><li class="content">Stores details for:</li></p>
            <p><li class="content">Users: Customers and owners.</li></p>
            <p><li class="content">Services: Offered by the service station.</li></p>
            <p><li class="content">Bookings: Including status, service details, and customer information.</li></p>

            <p class="heading">4. Email Integration:</p>
            <p class="content">Use an email service (e.g., SMTP, SendGrid, or Mailgun) for sending notifications.</p>

            <p class="heading">5. Authentication:</p>
            <p class="content">Secure login and registration for customers using email verification and password protection.</p>
        </div>
        <div class="card-body" id="Advantages">
            <h3>Advantages</h3>
            
            <p class="heading">For Owners:</p>
            <p><li class="content">Efficient service and booking management.</li></p>
            <p><li class="content">Improved communication with customers via automated notifications.</li></p>
            <p><li class="content">Ability to track and organize bookings by status.</li></p>
            
            <p class="heading">For Customers</p>
            <p><li class="content">Simple and convenient service booking.</li></p>
            <p><li class="content">Transparent tracking of service status.</li></p>
            <p><li class="content">Quick notifications when services are ready.</li></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>


