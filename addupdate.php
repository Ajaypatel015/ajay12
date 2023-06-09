<?php
    require_once "connect.php";

    $subject="";
    if(isset($_GET['id'])){
        $id=$_GET['id'];

        $query="SELECT *  FROM `addsubject` WHERE id=$id " or die("QUERY EORR...");
                $result=mysqli_query($conn,$query) or die("RESULT EORR...");

                $data=mysqli_fetch_assoc($result);
                // print_r($data);
    
            $subject=$data['subject'];
    }



    if(isset($_POST['update'])){
        $subject=$_POST['subject'];
        $query="UPDATE `addsubject` SET `subject`= '$subject' WHERE id= $id ";
     
        $result=mysqli_query($conn,$query);
        
        if($result){    
            header("Location:addsubject.php");
            echo " data is Updates";
        }else{
            echo " EORR.....";
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

        <h1>UPDATE SUBJECT</h1>

    </center>

    <div class="row p-3">

        <div class="col">
            <input type="text" name="subject"  value="<?php echo $subject; ?>" class="form-control" placeholder=" enter your subject">
        </div>

        <div class="col">
            <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
            
        </div>

    </div>

    </form>


</body>
</html>