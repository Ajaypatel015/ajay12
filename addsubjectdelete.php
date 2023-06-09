<?php

    require_once "connect.php";

        $id=$_GET["id"];

        $query="DELETE FROM `addsubject` WHERE id=$id ";
        $result=mysqli_query($conn,$query);

        if($result){

            echo " <scrpit>  DATA IS DELETE </scrpit> ";

        }else{

            echo " EORR.... ";

        }

?>