<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <style>
    .about-container {
        background: #fff;
        margin: 5%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        line-height: 1.8;
      }

      section h2 {
        font-size: 1.8em;
        margin-bottom: 10px;
        color: #250140; 
      }

      section p, section ul {
        font-size: 1em;
        color: #250140; 
      }

  </style>
</head>
<body>
@extends('customerFrame')
@section('condent')
  <div class="about-container">
    <header class="header">
      <h1>About Us</h1>
      <p>Welcome to [Bike Service App Name], your trusted partner for all your bike maintenance and repair needs.</p>
    </header>

    <section class="mission">
      <h2>Our Mission</h2>
      <p>Our mission is simple yet impactful: to keep your wheels spinning smoothly and safely on the road. We know the importance of reliable transportation, whether for commuting, leisure, or sport, and we are dedicated to ensuring that every ride is as safe and enjoyable as possible.</p>
    </section>

    <section class="story">
      <h2>Our Story</h2>
      <p>Founded by passionate cyclists in [Founding Year], [Bike Service App Name] was born out of the need for quality, on-demand bike services. Over the years, we’ve grown from a small local workshop to a reliable digital service platform, connecting riders with expert technicians. We aim to make bike maintenance accessible and hassle-free, bringing top-notch service directly to your fingertips.</p>
    </section>

    <section class="highlights">
      <h2>Why Choose Us?</h2>
      <ul>
        <li><strong>Expert Technicians:</strong> Our team consists of certified and experienced technicians who treat every bike with care and precision.</li>
        <li><strong>Convenient Service:</strong> From repairs to customizations, book a service at your convenience through our app, and we’ll handle the rest.</li>
        <li><strong>Customer Satisfaction:</strong> Your safety and satisfaction are our top priorities, and we’re committed to delivering quality you can trust.</li>
      </ul>
    </section>

    <section class="team">
      <h2>Meet Our Team</h2>
      <p>Our team is more than just technicians; we are cycling enthusiasts who understand the joy and importance of a smooth, reliable ride. With a shared love for biking, we’re driven by the mission to provide the best service and keep you riding safely.</p>
    </section>
  </div>
  @endsection
</body>
</html>
