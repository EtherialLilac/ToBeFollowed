<?php
include 'dbconnection.php';
//When the Pet ID is not set it will go back to adopt.php
if(!isset($_POST['petID'])){
  header("Location: adopt.php");
}

$PetID = $_POST['petID'];


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
        </ul>
      </div>
    </div>
  </nav>
  

    <div class="content">
<?php

$getpet = "SELECT * FROM adoptiontbl WHERE adptID = '$PetID'";
$query = mysqli_query($conn, $getpet);

$petdata = mysqli_fetch_assoc($query);
?>


        <div class="container">
            <div class="row">
              <div class="col-md-6 offset-md-3">
                <div class="form-box">
                  <h2 style="color: darkorchid;font-weight: bolder;">User adoption <?= $petdata['name'] ?></h2><br><br>
                  
                  <form target="_blank" action="petadopting.php" method="POST"  enctype = "multipart/form-data">
                    <div class="form-group">
                      <!-- This part is to get the value ID -->
                    
                     

                      <input type="hidden" name="adptID" value="<?= $PetID ?>">
                      <label for="name">Firstname:</label>
                      <input type="text" class="form-control" id="name" name="adptfname" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Lastname:</label>
                        <input type="text" class="form-control" id="name" name="adptlname" required>
                      </div>                    
                      <div class="form-group">
                        <label for="name">Complete address:</label>
                        <input type="text" class="form-control" id="name" name="adptaddress" required>
                      </div>                         <div class="form-group">
                        <label for="name">Occupation:</label>
                        <input type="text" class="form-control" id="name" name="adptoccupation" required>
                      </div>                    
                      <div class="form-group">
                        <label for="name">Cellphone number:</label>
                        <input type="text" class="form-control" id="name" name="adptcpnum" required>
                      </div>                    
                      <div class="form-group">
                        <label for="name">E_Mail:</label>
                        <input type="text" class="form-control" id="name" name="adptemail" required>
                      </div>     
                      <div class="form-group">
                        <label for="GovID">govermentID:</label>
                        <input type="file" class="form-control" id="GovID" name="GovID" required>
                      </div>                    

                     

                  <!---              
                      <div class="container">
                        <div class="row">
                          <div class="col-md-6 offset-md-3">
                              <div class="form-group">
                                <label for="dateInput">Date:</label>
                                <input type="date" class="form-control" id="dateInput" name="adptdate" required>
                              </div>
                              <div class="form-group">
                                <label for="timeInput">Time:</label>
                                <input type="time" class="form-control" id="timeInput" name="adpttime" required>
                              </div>
                          </div>
                        </div>
                      </div---->
                     <h6><b> Before submitting the form answer the google form then redirect to the form to submit</b></h6>
                      <a href="https://docs.google.com/forms/d/e/1FAIpQLSejrbxaOjvtW9qxEw5BP8O5DxCEqdyi8Piwh-gJsV19tp9wyg/viewform" target="_blank">Open Google Form</a><br><br>


                          <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </div>
                        </div>

                    
                      <!-- Bootstrap JS (optional, for certain components that require it) -->
                      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      

                  </form>
                </div>
              </div>
            </div>
          </div>
          
                        <br><br><br><br><br><br>




        

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
