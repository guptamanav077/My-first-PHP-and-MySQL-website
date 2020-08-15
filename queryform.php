<!-- Use session to store in a variable either "thank you for submitting" or error, and display that variable in the html. -->

<?php
  $servername = "localhost";
  $username = "root";
  $password = "password";
  $dbname = "queries";

  //Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  //Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $temp_firstname = $_GET["firstname"];
  $temp_lastname = $_GET["lastname"];
  $temp_email = $_GET["email"];
  $temp_issue = $_GET["comment"];

  $sql = "INSERT INTO queries (firstname, lastname, email, issue)
  VALUES ('$temp_firstname','$temp_lastname','$temp_email','$temp_issue')";

  $conn->query($sql);

  //Comment out above line ($conn->query($sql);) if want to uncomment below 5 lines.

  // if ($conn->query($sql) === TRUE) {
  //   echo "New record created successfully";
  // } else {
  //   echo "Error: " . $sql . "<br>" . $conn->error;
  // }

  $conn->close();
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
