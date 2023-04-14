<?php

include "config.php";

if (isset($_GET['Id'])) {

    $questions_Id = $_GET['Id'];

    $sql = "DELETE FROM `questions` WHERE `Id`='$questions_Id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "Record deleted successfully.";

    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

}



?>

<div class="navbar navbar-brand">
    <ul>
        <li><a class="button" href="display.php">BACK</a></li>
    </ul>
</div>