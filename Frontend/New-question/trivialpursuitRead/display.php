<?php
include '../Connection/config.php'; ?>

$sql = "SELECT category_questions.Name, questions.Question, questions.Answer, questions.DateCreated, role.Role,
questions.Id FROM category_questions, questions, role WHERE questions.Category = category_questions.Id AND role.Id =
questions.CreatedBy;";

$result = $conn->query($sql);

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <title>trivialpursuit</title>
</head>

<body>
    <div class="banner">
        <div class="navbar">
            <ul>
                <li><a href="#">BACK</a></li>
            </ul>
        </div>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th class="tablehead" scope="col">Category</th>
                        <th class="tablehead" scope="col">Question</th>
                        <th class="tablehead" scope="col">Answer</th>
                        <th class="tablehead" scope="col">Date Created</th>
                        <th class="tablehead" scope="col">Created By</th>
                    </tr>
                </thead>
        </div>
        <tbody>
            <?php

            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) { // while loop
                    $Category = $row['Category'];
                    $Question = $row['Question'];
                    $Answer = $row['Answer'];
                    $DateCreated = $row['DateCreated'];
                    $CreatedBy = $row['CreatedBy'];
                    echo '<tr>
                    <th class="tablebody" scope="row">' . $Category . '</th>
                    <th class="tablebody" scope="row">' . $Question . '</th>
                    <th class="tablebody" scope="row">' . $Answer . '</th>
                    <th class="tablebody" scope="row">' . $DateCreated . '</th>
                    <th class="tablebody" scope="row">' . $CreatedBy . '</th>
                    </tr>';
                }
            }
            ?>
        </tbody>
        </table>
    </div>
</body>

</html>