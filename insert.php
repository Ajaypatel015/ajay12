<?php

$tempname = $_FILES['image']['tmp_name'];
$target_folder = "OM";
$target_filename = $_FILES['image']['name'];
$target_filesize = $_FILES['image']['size'];
$target_fileerror = $_FILES['image']['error'];
$target_filetype = $_FILES['image']['type'];

$target_file = $target_folder . "/" . basename($target_filename);

if ($target_fileerror == 0) {

    $file_status = move_uploaded_file($tempname, $target_file);
}

if($target_filesize > 200000){

    $file_status = move_uploaded_file($tempname,$target_file); 

    }

// if($target_filetype == image/jpg){}


require_once "connect.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$bdate = $_POST['bdate'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$number = $_POST['number'];
$subject = $_POST['subject'];
$image = $_FILES['image']['name'];


    $query = "INSERT INTO `xyz` (`fname`,`lname`,`bdate`,`gender`,`email`,`number`,`subject`,`image`) VALUES ('$fname','$lname','$bdate','$gender','$email','$number','$subject','$image')";


$result = mysqli_query($conn, $query);

if ($result) {
    echo " data is saved";
} else {
    echo " EORR.....";
}
