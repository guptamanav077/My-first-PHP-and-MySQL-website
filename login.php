<?php

session_start();//remember to set username as a session variable

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    die('You are not allowed to access this file.');
  } else {
    $username = test_input($_POST["username"]);
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $_SESSION["username"] = $username;
  }
  if (empty($_POST["password"])) {
    die('You are not allowed to access this file.');
  } else {
    $password = test_input($_POST["password"]);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
  }
  // if (empty($_POST["email"])) {
  //   die('You are not allowed to access this file.');
  // } else {
  //   $email = test_input($_POST["email"]);
  //   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  //   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  //     die("Invalid email format");
  //   }
  // }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $servername = "localhost";
  $serverusername = "root";
  $serverpassword = "password";
  $dbname = "queries";

  //Create connection
  $conn = new mysqli($servername, $serverusername, $serverpassword, $dbname);
  //Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // prepare and bind
  $stmt = $conn->prepare("SELECT username, passwordd FROM login WHERE username=?");
  $stmt->bind_param("s", $username);

  $stmt->execute();

  $result = $stmt->get_result(); // get the mysqli result

  if ($result->num_rows != 1) {
    echo "<script type='text/javascript'>alert('Error: Username not found!');</script>";
  } else {
    $row = $result->fetch_assoc();
    $dbusername = $row["username"];
    $dbpassword = $row["passwordd"];
    if ($username === $dbusername) {
      if ($password === $dbpassword) {
        header("Location: index.php");
      }
    }
    echo "<script type='text/javascript'>alert('Password incorrect!');</script>";
  }

  $stmt->close();


  $conn->close();

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
  <div id="centerBackground" class="container">
    <h1 class="centerText">WELCOME!</h1>
    <br><br><br><br>
    <h2 class="centerText"><u>Login:</u></h2>
    <br>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
      method="post" class="centerText">
      <div class="form-group">
        <label for="name">Username:</label>
        <input type="text" class="form-control" name="username" id="name" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      <button type="submit" class="btn btn-default">Login</button>
    </form>

    <br>
    <p class="centerText">Don't have an account? Sign up:</p>
    <div class="centerText">
      <button type="button" class="btn btn-default"
      onclick="window.location.href = 'signup.php'">Sign Up</button>
    </div>

  </div>
</body>
</html>
