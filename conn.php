<?php
   $server = "localhost";
   $username = "root";  
   $password = "";
   $dbname = "applicant";

    if(!$conn = mysqli_connect($server, $username, $password, $dbname)){
        die("failed to connect!");
    }
?>