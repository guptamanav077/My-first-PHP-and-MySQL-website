<?php

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $fileContent = test_input($_GET["fileText"]);
    $fileContent = filter_var($fileContent, FILTER_SANITIZE_STRING);
  }

  if (isset($_GET['overwrite'])) {
    $myfile = fopen("file.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $fileContent);
    fclose($myfile);
  } elseif (isset($_GET['append'])) {
    $myfile = fopen("file.txt", "a") or die("Unable to open file!");
    $fileContent = "\n" . $fileContent;
    fwrite($myfile, $fileContent);
    fclose($myfile);
  }

?>


<!DOCTYPE html>
<html lang="en-gb">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>"> <!-- Additonal stuff to refresh css file and not be cached, can remove later -->
</head>
<body>
  <div id="centerBackground" class="container middle">
    <h1 class="centerText">Thank you!</h1>
  </div>
</body>
</html>
