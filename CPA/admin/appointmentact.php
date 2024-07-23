<?php
require '../dbconnection.php';
if(isset($_POST['acceptID'])){

    $accept = $_POST['acceptID']; //This are the information of user who appoint to adopt pet
    
    $remarks = "Accepted Adopt";


    $getpetinfo = "SELECT * FROM adpt_appointment WHERE adptAID = '$accept'";
    $getpetQuery = mysqli_query($conn, $getpetinfo);

    if($getpetQuery->num_rows > 0){

        $row = $getpetQuery->fetch_assoc();

        $getPetID = $row['adptID'];//This are the Id of pet information
        $status = "Adopted";//This are the status of pet if they already adopted 

        $adptstmt = "UPDATE adoptiontbl SET Status = '$status' WHERE adptID = '$getPetID'";
        if($adptquery = mysqli_query($conn, $adptstmt)){

            $acceptSql = "UPDATE adpt_appointment SET remarks = '$remarks' WHERE adptAID = '$accept'";
            

                if($acceptquery = mysqli_query($conn, $acceptSql)){

                    echo $accept. ", ". $getPetID;

                    date_default_timezone_set('Asia/Manila');
                    $today = date("Y-m-d");

                    $petAdoptedSTMT = $conn->prepare("INSERT INTO petadopted (adptID, adptAID, Date) VALUES (?, ?, ?)");
                    $petAdoptedSTMT->bind_param('iis', $getPetID, $accept, $today);
                    $petAdoptedSTMT->execute();


                    echo "<script> alert('Successfully adopted'); 
                            window.location.href = 'adminpage.php';
                            </script>";
            
                }else{
                    echo "<script> alert('please try again'); 
                    window.location.href = 'adminpage.php';
                    </script>";
                }

        }

    }else{
        //This part is when the ID of pet not found
        echo "<script> alert('please try again'); 
        window.location.href = 'adminpage.php';
        </script>";
    }



}else if(isset($_POST['declinedID'])){

  //This part declined the appointment of user

  $declinedID = $_POST['declinedID'];//Get the Adopt Appointment ID 
  
  $getpetID = "SELECT * FROM adpt_appointment WHERE adptAID = '$declinedID'";
  $getpetQuery = mysqli_query($conn, $getpetID);

  if($getpetQuery->num_rows > 0){

    $remarksDec = "Declined";
    //This part is to get the ID of pet from Adopt Appointment ID
    $decilinedAppointment = "UPDATE adpt_appointment SET remarks = '$remarksDec' WHERE adptAID = '$declinedID'";
    $decilinedAppointmentQuery = mysqli_query($conn, $decilinedAppointment);

    $row = $getpetQuery->fetch_assoc();
    $petID = $row['adptID'];//Pet adopt ID


    $status = "Ongoing";
    $declinedSTMT = "UPDATE adoptiontbl SET Status = '$status' WHERE adptID = '$petID'";
    if($declinedQuery = mysqli_query($conn, $declinedSTMT)){
        
        echo "<script> alert('Declined Appointment'); 
        window.location.href = 'adminpage.php';
        </script>";
    }else{
        
        echo "<script> alert('Failed adopted'); 
        window.location.href = 'adminpage.php';
        </script>";
    }



  }else{
    //This part when the ID of adopt Appointment ID is not found
    echo "<script> alert('Failed adopted'); 
    window.location.href = 'adminpage.php';
    </script>";
  }

}

//This part when accepting the new application of pet
if(isset($_POST['petofficiallist'])){


    $petID = $_POST['petofficiallist'];


    $adoptPetofficial = "UPDATE adoptiontbl SET Status = 'Ongoing' WHERE adptID = '$petID'";
    if($petofficialQuery = mysqli_query($conn, $adoptPetofficial)){
        //when successfully update the Process of application
        echo "<script> alert('Successfully accepted official pet'); 
        window.location.href = 'adminpage.php';
        </script>";
    }else{
        //If failed 
        echo "<script> alert('please try again'); 
        window.location.href = 'adminpage.php';
        </script>";
    }
     


}else if(isset($_POST['declinedpet'])){


    $petID = $_POST['declinedpet'];
    $adoptPetofficial = "DELETE FROM adoptiontbl WHERE adptID = '$petID'";
    if($petofficialQuery = mysqli_query($conn, $adoptPetofficial)){
        echo "<script> alert('Successfully Declined official pet'); 
        window.location.href = 'adminpage.php';
        </script>";
    }else{
        //If failed 
        echo "<script> alert('please try again'); 
        window.location.href = 'adminpage.php';
        </script>";
    }

}




?>