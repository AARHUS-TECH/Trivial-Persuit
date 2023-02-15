<?php

$con=new mysqli('localhost', 'root', '', 'trivialpursuit'); // connect to database

if(!$con){
    die(mysqli_error($con)); 
}


?>