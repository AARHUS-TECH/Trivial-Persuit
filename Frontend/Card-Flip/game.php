<?php
include('../New-question/trivialpursuitRead/config.php');
$sql = "SELECT * FROM category_questions, questions, 
        role WHERE questions.Category = category_questions.Id
        AND role.Id = questions.CreatedBy
        ORDER BY category_questions.Id,
        rand();";
$result = $conn->query($sql);

$Questions = array();

while ($Question = $result->fetch_assoc()) {
  $Category = $Question['Category'];
  $isDuplicate = false;

  // Check if the category is already present in the $Questions array
  foreach ($Questions as $q) {
    if ($q['Category'] == $Category) {
      $isDuplicate = true;
      break;
    }
  }

  // If the category is not a duplicate, add the question to the $Questions array
  if (!$isDuplicate) {
    $Questions[] = $Question;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trivial Pursuit</title>
  <link rel="stylesheet" href="cardflip.css" />
</head>

<body>
  <div class="banner">
    <div class="navbar">
      <ul>
        <li><a href="../Start-Menu/index.html">BACK</a></li>
      </ul>
    </div>
    <div class="card">
      <div class="card__inner">
        <div class="card__face card__face--front">
          <div class="card__content">
            <div class="card__header">
              <h2>Questions</h2>
              <p>Click "Here" to flip</p>
            </div>
            <div class="card__body">
              <table>
                <tr>
                  <th>Genre</th>
                  <th>Question</th>
                </tr>
                <?php

                foreach ($Questions as $Question) { ?>
                  <tr>
                    <td>
                      <!--make so the same category does not appear twice -->
                      <?php echo $Question['Name']; ?>


                    </td>
                    <td>
                      <?php echo $Question['Question']; ?>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
        <div class="card__face card__face--back">
          <div class="card__content">
            <div class="card__header">
              <h2>Answers</h2>
              <p>Click "Here" to flip</p>
            </div>
            <div class="card__body">
              <table>
                <tr>
                  <th>Genre</th>
                  <th>Answers</th>
                </tr>
                <?php foreach ($Questions as $Question) { ?>
                  <tr>
                    <td>
                      <?php echo $Question['Name']; ?>
                    </td>
                    <td>
                      <?php echo $Question['Answer']; ?>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content">

      <a href='game.php'><button type="button"><span></span>NEW GAME</button></a>
    </div>
    <script src="cardflip.js"></script>
</body>

</html>