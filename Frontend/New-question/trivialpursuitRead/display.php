<?php
include 'connect.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

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
                    <th class="test" scope="col">Question</th>
                    <th class="test" scope="col">Answer</th>
                </tr>
            </thead>

    </div>
            <tbody>
            <?php
            $sql="SELECT * FROM trivialpursuit";
            $result=mysqli_query($con,$sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){ // while loop
                    $Question=$row['Question'];
                    $Answer=$row['Answer'];
                    echo '<tr>
                    <th class="test2" scope="row">'.$Question.'</th>
                    <th class="test2">'.$Answer.'</th>
                    </tr>';
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>