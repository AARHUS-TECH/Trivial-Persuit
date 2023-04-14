<?php
include 'config.php'; ?>

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
                <li><a href="/Trivial-Pursuit-main/Frontend/Start-Menu/index.html">BACK</a></li>
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

            $sql = "SELECT category_questions.Name, questions.Question, questions.Answer, questions.DateCreated, role.Role,
            questions.Id FROM category_questions, questions, role WHERE questions.Category = category_questions.Id AND role.Id =
                questions.CreatedBy;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td class="tablebody">
                            <?php echo $row['Name']; ?>
                        </td>
                        <td class="tablebody">
                            <?php echo $row['Question']; ?>
                        </td>
                        <td class="tablebody">
                            <?php echo $row['Answer']; ?>
                        </td>
                        <td class="tablebody">
                            <?php echo $row['DateCreated']; ?>
                        </td>
                        <td class="tablebody">
                            <?php echo $row['Role']; ?>
                        </td>
                        <td><a class="btn btn-info" href="update.php?Id=<?php echo $row['Id']; ?>">Edit</a></td>
                        <td><a class="btn btn-danger" href="delete.php?Id=<?php echo $row['Id']; ?>">Delete</a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
        </table>
        <div class="container">
            <a class="btn btn-primary" href="user.php">Add Question +</a>
        </div>
</body>

</html>