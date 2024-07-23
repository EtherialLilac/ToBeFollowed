<?php
require '../dbconnection.php';


    if(isset($_POST['adusername'])){
        $adusername = $_POST['adusername'];
        $adPassword = $_POST['adPassword'];


        $sqlcommand = "SELECT * FROM adminacctbl WHERE username = '$adusername'";
        $query = mysqli_query($conn, $sqlcommand);

        if($query->num_rows > 0){
          
            $row = $query->fetch_assoc();

            if($row['password'] == $adPassword){
                echo "<script> alert('Successfully login'); 
                window.location.href = 'adminpage.php';
                </script>";
            }else{
                echo "<script> alert('Invalid username or password'); 
                window.location.href = 'petadoptionLogin.php';
                </script>";
            }

        }else{
            echo "<script> alert('Invalid username or password'); 
            window.location.href = 'petadoptionLogin.php';
            </script>";
        }




    }

?>