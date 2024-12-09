<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .contact-container {
      padding: 2%;
      margin: 5%;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      color: #061c47;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .contact-form label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
    }

    .contact-form input,
    .contact-form textarea,
    .contact-form select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .contact-form button {
      display: inline-block;
      margin-top: 15px;
      padding: 10px 20px;
      background-color: #333;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .contact-form button:hover {
      background-color: #555;
    }

  </style>
</head>
<body>
@extends('shopOwnerFrame')
@section('content')
  <div class="contact-container">
    <header class="header">
      <h1>Contact Us</h1>
      <p>Have a question about our bike services? We're here to help!</p>
    </header>

    <section class="contact-info">
      <h2>Contact Information</h2>
      <p><strong>Email:</strong> support@bikeserviceapp.com</p>
      <p><strong>Phone:</strong> +1 (123) 456-7890</p>
      <p><strong>Address:</strong> 123 Bike Lane, Cycling City, Country</p>
      <p><strong>Operating Hours:</strong> Monday - Saturday, 9:00 AM - 6:00 PM</p>
    </section>

    <section class="contact-form">
      <h2>Send Us a Message</h2>
      <form action="#" method="POST">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="service-type">Service Type</label>
        <select id="service-type" name="service-type" required>
          <option value="repair">Repair</option>
          <option value="maintenance">Maintenance</option>
          <option value="customization">Customization</option>
          <option value="other">Other</option>
        </select>

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="4" placeholder="Describe your issue or request" required></textarea>

        <button type="submit">Submit</button>
      </form>
    </section>
  </div>
@endsection
</body>
</html>
