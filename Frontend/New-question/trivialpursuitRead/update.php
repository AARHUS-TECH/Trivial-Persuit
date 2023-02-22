<?php

include "config.php";


if (isset($_POST['update'])) {

    $questions_Id = $_POST['Id'];

    $Category = $_POST['Category'];

    $Question = $_POST['Question'];

    $Answer = $_POST['Answer'];

    $DateCreated = $_POST['DateCreated'];

    $CreatedBy = $_POST['CreatedBy'];

    $sql = "UPDATE `questions` SET `Category`='$Category', `Question`='$Question',`Answer`='$Answer',`DateCreated`='$DateCreated',`CreatedBy`='$CreatedBy' WHERE `Id`='$questions_Id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "Record updated successfully.";


    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

}



if (isset($_GET['Id'])) {

    $questions_Id = $_GET['Id'];

    $sql = "SELECT * FROM `questions` WHERE `Id`='$questions_Id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $Category = $row['Category'];

            $Question = $row['Question'];

            $Answer = $row['Answer'];

            $DateCreated = $row['DateCreated'];

            $CreatedBy = $row['CreatedBy'];

            $Id = $row['Id'];

        }

        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>edit</title>
            <link rel="stylesheet" href="style.css">
        </head>

        <body>
            <div class="banner">


                <h2>User Update Form</h2>

                <form action="" method="post">

                    <fieldset>

                        <legend>Question information:</legend>

                        Category :

                        <br>

                        <select name=Category>
                            <option value="1">Centrale netværksbegreber</option>
                            <option value="3">CLI-kommandoer</option>
                            <option value="4">IPv6-relateret</option>
                            <option value="5">Specialiserede netværksprotokoller/teknologier</option>
                            <option value="6">TCP/UDP</option>
                            <option value="7">Diverse Netværk</option>
                        </select>



                        <br>

                        Question :¨

                        <br>

                        <input type="hidden" name="Id" value="<?php echo $questions_Id; ?>">

                        <input type="text" name="Question" value="<?php echo $Question; ?>">

                        <br>

                        Answer:<br>

                        <input type="text" name="Answer" value="<?php echo $Answer; ?>">

                        <br>

                        DateCreated:<br>

                        <input type="text" name="DateCreated" value="<?php echo $DateCreated; ?>">

                        <br>

                        CreatedBy:<br>

                        <input type="text" name="CreatedBy" value="<?php echo $CreatedBy; ?>">

                        <br>


                        <input type="submit" value="Update" name="update">

                    </fieldset>

                </form>

                <div class="navbar">
                    <ul>
                        <li><a class="button" href="display.php">BACK</a></li>
                    </ul>
                </div>
            </div>
        </body>

        </html>

    <?php

    } else {

        header('Location: view.php');
    }
}
?>