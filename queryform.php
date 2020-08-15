<?php
  
?>

<!-- Currently have to open PHP in a new page, in future can use AJAX to process PHP in the background -->
<!-- Also in future can add alert after form submitted, maybe by adding PHP onto main page where alert would be and adding something like if [Submit] == true -->
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
    <h1 id="thankYou">Thank you for submitting your query!</h1>
  </div>
</body>
</html>
