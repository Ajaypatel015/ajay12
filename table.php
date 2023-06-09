<?php

require_once "connect.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>

</head>

<body>

    <center>

    <button class="btn btn-primary"><a href="form.php"> ADD NEW </a> </button>


        <table style="width:900px" class="table">

            <thead class="table table-primary">

                <tr>

                    <th scope="col">#</th>
                    <th scope="col">Fnmae</th>
                    <th scope="col">Last</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Image</th>
                    <th scope="col" colspan="2">actions</th>

                </tr>

            </thead>

            <?php

                // $query= "SELECT * FROM `xyz` " or die("QUERY EEOR....");
               $query= "SELECT addsubject.subject,xyz.id,xyz.fname,xyz.lname,xyz.bdate,xyz.gender,
                xyz.image,xyz.email,xyz.number from xyz join addsubject
                on xyz.subject=addsubject.id";

                $result = mysqli_query($conn,$query) or die("RESULT  EEOR.....");

                if(mysqli_num_rows($result) > 0){
            ?>
            <tbody>
                <?php
                    $sr_no=1;
                    while($row=mysqli_fetch_assoc($result)){

                ?>

                <tr>
                    
                    <!-- <th scope="row">1</th> -->
                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['bdate']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['number']; ?></td>
                    <td><?php echo $row['subject']; ?></td>
                    <td>
                        <img src="om/<?php echo $row['image']; ?>" alt="" height="100px"><?php echo $row['image']; ?>
                      </td>
                    <td>

                        <button class="btn btn-success"><a href="update.php?id=<?php echo $row["id"]; ?>">EDIT </a></button>

                    </td>
                    <td>

                        <a class="btn btn-danger" href="delete.php?id=<?php echo $row["id"]; ?>"  onclick=' return om();'>Delete</a>

                    </td>



                </tr>

                <?php
                
                        $sr_no++;

                    }
                }else{
                
                ?>

                    <tb>

                        NO DATA FOUND

                    </tb>

                <?php
                
                }

                ?>

            </tbody>

        </table>


    </center>
                <script>

                    function om(){  

                        return confirm('are you sure you want to delete');

                    }
                    
                </script>

</body>

</html>