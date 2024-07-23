<?php
include 'dbconnection.php';

$pname = $_POST['nameinput'];
$paddress = $_POST['addressinput'];
$pnumber = $_POST['cellphoneinput'];
$ptelno = $_POST['telinput'];
$poccupation = $_POST['occupationinput'];
$page = $_POST['ageinput'];
$pgender = $_POST['genderinput'];
$ptype = $_POST['typeinput'];
$pdes = $_POST['reasoninput'];

if(isset($_FILES['imageInput'])){
    $file_data = $_FILES['imageInput'];
    $image_size = $file_data['size'];
    $img_err = $file_data['error'];

    if($img_err === 0){
        if($image_size > 268435456) {
            // Image size exceeds the limit
            exit("Image size is too large");
        }

        // Check if the file is an actual image
        $img_info = getimagesize($file_data['tmp_name']);
        if(!$img_info) {
            exit("Invalid image file");
        }

        $image_ex = pathinfo($file_data['name'], PATHINFO_EXTENSION);
        $image_ex_lc = strtolower($image_ex);
        $allow_exs = array('jpg', 'jpeg', 'png');

        if(in_array($image_ex_lc, $allow_exs)) {
            $image = file_get_contents($file_data['tmp_name']);

            // Use prepared statements to prevent SQL injection
            $sqladpt = "INSERT INTO adoptiontbl (name, address, phoneno, Telno, occupation, age, Gender, type, msgDes, petImg, Status)
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Processing Application')";
            $stmt = mysqli_prepare($conn, $sqladpt);

            mysqli_stmt_bind_param($stmt, "ssssssssss", $pname, $paddress, $pnumber, $ptelno, $poccupation, $page, $pgender, $ptype, $pdes, $image);
            
            if(mysqli_stmt_execute($stmt)){
                echo "<script> alert('Successfully uploaded');
                        window.location.href = 'adopt.php';
                      </script>";
            }else{

                echo "<script> alert('Try again');
                window.location.href = 'adopt.php';
              </script>";

                echo "Failed: " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        } else {
            // Invalid image format
            exit("Invalid image format");
        }
    } else {
        // Image upload error
        exit("Image upload error");
    }
}
?>
