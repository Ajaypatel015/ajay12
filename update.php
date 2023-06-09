<?php

require_once "connect.php";

if (isset($_POST['update'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $bdate = $_POST['bdate'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject = $_POST['subject'];
    $id = $_GET['id'];


    if ($_FILES['image']['error'] == 0) {

        $image = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $target_folder = "OM";
        $target_filename = $_FILES['image']['name'];
        // $target_filesize = $_FILES['image']['size'];
        $target_fileerror = $_FILES['image']['error'];
        // $target_filetype = $_FILES['image']['type'];

        $target_file = $target_folder . "/" . basename($target_filename);

        if ($target_fileerror == 0) {
            $file_status = move_uploaded_file($tempname, $target_file);

            if ($file_status) {


                //delete old image
                $old_image = $_POST['old_image'];

                $deletestatus = unlink("om/$old_image");


                //delete old image

                //         $query = "UPDATE `xyz` SET `fname`='$fname',`lname`='$lname',`bdate`='$bdate',`gender`='$gender',`email`='$email',`number`='$number', `subject`= '$subject',`image`='$image' WHERE `id`= '$id' ";

                //         $result = mysqli_query($conn, $query);

                //         if ($result == 1) {
                //             header("Location:table.php");
                //             // echo " data is Updates";
                //         } else {
                //             echo " EORR.....";
                //         }

                //     }

                // }

                if ($deletestatus) {

                    // update data
                    $query = "UPDATE `xyz` SET `fname`='$fname',`lname`='$lname',`bdate`='$bdate',`gender`='$gender',`email`='$email',`number`='$number', `subject`= '$subject',`image`='$image' WHERE `id`= '$id' ";

                    $result = mysqli_query($conn, $query);

                    if ($result == 1) {
                        header("Location:table.php");
                        //                 // echo " data is Updates";
                    } else {
                        echo " EORR.....";
                    }
                    //             //update data

                } else {

                    echo "Old image delete error";
                }
            } else {

                echo "Image Upload error";
            }
        }
    } else {
        $query = "UPDATE `xyz` SET `fname`='$fname',`lname`='$lname',`bdate`='$bdate',`gender`='$gender',`email`='$email',`number`='$number', `subject`= '$subject' WHERE `id`= '$id' ";
        $result = mysqli_query($conn, $query);
        if ($result == 1) {
            header("Location:table.php");
            // echo " data is Updates";
        } else {
            echo " EORR.....";
        }
    }
}

// print_r($data);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css">

</head>

<body>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT *  FROM `xyz` WHERE `id`='$id' ";
        $result = mysqli_query($conn, $query) or die("RESULT EORR...");

        while ($row = mysqli_fetch_assoc(($result))) {

    ?>

            <div class="wrapper rounded bg-white">

                <div class="h3">Update Form</div>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form">
                        <div class="col-md-6 mt-md-0 mt-3">
                            <label>First Name</label>
                            <input type="text" name="fname" value="<?php echo $row['fname']; ?>" id="fname" class="form-control" required>
                        </div>
                        <div class="col-md-6 mt-md-0 mt-3">
                            <label>Last Name</label>
                            <input type="text" name="lname" value="<?php echo $row['lname']; ?>" class="form-control" required>
                        </div>


                        <div class="col-md-6 mt-md-0 mt-3">
                            <label>Birthday</label>
                            <input type="date" name="bdate" value="<?php echo $row['bdate']; ?>" class="form-control" required>
                        </div>


                        <div class="col-md-6 mt-md-0 mt-3">
                            <label>Gender</label>

                            <?php

                            $gendervalue = $row['gender'];

                            $gval = "male";

                            if ($gendervalue == "female") {

                                $gval = "female";
                            }

                            ?>

                            <div class="d-flex align-items-center mt-2">
                                <label class="option">
                                    <input type="radio" <?php if ($gval == "male") {
                                                            echo "checked";
                                                        } ?> name="gender" value="male">Male
                                    <span class="checkmark"></span>
                                </label>
                                <label class="option ms-4">
                                    <input type="radio" <?php if ($gval == "female") {
                                                            echo "checked";
                                                        } ?> name="gender" value="female">Female
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>


                        <div class="col-md-6 mt-md-0 mt-3">
                            <label>Email</label>
                            <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6 mt-md-0 mt-3">
                            <label>Phone Number</label>
                            <input type="tel" name="number" value="<?php echo $row['number']; ?>" class="form-control" required>
                        </div>

                        <div class=" my-md-1 my-3" style="width: 400px;">
                            <label>Subject</label>
                            <select name="subject" value="" id="sub" required>

                                <option value="" selected>Choose Option</option>

                                <?php
                                $query = "SELECT *  FROM `addsubject` " or die("QUERY EORR...");
                                $result = mysqli_query($conn, $query) or die("RESULT EORR...");

                                if (mysqli_fetch_row($result) > 1) {

                                    while ($row1 = mysqli_fetch_assoc($result)) {

                                ?>
                                        <option value="<?php echo $row1['id'] ?>"><?php echo $row1['subject']; ?></option>

                                <?php

                                    }
                                }

                                ?>

                                <!-- <option value=""> </option>
                            <option value="A/C">A/C</option>
                            <option value="Sata">Stat</option>
                            <option value="B.A">B.A</option>
                            <option value="Eco">Eco</option> -->
                            </select>
                        </div>

                        Uplod Image
                        <input type="file" name="image">
                        <input type="hidden" name="old_image" value="<?php echo $row['image']; ?>">

                        <br>
                        <br>
                        <?php echo $row['image']; ?>
                        <br>
                        <img src="om/<?php echo $row['image']; ?>" alt="" height="100px">
                        <br>



                        <br>
                        <button type="submit" name="update" class="btn btn-primary btn-block">Update</button>
                    </div>
                </form>

                <?php

                ?>


                <script>
                    var sub = document.getElementById("sub");
                    sub.value = "<?php echo $row['subject'] ?>";
                </script>

        <?php


        }
    }
        ?>

</body>

</html>