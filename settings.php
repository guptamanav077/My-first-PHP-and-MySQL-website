<?php

session_start();//remember to set username as a session variable

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['chgpass'])) {
    if (empty($_POST["currentpass"])) {
      die('You are not allowed to access this file.');
    } else {
      $currentpass = test_input($_POST["currentpass"]);
      $currentpass = filter_var($currentpass, FILTER_SANITIZE_STRING);
    }
    if (empty($_POST["newpassword"])) {
      die('You are not allowed to access this file.');
    } else {
      $newpassword = test_input($_POST["newpassword"]);
      $newpassword = filter_var($newpassword, FILTER_SANITIZE_STRING);
    }

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
    $stmt = $conn->prepare("SELECT passwordd FROM login WHERE username=?");
    $stmt->bind_param("s", $_SESSION["username"]);

    $stmt->execute();

    $result = $stmt->get_result(); // get the mysqli result

    if ($result->num_rows != 1) {
      echo "<script type='text/javascript'>alert('Error: Username not found!');</script>";
    } else {
      $row = $result->fetch_assoc();
      $dbpassword = $row["passwordd"];
      if ($currentpass !== $dbpassword) {
        echo "<script type='text/javascript'>alert('Password incorrect!');</script>";
      } else {

        // prepare and bind
        $stmt = $conn->prepare("UPDATE login SET passwordd=? WHERE username=?");
        $stmt->bind_param("ss", $newpassword ,$_SESSION["username"]);

        $stmt->execute();

        echo "<script type='text/javascript'>alert('Password successfully changed!');</script>";

        // header("Location: index.php");

      }

    }

    $stmt->close();

    $conn->close();

  } elseif (isset($_POST['delete'])) {
    if (empty($_POST["password"])) {
      die('You are not allowed to access this file.');
    } else {
      $password = test_input($_POST["password"]);
      $password = filter_var($password, FILTER_SANITIZE_STRING);
    }

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
    $stmt = $conn->prepare("SELECT passwordd FROM login WHERE username=?");
    $stmt->bind_param("s", $_SESSION["username"]);

    $stmt->execute();

    $result = $stmt->get_result(); // get the mysqli result

    if ($result->num_rows != 1) {
      echo "<script type='text/javascript'>alert('Error: Username not found!');</script>";
    } else {
      $row = $result->fetch_assoc();
      $dbpassword = $row["passwordd"];
      if ($password !== $dbpassword) {
        echo "<script type='text/javascript'>alert('Password incorrect!');</script>";
      } else {

        // prepare and bind
        $stmt = $conn->prepare("DELETE FROM login WHERE username=?");
        $stmt->bind_param("s", $_SESSION["username"]);

        $stmt->execute();

        echo "<script type='text/javascript'>alert('Account successfully deleted!');</script>";

        session_unset();

        // header("Location: index.php");

      }
    }

  $stmt->close();

  $conn->close();

  }
}
?>

<!DOCTYPE html>
<html lang="en-gb">
<head>
  <title>Settings</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>"> <!-- Additonal stuff to refresh css file and not be cached, can remove later -->
</head>
<body>
  <div id="centerBackground" class="container">
    <h1 class="centerText">Settings</h1>
    <br><br><br><br>
    <h2 class="centerText"><u>Change password:</u></h2>
    <br>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
      method="post" class="centerText">
      <div class="form-group">
        <label for="name">Current Password:</label>
        <input type="password" class="form-control" name="currentpass" id="name" required>
      </div>
      <div class="form-group">
        <label for="password">New Password:</label>
        <input type="password" class="form-control" name="newpassword" id="password" required>
      </div>
      <button type="submit" name="chgpass" class="btn btn-default">Change password</button>
    </form>

    <br>
    <h2 class="centerText"><u>Delete account:</u></h2>
    <br>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
      method="post" class="centerText">
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      <button type="submit" name="delete" class="btn btn-default">Delete account</button>
    </form>

  </div>
</body>
</html>
