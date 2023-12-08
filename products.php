<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="products.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
  img {
      width: 560px;
      height: 700px;
  }
</style>
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
                <li class="nav-item active">
                    <a class="nav-link" href="#">Eras Tour</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="payments.php">Payments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
        </div>
    </nav>
  <main>
      <div class="content">
          <h1>Eras Tour</h1>
      </div>
      <div class="products">
          <div class="product">
              <img src="pic/info1.png"
                  alt="product 1">
              <h3>South America</h3>
              <a class="btn" href="infor1.html">More Info</a>
          </div>
          <div class="product">
              <img src="pic/infor2.png" alt="product 2">
              <h3>Nashville</h3>
              <a class="btn" href="infor2.html">More Info</a>
          </div>
          <div class="product">
              <img src="pic/info3.png" alt="product 3">
              <h3>Tokyo</h3>
              <a class="btn" href="infor3.html">More Info</a>
          </div>
      </div>
      <a href="/project/logout.php">
        <button type="submit" name="dangxuat">Log-Out</button>
      </a>
  </main>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php 
    session_start();
    if(!isset ($_SESSION['mySession'])){
        header("Location: register.php");
    }
    ?>
</body>

</html>