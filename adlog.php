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

            <p id="check-e" class="bg-danger"></p>
            <form class="" action="#" method="post"  name="adloginf" id="adloginf">
                <h3>LOGIN</h3>
                <input type="email" name="email" value="" placeholder="Email Address" class="form-control">
                <br>
                <input type="password" name="password" value="" placeholder="Password" class="form-control">
                <br>
                <a onclick="adlogin()" class="btn btn-success btn-block" id="login">Login</a>
                <br>
                <p class="text-center"><a class="back" href="home.php"><i class="fa fa-long-arrow-left"> </i> Back to homepage</a></p>
            </form>
        </div>
      </div>
    </div>

    <script src="assets/js/jquery.min.js" charset="utf-8"></script>
    <script src="assets/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="assets/js/scripts.js" charset="utf-8"></script>
  </body>
</html>
