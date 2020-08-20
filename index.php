<?php

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
    }
    if (empty($_POST["password"])) {
      die('You are not allowed to access this file.');
    } else {
      $password = test_input($_POST["password"]);
    }
    if (empty($_POST["email"])) {
      die('You are not allowed to access this file.');
    } else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
      }
    }
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
  <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
  <script src="my_jquery_functions.js"></script>
  <script>
  function readFile() {
    document.getElementById("readText").innerHTML =
    `<?php
    $myfile = fopen("file.txt", "r") or die("Unable to open file!");
    // Output one line until end-of-file
    while(!feof($myfile)) {
     echo fgets($myfile) . "<br>";
    }
    fclose($myfile);
    ?>`;
  }
  </script>
</head>
<body onload="setTimeout(popUp), 1000" id="body">
  <header id="header" class="container middle">
    <div class="jumbotron">
      <h1>My First Bootstrap Page<small> By Manav Gupta</small></h1>
      <h1>Next time, have one div for entire page that has container class, and then put things inside that div</h1>
      <h1 id="txt"></h1>
      <h2>
        <?php
          $d1=strtotime("February 22");
          $d2=ceil(($d1-time())/60/60/24);
          $d3=ceil(($d1-time()+365*60*60*24)/60/60/24);
          echo "There are " . $d2 . " or " . $d3 . " days until my birthday!";
        ?>
      </h2>
    </div>
  </header>

  <?php include 'navbar.php';?>

  <main class="container middle" id="main">
    <blockquote><p>"People who are depressed use work as a distraction from their depression. Without work, there is no distraction, and when there is no distraction, they suicide."</p>
    <footer>Someone</footer>
    </blockquote>
    <h2>Use a bookmark page with a side nav bar with scrollspy for projects page in website</h2>
    <h1>could create a pretty cool web game using JavaScript and jQuery</h1>
    <pre>Possible things to add in:

      PHP:
        Database system for storing products(inc price)? to try out other SQL commands.
        EXPLORING SQL FURTHER WITH LOGIN SYSTEM(New repository?)
        Login Form, do all PHP on this page itself
        Forms!!!
        Add automatic copyright(check start of PHP Notes file)
        Dates???
        Include and require, to reuse multiple files.
        e.g. standard footer files, standard menu files.
        reading/modifying/creating files?
        File uploads
        Cookies!!!
        Sessions
        Filtering(validating) (external) data
        Filters(advanced)
        Callback functions?
        JSON?
        Throw and catch exceptions

        Login Form, do all PHP on this page itself, maybe cookies,sessions,display username is corner?
        //Database(to store information)
        Connect to database(and closing connections)
        Create a database
        Create table(with optional parameters for columns and primary key column)
        Insert Data
        Get last ID, insert multiple
        Prepared Statements
        Select data from database(login system)
        WHERE(login system), ORDER BY, LIKE, IN, BETWEEN, aliases, JOINS, FOREIGN KEY, INDEX, DATES, VIEW
        UPDATE(login system), DELETE data (login system)
        LIMIT clause

      change background colour on click of mouse colour selected randomly from set of colours.
      some sort of pop-up when page has loaded.
      when mouse moves over element
      when input field(forms) changes(field not filled and another field selected)
      when form submitted
      key pressed?
      when someone leaves the page(onunload)
      attach events to window object e.g. resizing window
      better to do it through event listeners rather than in HTML as it helps seperate the JS from HTML.

      Window methods:
        window.open() - open a new window
        window.close() - close the current window
        window.moveTo() - move the current window
        window.resizeTo() - resize the current window

      Alert boxes:
        Alert box, prompt box, confirm box

      Timing:
        Set a clock in the page that updates constantly(using setinterval)
        Use setTimeout function(perhaps load something in after a few second after page has loaded)

      Use cookies to store username and welcome next time user enter site.
      Google Maps api
      Youtube api?
      Twitter API
      Facebook API

      //jQuery
      Slow and fast hide/show Animations
      function call after showing/hiding something
      toggle() method
      fadeTo() method(ghost out image(my photo) maybe?)
      slideToggle() method to put custom speed on panels open/close
      jQuery animations(other css attributes e.g. position, font-size)
      Stopping animations
      append and prepend elements, remove elements
      adding/removing/toggling classes
      manipulate element's CSS
      Use jQuery to make a searchable table (of names and email address?)
    </pre>
    <h2>Searchable Table</h2>
    <p>Type something in the input field to search the table for educators, level, or years</p>
    <input id="myInput" type="text" placeholder="Search..">
    <br><br>
    <table class="table
    table-striped
    table-bordered
    table-hover
    table-condensed
    table-responsive">
      <thead>
        <tr>
          <th>Name of Educator</th>
          <th>Level</th>
          <th>Years</th>
        </tr>
      </thead>
      <tbody id="myTable">
        <tr>
          <td>University of Manchester</td>
          <td>University</td>
          <td>2019-2023</td>
        </tr>
        <tr>
          <td>Sale Grammar School</td>
          <td>Sixth Form</td>
          <td>2017-2019</td>
        </tr>
        <tr>
          <td>Altrincham College of Arts</td>
          <td>School</td>
          <td>2014-2017</td>
        </tr>
      </tbody>
    </table>
    <div class="media">
      <div class="media-left">
        <img id="facePicture" src="face.jpg"
        class="img-thumbnail img-responsive"
        alt="A picture of my face"
        style="max-width:200px">
      </div>
      <div class="media-body">
        <h4 class="media-heading">Lorem Ipsum</h4>
        <p id="lorem">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <!-- Trigger the modal with a button -->
        <button type="button" onclick="currentDate()" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Click here!</button>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
              </div>
              <div class="modal-body">
                <p id="date">Some text in the modal.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>

        <!-- Hidden Modal -->
        <div id="hiddenModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">WELCOME!</h4>
              </div>
              <div class="modal-body">
                <p>Welcome to my Website!</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>

        <button type="button" onclick="window.alert('This is alert box!');">Click here!</button>
        <button type="button" id="ghostOut">Surprise!</button>
        <button type="button" id="hugee">BIG!!!</button>
        <h3>Add increase/decrease font size buttons for paragraph above</h3>
      </div>
    </div>
    <div style="padding: 10px 10px 10px 10px;">
      <span>Download photo: </span><a href="face.jpg" download><span class="glyphicon glyphicon-download"></span></a>
    </div>
    <div style="padding: 10px 10px 10px 10px;">
      <span>Email me: </span><a href="mailto:guptamanav077@gmail.com"><span class="glyphicon glyphicon-envelope"></span></a>
    </div>
    <div style="padding: 10px 10px 10px 10px;">
      <span>Print:  </span><button onclick="window.print();"><span class="glyphicon glyphicon-print"></span></button>
    </div>
    <div class="panel panel-default">
      <div id="flip" class="panel-heading">About me(Click to find out more...)</div>
      <div id="panel" class="panel-body">My name is Manav Gupta. I am currently a second year Computer Science student at the University of Manchester. I want to take Artificial Intelligence modules next year. I have won the BP Scholarship.</div>
    </div>
    <button data-toggle="collapse" data-target="#demo">Click to learn more...</button>
    <br>
    <div id="demo" class="collapse">
    Haha tricked you!
    </div>
    <br>
    <section class="row">
      <div class="col-sm-6">
        <div id="studenthack" class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VxZFeeljchc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
      <div class="col-sm-6"></div>
    </section>
    <br>
    <button type="button" id="hide">Hide Video</button>
    <button type="button" id="show">Show Video</button>
    <button type="button" id="fade">Fade In/Out</button>
    <br><br>

    <!-- Query Form -->
    <form action="queryform.php" method="get">
      <div class="form-group">
        <label for="name">First Name:</label>
        <input type="text" class="form-control" name="firstname" id="name" required>
      </div>
      <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input type="text" class="form-control" name="lastname" id="lastname" required>
      </div>
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" name="email" id="email" required>
      </div>
      <div class="form-group">
        <label for="comment">Query:</label>
        <textarea class="form-control" rows="5" name="comment" id="comment" required></textarea>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>

    <h2><u>Files</u></h2>
    <p id="readText"></p>
    <button type="button" id="readFile" onclick="readFile()">Read File</button>
    <br><br>
    <form action="file.php" method="get">
      <div class="form-group">
        <textarea class="form-control" rows="10" name="fileText"></textarea>
      </div>
      <button type="submit" name="overwrite">Overwrite</button>
      <button type="submit" name="append">Append</button>
    </form>
    <br>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
    </form>
    <br>

    <br>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="jack.png" alt="RIP Headphone Jack">
          <div class="carousel-caption">
            <h3>RIP Headphone Jack</h3>
          </div>
        </div>

        <div class="item">
          <img src="s20.jpg" alt="S20 Ultra">
          <div class="carousel-caption">
            <h3>S20 Ultra</h3>
          </div>
        </div>

        <div class="item">
          <img src="ipad.jpg" alt="iPad Pro">
          <div class="carousel-caption">
            <h3>iPad Pro</h3>
          </div>
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <br>
  </main>

  <?php include 'footer.php';?>

  <script src="index.js?v=<?php echo time(); ?>"></script>

</body>
</html>
