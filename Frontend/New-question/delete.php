<?php

include "config.php";

if (isset($_GET['Id'])) {

    $questions_Id = $_GET['Id'];

    $sql = "DELETE FROM `questions` WHERE `Id`='$questions_Id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        header("Location: display.php");

    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

}



?>