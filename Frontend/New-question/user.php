<?php
include 'config.php';
if (isset($_POST['submit'])) {

    $Category = $_POST['Category'];

    $Question = $_POST['Question'];

    $Answer = $_POST['Answer'];

    $DateCreated = $_POST['DateCreated'];

    $CreatedBy = $_POST['CreatedBy'];

    $sql = "INSERT INTO `questions` (`Category`, `Question`, `Answer`, `DateCreated`, `CreatedBy`) VALUES ('$Category', '$Question', '$Answer', '$DateCreated', '$CreatedBy')";
    // hvis man klikker submit så gemmer den alle dataer 

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "Record inserted successfully.";

    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

    $conn->close();
}

date_default_timezone_set('Europe/Copenhagen');

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

    <title>trivialpursuit</title>
</head>

<body>
    <div>
        <div class="user-box">
            <form method="post">
                <fieldset>

                    <legend>New Question</legend>

                    Category:<br>
                    <select name="Category" class="input">
                        <option value="0">Select...</option>
                        <option value="1">Centrale netværksbegreber</option>
                        <option value="3">CLI-kommandoer</option>
                        <option value="4">IPv6-relateret</option>
                        <option value="5">Specialiserede netværksprotokoller/teknologier</option>
                        <option value="6">TCP/UDP</option>
                        <option value="7">Diverse Netværk</option>
                    </select>

                    <br>
                    <br>

                    Question:<br>

                    <textarea placeholder="Question" class="question-textarea" name="Question"></textarea>

                    <br>

                    Answer:<br>

                    <textarea placeholder="Answer" name="Answer" class="question-textarea"></textarea>

                    <br>



                    <input type="hidden" name="DateCreated" class="input" value="<?php $currentDate = date('Y-m-d');
                    echo $currentDate; ?>" readonly>

                    <br>

                    CreatedBy:<br>

                    <input type="radio" name="CreatedBy" value="1">teacher

                    <input type="radio" name="CreatedBy" value="2">student

                    <br><br>

                    <input class="btn btn-primary" type="submit" name="submit" value="submit">
                    <a class="backbtn" href="display.php">Back</a>

                </fieldset>
            </form>
            <div class="navbar nav-brand">
                <ul>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>