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
                    <li role="presentation"><a class="mab" href="adlog.php">Supervisors</a></li>
                    <li role="presentation"><a class="nb" href="login.php">Sign In</a></li>
                    <li role="presentation"><a class="nb" href="register.php">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container gsj">
      <div class="row">
        <div class="col-md-8 col-md-push-4">
            <h1 style="font-weight: 100;">Book a supervisor with Us now</h1>
            <p>Thousands of young undergraduates and recent graduates have started their careers. Join now to supervise yourprojects!</p>
            <form class="gsf" action="check_reg.php" method="post">
                      <input type="email" class="form-control" name="email" placeholder="Your email">
                      <input type="password" class="form-control" name="password" placeholder="Your Password">
                      <button type="submit" name="submit" class="btn btn-success gsb">Get Started</button>
            </form>
        </div>
      </div>
    </div>



    <script src="assets/js/scripts.js" charset="utf-8"></script>
    <script src="assets/js/jquery.min.js" charset="utf-8"></script>
    <script src="assets/js/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
