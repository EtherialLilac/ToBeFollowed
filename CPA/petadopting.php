<?php
include 'dbconnection.php';

if(isset($_POST['adptID'])){
    //This part is when the user want to adopting pet
    $adptID = $_POST['adptID'];
    $adptfname = $_POST['adptfname'];
    $adptlname = $_POST['adptlname'];
    $adptaddress = $_POST['adptaddress'];
    $adptoccupation = $_POST['adptoccupation'];
    $adptcpnum = $_POST['adptcpnum'];
    $adptemail = $_POST['adptemail'];
   /* $adptdate = $_POST['adptdate'];
    $adpttime = $_POST['adpttime']; */

    $remarks = "processing";
    if(isset($_FILES['GovID'])){


        $file_data = $_FILES['GovID'];
        $image_size = $file_data['size'];
        $img_err = $file_data['error'];


        if($img_err === 0){

            if($image_size > 268435456) {
                // Image size exceeds the limit
                exit("Image size is too large");
            }
            


            $image_ex = pathinfo($file_data['name'], PATHINFO_EXTENSION);
            $image_ex_lc = strtolower($image_ex);
            $allow_exs = array('jpg', 'jpeg', 'png');
    
            if(in_array($image_ex_lc, $allow_exs)) {
                $image = file_get_contents($file_data['tmp_name']);



                $adpting = "INSERT INTO adpt_appointment (adptID, fname, lname, address, occupation, cpnum, email, remarks, governmentId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = mysqli_prepare($conn, $adpting);
                
                // Check if the prepare statement was successful
                if ($stmt) {
                    // Bind parameters to the statement
                    mysqli_stmt_bind_param($stmt, "issssssss", $adptID, $adptfname, $adptlname, $adptaddress, $adptoccupation, $adptcpnum, $adptemail, $remarks, $image);
                
                    // Execute the statement
                    $result = mysqli_stmt_execute($stmt);
                
                    if ($result) {
                        $status = 'Onprocess';
                        $petupdate = "UPDATE adoptiontbl SET Status = ? WHERE adptID = ?";
                        $stmt2 = mysqli_prepare($conn, $petupdate);
                        mysqli_stmt_bind_param($stmt2, "si", $status, $adptID);
                        mysqli_stmt_execute($stmt2);
            
                        echo "<script>
                            alert('Appointment successfully added!');
                            window.location.href = 'adopt.php';
                        </script>";
                    } else {
            
                        echo "<script>
                                alert('Appointment Failed');
                                window.location.href = 'adopt.php';
                            </script>";
            
                        echo "Error: " . mysqli_error($conn);
                    }
                
                    // Close the statement
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Error in preparing the statement: " . mysqli_error($conn);
                }



    
     
            } else {
                // Invalid image format
                exit("Invalid image format");
            }


        }else{
           
            //Directory pag nag error yung insert ni user babalik sa form


        }




      
        








    }else{
         //Directory pag nag error yung insert ni user babalik sa form
    }




    

}


?>