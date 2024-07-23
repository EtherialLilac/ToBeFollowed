<?php
require '../dbconnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Logout button -->
<div class="container mt-3">
    <a href="../index.html" class="btn btn-secondary mt-3">Logout</a>
</div>

<!-- Appointment List -->
<div class="container mt-5">
    <h2>Appointment List</h2>
    <table class="table table-striped" id="appointmentlist1">
        <thead>
            <th>Pet name</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Address</th>
            <th>Occupation</th>
            <th>Phone no.</th>
            <th>Email</th>
            <th>Option</th>
            <th>govID</th>
        </thead>
        <tbody style="overflow-y: auto; max-height: 200px;">
            <?php
            $adptAppointment = "SELECT adptApp.*, petinfo.name FROM adpt_appointment AS adptApp RIGHT JOIN adoptiontbl AS petinfo ON adptApp.adptID = petinfo.adptID WHERE adptApp.adptID AND adptApp.remarks = 'processing'";
            $adptQuery = mysqli_query($conn, $adptAppointment);

            while ($row = $adptQuery->fetch_assoc()) {
                ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['fname'] ?></td>
                    <td><?= $row['lname'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td><?= $row['occupation'] ?></td>
                    <td><?= $row['cpnum'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td>
                        <form action="appointmentact.php" method="post">
                            <input type="hidden" name="acceptID" value="<?= $row['adptAID'] ?>">
                            <button type="submit" class="btn btn-success" name="accept">Accept</button>
                        </form>
                        <form action="appointmentact.php" method="post">
                            <input type="hidden" name="declinedID" value="<?= $row['adptAID'] ?>">
                            <button type="submit" class="btn btn-danger" name="declined">Declined</button>
                        </form>
                    </td>
                    <td>
                        <?= '<img src="data:image/jpg;charset=utf8;base64,' . base64_encode($row['governmentId']) . '" class="card-img-top rounded img-fluid" style="width: 100%; height: 25%;" ' ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Gmail button -->
<div class="container mt-3">
    <a href="mailto: " class="btn btn-primary">Compose Email to Gmail</a>
</div>

<!-- Pet List for Adoption -->
<div class="container mt-5">
    <h2>Pet List for Adoption</h2>
    <table class="table table-striped" id="appointmentlist2">
        <thead>
            <th>name</th>
            <th>Address</th>
            <th>Phone no</th>
            <th>Tel no.</th>
            <th>Occupation</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Type</th>
            <th>Description</th>
            <th>Pet Image</th>
            <th>Status</th>
        </thead>
        <tbody style="overflow-y: auto; max-height: 200px;">
            <?php
            $adptAppointment = "SELECT * FROM adoptiontbl WHERE Status != 'Processing Application'";
            $adptQuery = mysqli_query($conn, $adptAppointment);

            while($row1 = $adptQuery->fetch_assoc()){
            ?>
                <tr>
                    <td><?= $row1['name'] ?></td>
                    <td><?= $row1['address'] ?></td>
                    <td><?= $row1['phoneno'] ?></td>
                    <td><?= $row1['Telno'] ?></td>
                    <td><?= $row1['occupation'] ?></td>
                    <td><?= $row1['age'] ?></td>
                    <td><?= $row1['Gender'] ?></td>
                    <td><?= $row1['type'] ?></td>
                    <td><?= $row1['msgDes'] ?></td>
                    <td><?php echo '<img src="data:image/jpg;charset=utf8;base64,' . base64_encode($row1['petImg']) . '" class="card-img-top rounded img-fluid" style="width: 100%; height: 50%;" alt="Sample Image"'; ?></td>
                    <td><?= $row1['Status'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- List of Adopted Pets -->
<div class="container mt-5">
    <h2>List of Adopted Pets</h2>
    <table class="table table-striped" id="appointmentlist3">
        <thead>
            <th>New owner</th>
            <th>Pet name</th>
            <th>Address</th>
            <th>Phone no.</th>
            <th>Occupation</th>
            <th>Email</th>
            <th>Pet Image</th>
            <th>Date</th>
        </thead>
        <tbody style="overflow-y: auto; max-height: 200px;">
            <?php
            $adptAppointment = "SELECT petAdopt.Date, petinfo.name, petinfo.petImg, adptapp.fname, adptapp.lname, adptapp.address, adptapp.occupation, adptapp.cpnum, adptapp.email
                FROM petadopted AS petAdopt RIGHT JOIN adoptiontbl AS petinfo ON petAdopt.adptID = petinfo.adptID LEFT JOIN adpt_appointment AS adptapp ON adptapp.adptID =  petinfo.adptID
                WHERE adptapp.remarks = 'Accepted Adopt' AND petinfo.Status = 'Adopted'";
            $adptQuery = mysqli_query($conn, $adptAppointment);

            while($row1 = $adptQuery->fetch_assoc()){
            ?>
                <tr>
                    <td><?= $row1['lname']. ", ". $row1['fname'] ?></td>
                    <td><?= $row1['name'] ?></td>
                    <td><?= $row1['address'] ?></td>
                    <td><?= $row1['cpnum'] ?></td>
                    <td><?= $row1['occupation'] ?></td>
                    <td><?= $row1['email'] ?></td>
                    <td><?php echo '<img src="data:image/jpg;charset=utf8;base64,' . base64_encode($row1['petImg']) . '" class="card-img-top rounded img-fluid" style="width: 100%; height: 100px;" alt="Sample Image"'; ?></td>
                    <td><?= $row1['Date'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- List of Pet Applicants -->
<div class="container mt-5">
    <h2>List of Pet Applicants</h2>
    <table class="table table-striped" id="appointmentlist4">
        <thead>
            <th>Pet name</th>
            <th>Address</th>
            <th>phone no.</th>
            <th>Tel no.</th>
            <th>occupation</th>
            <th>age</th>
            <th>Gender</th>
            <th>type</th>
            <th>Description</th>
            <th>Pet Image</th>
            <th>Option</th>
        </thead>
        <tbody style="overflow-y: auto; max-height: 200px;">
            <?php
            $adptAppointment = "SELECT * FROM adoptiontbl WHERE Status = 'Processing Application'";
            $adptQuery = mysqli_query($conn, $adptAppointment);

            while($row2 = $adptQuery->fetch_assoc()){
            ?>
                <tr>
                    <td><?= $row2['name'] ?></td>
                    <td><?= $row2['address'] ?></td>
                    <td><?= $row2['phoneno'] ?></td>
                    <td><?= $row2['Telno'] ?></td>
                    <td><?= $row2['occupation'] ?></td>
                    <td><?= $row2['age'] ?></td>
                    <td><?= $row2['Gender'] ?></td>
                    <td><?= $row2['type'] ?></td>
                    <td><?= $row2['msgDes'] ?></td>
                    <td><?php echo '<img src="data:image/jpg;charset=utf8;base64,' . base64_encode($row2['petImg']) . '" class="card-img-top rounded img-fluid" style="width: 100%; height: 100px;" alt="Sample Image"'; ?></td>
                    <td>
                        <form action="appointmentact.php" method="post">
                            <input type="hidden" name="petofficiallist" id="AppID" value="<?= $row2['adptID'] ?>">
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                        <form action="appointmentact.php" method="post">
                            <input type="hidden" name="declinedpet" id="AppID" value="<?= $row2['adptID'] ?>">
                            <button type="submit" class="btn btn-danger">Declined</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
