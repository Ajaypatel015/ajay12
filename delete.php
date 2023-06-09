<?php

require_once "connect.php";

$id=$_GET["id"];

$query="DELETE FROM `xyz` WHERE  id=$id";
       $result=mysqli_query($conn,$query);

    if($result){    
        echo " <scrpit>alert ('Data Is Delete')</scrpit>";
    }else{
        echo " EORR.....";
    }

?>