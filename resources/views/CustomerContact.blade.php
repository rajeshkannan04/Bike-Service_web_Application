<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: Arial, sans-serif;
    background-color: #f0f8ff;
    color: #250140; 
    line-height: 1.6;
  }

  .contact-container {
    display: grid;
    justify-content: center;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .header {
    text-align: center;
  }

  .contact-form label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
  }

  .contact-form input,
  .contact-form textarea,
  .contact-form select {
    border: 1px solid #ddd;
    border-radius: 5px;
  }

  .contact-form button {
    display: inline-block;
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
@extends('customerFrame')
@section('condent')
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

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="4" placeholder="Describe your issue or request" required></textarea>

        <button type="submit">Submit</button>
      </form>
    </section>
  </div>
  @endsection
</body>
</html>
