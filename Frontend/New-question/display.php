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

        </div>
        <div class="display-box">

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
                <tbody>
                    <?php
                    $sql = "SELECT category_questions.Name, questions.Question, questions.Answer, questions.DateCreated, role.Role, questions.Id FROM category_questions, questions, role WHERE questions.Category = category_questions.Id AND role.Id = questions.CreatedBy;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td>
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
                                <td>
                                    <a class="btn btn-info" href="update.php?Id=<?php echo $row['Id']; ?>">Edit</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="delete.php?Id=<?php echo $row['Id']; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php
                $rowCount = $result->num_rows;
                $pageSize = 6; // Number of rows per page
                $totalPages = ceil($rowCount / $pageSize); // Calculate total number of pages
                
                // Generate circles for pagination
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<div class="circle" onclick="updateTableVisibility(' . $i . ')"></div>';
                }
                ?>
            </div>
            <div class="addQuestion">
                <a class="btn btn-primary backbtn" href="user.php">Add Question +</a>
                <a class="backbtn" href="../Start-Menu/index.html">Back</a>
            </div>
        </div>

    </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const tableRows = document.querySelectorAll(".table tbody tr");
            const circles = document.querySelectorAll(".circle");
            const rowsPerPage = 6; // Number of rows to display per page

            // Function to update the table rows visibility based on the active circle
            function updateTableVisibility(activeCircle) {
                const startIndex = (activeCircle - 1) * rowsPerPage;
                const endIndex = startIndex + rowsPerPage;

                // Hide all rows initially
                tableRows.forEach(function (row) {
                    row.style.display = "none";
                });

                // Show rows within the visible range
                tableRows.forEach(function (row, index) {
                    if (index >= startIndex && index < endIndex) {
                        row.style.display = "";
                    }
                });
            }

            // Attach click event listeners to the circles
            circles.forEach(function (circle, index) {
                circle.addEventListener("click", function () {
                    // Update the active circle and table visibility
                    circles.forEach(function (c) {
                        c.classList.remove("active");
                    });
                    circle.classList.add("active");
                    updateTableVisibility(index + 1);
                });
            });

            // Activate the first circle and update the table visibility initially
            circles[0].classList.add("active");
            updateTableVisibility(1);
        });
    </script>
</body>

</html>