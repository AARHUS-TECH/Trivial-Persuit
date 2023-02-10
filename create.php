<?php 
include "config.php";

  if (isset($_POST['submit'])) { 
// PHP $_POST is a PHP super global variable which is used to collect form data after submitting an HTML form with method="post". $_POST is also widely used to pass variables.

    $Category = $_POST['Category'];

    $Question = $_POST['Question'];

    $Answer = $_POST['Answer'];

    $DateCreated = $_POST['DateCreated'];

    $CreatedBy = $_POST['CreatedBy'];

    $sql = "INSERT INTO `questions`(`Category`, `Question`, `Answer`, `DateCreated`, `CreatedBy`) VALUES ('$Category','$Question','$Answer','$DateCreated','$CreatedBy')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "New record created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }
 date_default_timezone_set("Europe/Copenhagen");
echo "The current time in Denmark is: " . date("h:i:sa");


?>

<!DOCTYPE html>
<html>
<body>
<h2>Signup Form</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Category:</legend>

    Category:<br>
  <select name=Category >
    <option value="1">ikke network</option>
    <option value="2">ikke network</option>
  </select>
    
    <br>
    <br>

    Question:<br>

    <input type="text" name="Question">

    <br>

    Answer:<br>

    <input type="text" name="Answer">

    <br>

    DateCreated:<br>

    <input type="date" name="DateCreated">

    <br>

    CreatedBy:<br>

    <input type="radio" name="CreatedBy" value="1">teacher

    <input type="radio" name="CreatedBy" value="2">student

    <br><br>

    <input type="submit" name="submit" value="submit">

  </fieldset>

</form>
</body>
</html>