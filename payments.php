<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="payments.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Payments</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">My Website</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="products.php">Eras Tour</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="">Payments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"></a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="cart">
        <!--  -->
    </div>

    <div class="payment">
        <div id="total-price-container">
            <p>Total Price: <span id="total-price">$0</span></p>
        </div>
        <div class="thanhtoan">
            <label>
                <img src="logo/MoMo_Logo.png" alt="...">
                <input type="radio" name="paymentMethod" value="momo">
            </label>

            <label>
                <img src="logo/download.png" alt="...">
                <input type="radio" name="paymentMethod" value="visa">
            </label>

            <label>
                <img src="logo/paypal.png" alt="paypal">
                <input type="radio" name="paymentMethod" value="paypal">
            </label>
        </div>
    <br>
        <label for="agree">
            <input type="checkbox" id="agree"> I agree to the <b>terms and services</b> 
        </label>
        <br>
        <button onclick="processPayment()" id="btn">Payment</button>
    </div>

  <div id="momo-modal" class="momomodal">
      <span class="close" onclick="closeModal('momo-modal')">&times;</span>
      <img src="logo/momothanhtoan.jpg" alt="Momo">
      <button onclick="showSuccessMessage()">Done</button>
  </div>

  <div id="visa-modal" class="momomodal">
      <span class="close" onclick="closeModal('visa-modal')">&times;</span>
      <img src="logo/Payment-success.png" alt="Visa">
      <button onclick="showSuccessMessage()">Done</button>
  </div>

  <div id="paypal-modal" class="momomodal">
      <span class="close" onclick="closeModal('paypal-modal')">&times;</span>
      <img src="logo/Payment-success.png" alt="PayPal">
      <button onclick="showSuccessMessage()">Done</button>
  </div>

  <div id="success-modal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeSuccessModal()">&times;</span>
      <p>Payment successful! Thank you.</p>
    </div>
  </div>

    <script src="payments.js"></script>
<!--  -->
</body>
</html>