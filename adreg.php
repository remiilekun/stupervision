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
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  </head>
  <body>
    <div class="container-fluid adp">
      <div class="row">
        <div class="col-md-7 nbg">
          <nav class="navbar navbar-default snav">
              <div class="container">
                  <div class="navbar-header"><a class="navbar-brand navbar-link navb" href="home.php">Stupervision</a>
                  </div>
              </div>
          </nav>

          <div class="catchy">
            <h4>SUPERVISE THE BEST PROJECTS FOR YOURSELF</h4>
            <br>
            <br>
            <p>Stupervision is relied upon by a good amount of great companies for finding competent talents. We mould our talents to fit into their needed positions and your company culture.</p>
          </div>

        </div>
        <div class="col-md-5 ac">
            <form class="" action="admin.php" method="post">
                <h3>CREATE AN ACCOUNT</h3>
                <p class="lead">Get started now with the best interns in the job market. If you already have an account <a href="adlog.php" class="back">Login</a></p>
                <input type="text" name="name" value="" placeholder="Full name" class="form-control">
                <br>
                <input type="text" name="phone" value="" placeholder="Phone Number" class="form-control">
                <br>
                <input type="email" name="email" value="" placeholder="Email Address" class="form-control">
                <br>
                <input type="password" name="password" value="" placeholder="password" class="form-control">
                <br>
                <button type="submit" name="submit" class="btn btn-success btn-block">Create Account</button>
                <br>
                <p class="text-center"><a class="back" href="home.php"><i class="fa fa-long-arrow-left"> </i> Back to homepage</a></p>
            </form>
        </div>
      </div>
    </div>

    <script src="assets/js/jquery.min.js" charset="utf-8"></script>
    <script src="assets/js/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
