<!-- Use session to store in a variable either "thank you for submitting" or error, and display that variable in the html. -->
<!-- test without session first -->
<?php //declare(strict_types=1); // strict requirement

  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

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

  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO queries (firstname, lastname, email, issue)
  VALUES (?,?,?,?)");
  $stmt->bind_param("ssss", $temp_firstname, $temp_lastname, $temp_email, $temp_issue);

  if ($_SERVER["REQUEST_METHOD"] == "GET") { //unnecessary if statement in my opinion, because this file only triggered when form submitted.
    if (empty($_GET["firstname"])) { //Perhaps unnecessary, but if this if statement triggered then that means hacker has bypassed your front end validation.
      header('HTTP/1.0 403 Forbidden'); //This doesnt redirect to proper error 403 page, SOMETHING TO FIGURE OUT FOR FUTURE!
      die('You are not allowed to access this file.'); //or perhaps we could display error messages on page instead.
    } else {
      $temp_firstname = test_input($_GET["firstname"]);
      $temp_firstname = filter_var($temp_firstname, FILTER_SANITIZE_STRING);
      if (!preg_match("/^[a-zA-Z ]*$/",$temp_firstname)) {
        die("Only letters and white space allowed in firstname");
      }
    }

    if (empty($_GET["lastname"])) {
      header('HTTP/1.0 403 Forbidden');
      die('You are not allowed to access this file.');
    } else {
      $temp_lastname = test_input($_GET["lastname"]);
      $temp_lastname = filter_var($temp_lastname, FILTER_SANITIZE_STRING);
      if (!preg_match("/^[a-zA-Z ]*$/",$temp_lastname)) {
        die("Only letters and white space allowed in lastname");
      }
    }

    if (empty($_GET["email"])) {
      header('HTTP/1.0 403 Forbidden');
      die('You are not allowed to access this file.');
    } else {
      $temp_email = test_input($_GET["email"]);
      $temp_email = filter_var($temp_email, FILTER_SANITIZE_EMAIL);
      if (!filter_var($temp_email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
      }
    }

    if (empty($_GET["comment"])) {
      header('HTTP/1.0 403 Forbidden');
      die('You are not allowed to access this file.');
    } else {
      $temp_issue = test_input($_GET["comment"]);
      $temp_issue = filter_var($temp_issue, FILTER_SANITIZE_STRING);
    }
  }

  // $sql = "INSERT INTO queries (firstname, lastname, email, issue)
  // VALUES ('$temp_firstname','$temp_lastname','$temp_email','$temp_issue')";
  // $conn->query($sql);

  $stmt->execute();

  //Comment out above line ($conn->query($sql);) if want to uncomment below 5 lines.

  // if ($conn->query($sql) === TRUE) {
  //   echo "New record created successfully";
  // } else {
  //   echo "Error: " . $sql . "<br>" . $conn->error;
  // }

  $stmt->close();
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
    <h1 class="centerText">Thank you for submitting your query!</h1>
  </div>
</body>
</html>
