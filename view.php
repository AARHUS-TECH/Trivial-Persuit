<?php 

include "config.php";

$sql = "SELECT category_questions.Name, questions.Question, questions.Answer,  questions.DateCreated, role.Role, questions.Id FROM category_questions, questions, role WHERE questions.Category = category_questions.Id AND role.Id = questions.CreatedBy;";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>View Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <h2>Trivialpursuit</h2>
    <table class="table">
        <thead>
        <tr>
        <th>Category</>
        <th>Question</th>
        <th>Answer</th>
        <th>DateCreated</th>
        <th>CreatedBy</th>
        </tr>
    </thead>
<tbody> 
<?php
 if ($result->num_rows > 0) {
 while ($row = $result->fetch_assoc()) {
 ?>
 <tr>
    <td><?php echo $row['Name']; ?></td>
    <td><?php echo $row['Question']; ?></td>
    <td><?php echo $row['Answer']; ?></td>
    <td><?php echo $row['DateCreated']; ?></td>
    <td><?php echo $row['Role']; ?></td>
    <td><a class="btn btn-info" href="update.php?Id=<?php echo $row['Id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?Id=<?php echo $row['Id']; ?>">Delete</a></td>
 </tr>                       
 <?php
    }
 }
?>                
</tbody>
</table>
</div> 
</body>
</html>



