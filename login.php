<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Stupervision</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
  </head>
  <body class="opback">


    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-xs-12">
                <div class="thumbnail signin">
                    <div class="caption">
                        <h2 class="text-center"><a href="home.php" class="hl">Stupervision</a></h2>

                        <h3 class="text-center">Sign In</h3>

                        <p id="check-e" class="bg-danger"></p>


                        <form action="#" name="loginf" id="loginf" method="post">
                          <div class="form-group"><span class="label label-default">email </span>
                              <input class="form-control" type="email" name='email'  placeholder="john@doe.com">
                          </div>
                          <div class="form-group"><span class="label label-default">password </span>
                              <input class="form-control" type="password" name='password' placeholder="********">
                          </div>
                              <a onclick="login()" class="btn btn-success btn-block" id="signin">Sign In</a>
                            <a class="btn btn-default btn-block" href="register.php">Create an account</a>

                            <br>
                            <br>
                            <p class="text-center"><a href="#">Forgot your password?</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js" charset="utf-8"></script>
    <script src="assets/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="assets/js/scripts.js" charset="utf-8"></script>
  </body>
</html>
