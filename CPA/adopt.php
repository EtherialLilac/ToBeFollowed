
<?php
include 'dbconnection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CPA - TRION</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">   
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="img/CPALOGO (2).png" type="image/x-icon">

</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/CPALOGO (2).png" alt="Logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
          <a class="nav-link" href="index.html">&nbsp;&nbsp;About us&nbsp;&nbsp;|</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="donate.html">&nbsp;&nbsp;Donate&nbsp;&nbsp;|</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adopt.php">&nbsp;&nbsp;Adopt&nbsp;&nbsp;|</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="request.html">Request for intake and foster&nbsp;&nbsp;|</a>
          </li>
          <li class="nav-item">
            <a style="color: blue;" class="nav-link" href="admin/petadoptionLogin.php">&nbsp;&nbsp;&nbsp;&nbsp;Admin Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  

    <div class="content">
<!--card-->
        <div class="container">
            <div class="curved-box">
              <h3>PETS AVAILABLE FOR ADOPTION</h3>
              <p>Bring Them Home.</p>
            </div>
          </div>
          <br><br><br><br>

<!--PET LIST-->
<div class="container">
    <div class="row">
    <?php 

      $getdata = "SELECT * FROM adoptiontbl WHERE Status = 'Ongoing'";
      $query = mysqli_query($conn, $getdata);


    while ($row = $query->fetch_assoc()) {
        // Display image here
        echo '<div class="col-md-4">
                <div class="photo-card" style="width: 360px; height: 700px; background-color: white; padding: 15px; border-radius: 8px; font-family: arial;">
                  <img src="data:image/jpg;charset=utf8;base64,' . base64_encode($row['petImg']) . '" class="card-img-top rounded img-fluid" style="width: 100%; height: 200px;" alt="Sample Image">
                  <div class="card-body">
                    <h5 class="card-title">' . $row['name'] . '</h5>
                    <p class="card-text text-justify" style="line-height: 1.5;">' . $row['address'] . '</p>
                    <p class="card-text text-justify" style="line-height: 1.5;">' . $row['phoneno'] . '</p>
                    <p class="card-text text-justify" style="line-height: 1.5;">' . $row['Telno'] . '</p>
                    <p class="card-text text-justify" style="line-height: 1.5;">' . $row['Gender'] . '</p>
                    <p class="card-text text-justify" style="line-height: 1.5;">' . $row['msgDes'] . '</p>
                    
                    <form action="adoptform.php" method="post">
                      <input type="hidden" name="petID" value="' . $row['adptID'] . '">
                      <button type="submit" class="btn btn-primary">ADOPT NOW!</button>
                    </form>
                  </div>
                </div>
              </div>';
    }

      ?>

    </div>
  </div>

  <br><br><br><br>



               

 </div>
</div>
</div>
</div>
<!-- Footer -->
<div class="footer">
<div class="footer-icons">
<a href="#"><i class="fab fa-facebook"></i></a>
<a href="#"><i class="fab fa-twitter"></i></a>
<a href="#"><i class="fab fa-instagram"></i></a>
<a href="#"><i class="fab fa-linkedin"></i></a>
</div>
<p>Connect with us on social media for updates and more!</p>
<p>&copy; 2023 Companion Pet Adoption - CATS OF LEGASPI VILLAGE</p>

</div>
<!--Talkto-->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/658ff5900ff6374032ba847a/1hit5ef8o';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


<!-- Bootstrap JS (optional, for certain components that require it) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

</body>
</html>