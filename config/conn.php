<?php
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "th-league";

    $conn = mysqli_connect($host,$user,$pwd,$db);

    if(!$conn){
        echo "Error to connecting database";
    }
?>
