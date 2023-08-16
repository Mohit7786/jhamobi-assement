<?php 

    $con = mysqli_connect("localhost","root","","jhamobitech");
    if(mysqli_connect_errno()){
        echo "Failed to connect to mysql database". mysqli_connect_error();
    }
?>