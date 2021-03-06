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
    <h2 class="centerText"><u>Signup:</u></h2>
    <br>

    <form action="index.php" method="post" class="centerText">
      <div class="form-group">
        <label for="name">Username:</label>
        <input type="text" class="form-control" name="username" id="name" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" name="email" id="email" required>
      </div>
      <button type="submit" class="btn btn-default">Signup</button>
    </form>

    <br>
    <p class="centerText">Already have an account? Login below:</p>
    <div class="centerText">
      <button type="button" class="btn btn-default"
      onclick="window.location.href = 'login.php'">Login</button>
    </div>

  </div>
</body>
</html>
