<?php
include "vendor/autoload.php";
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->local->students;
$result = $collection->find();
//foreach ($result as $student) {
    //var_dump($student);
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <h1 style="color:white;"><center>Student Records</center></h1>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">   
<body style="background-color:#80ced6;">
    <a href="/add.php" class="btn btn-light btn-lg">Add</a>
<div class="container-fluid p-3 mb-2">
    <h1 class="display-5"></h1>
        <table class="table table-striped table-bordered table-light">
            <thead>
                <tr>
                    <th>Student Id</th>
                    <th>Name</th>						
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>College</th>
                    <th>Contact Number</th>
                    <th>Emergency Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($result as $student){
                ?>
                <tr class="table-active">
                    <th scope = "row"><?php echo $student['studentId']?></td>
                    <td><?php echo $student['_id']?></th>
                    <td><?php echo $student['firstName']?> <?php echo $student['lastName']?></td>
                    <td><?php echo $student['birthdate']?></td>
                    <td><?php echo $student['address']?></td>
                    <td><?php echo $student['program']?></td>
                    <td><?php echo $student['contactNumber']?></td>
                    <td><?php echo $student['emergencyContact']?></td>
                    <td>
                        <a href="/edit.php" class="btn btn-Dark">Update</a>
                        <a href="/delete.php" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</body>
</html>