<?php

  session_start();
  require('lib\connectdb.ext');
  require('lib\functions.php');

?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title>Stupervision</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
  </head>

  <body>
    <nav class="navbar navbar-default snav">
      <div class="container">
        <div class="navbar-header"><a class="navbar-brand navbar-link" href="home.php">Stupervision</a>
          <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav navbar-right">
            <?php
                  if (isset($_SESSION['email'])) {
                    try {
                      $sql = "SELECT  COUNT(*)  FROM `students` where `email` = '".$_SESSION['email']."'";
                      $stmt = $conn->query($sql);
                      $stmt->execute();

                      if ($stmt->fetchColumn() > 0) {
                        echo '
                        <li role="presentation"><a class="mab" href="dashboard">Dashboard</a></li>';
                      }
                      else{
                        echo '
                        <li role="presentation"><a class="mab" href="admin">Dashboard</a></li>';
                      }

                    } catch (Exception $e) {
                          echo $e->getMessage();
                    }

                  }else{
                    echo '              <li role="presentation"><a class="mab" href="adlog.php">Supervisors</a></li>
                                        <li role="presentation"><a class="nb" href="login.php">Sign In</a></li>
                                        <li role="presentation"><a class="nb" href="register.php">Sign Up</a></li>';
                    }
                   ?>
          </ul>
        </div>
      </div>
    </nav>


    <div class="container gsj">
      <div class="row">
        <div class="col-md-8 col-md-push-4">
          <h1 style="font-weight: 100;font-size:55px">Book a supervisor with Us now</h1>
          <p>Thousands of young undergraduates and recent graduates have started their careers. Join now to supervise your projects!</p>

          <p id="check-e" class="bg-danger"></p>
          <p id="pass-e" class="bg-danger"></p>
          <form class="gsf" action="check_reg.php" method="post" id="gsf">
            <input type="email" class="form-control" name="email" placeholder="Your email">
            <input type="password" class="form-control" name="password" placeholder="Your Password">
            <a onclick="hsup()" class="btn btn-success gsb" id="signup">Get Started</a>

          </form>
        </div>
      </div>
    </div>


    <div class="container">

    </div>



    <script src="assets/js/scripts.js" charset="utf-8"></script>
    <script src="assets/js/jquery.min.js" charset="utf-8"></script>
    <script src="assets/js/bootstrap.min.js" charset="utf-8"></script>
  </body>

  </html>