<?php

require_once "connect.php";
if(isset($_POST['save'])){

    $day=$_POST['day'];

    $query="INSERT INTO `addsubject`(`subject`) VALUES('$day')";
    $result=mysqli_query($conn,$query);

    if($result){

        // echo "data is svaed";
        header("Location:form.php");

    }else{

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 

</head>

<body>

    <form method="POST" action="">

    <center>

        <h1>ADD SUBJECT</h1>

    </center>

    <div class="row p-3">

        <div class="col">
            <input type="text" name="day" class="form-control" placeholder=" enter your subject">
        </div>

        <div class="col">
            <button type="submit" name="save" class="btn btn-primary">Submit</button>
        </div>

    </div>

    </form>

    <table style="width:600px" class="table">
        <thead class="table table-primary">
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Subject</th>
                <th scope="col" colspan="2">Actions</th>
            </tr>
        </thead>

            <?php

                $query="SELECT *  FROM `addsubject` " or die("QUERY EORR...");
                $result=mysqli_query($conn,$query) or die("RESULT EORR...");

                if(mysqli_fetch_row($result) > 1 ){

            ?>

        <tbody>
        
            <?php

                $sr_no=1;

                while($row=mysqli_fetch_assoc($result)){

            ?>

            <tr>

                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row['subject']; ?></td>
                    <td>

                        <button class="btn btn-success"><a href="addupdate.php?id=<?php echo $row["id"] ?>">EDIT</a></button>

                    </td>

                    <td>

                         <a class="btn btn-danger" href="addsubjectdelete.php?id=<?php echo $row["id"] ?>" onclick=" return moon(); " > DELETE </a>

                    </td>

            </tr>

            <?php

                    $sr_no++;

                }

            }else{

            ?>

                <td> NO DATA FOUND</td>

           <?php
           
            }

           ?>

        </tbody>
    </table>

    <script>

            function moon(){  
                return confirm('are you sure you want to delete add subject data');
            }

    </script>


</body>

</html>