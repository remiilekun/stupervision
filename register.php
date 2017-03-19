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
                <div class="thumbnail  signup">
                    <div class="caption">
                        <h2 class="text-center"><a href="home.php" class="hl">Stupervision</a></h2>
                        <h3 class="text-center">Sign Up</h3>

                        <p id="check-e" class="bg-danger"></p>

                        <form  action="#" name="signupf" id="signupf" method="post">
                            <div class="form-group"><span class="label label-default">email </span>
                                <input class="form-control" name='email' type="email"  placeholder="john@doe.com">
                            </div>
                            <div class="form-group"><span class="label label-default">password </span>
                                <input class="form-control" name='password' type="password" placeholder="********">
                                <p id="pass-e" class="bg-danger"></p>
                            </div>
                            <a onclick="signup()" class="btn btn-success btn-block" id="signup">Sign Up</a>
                            <a class="btn btn-default btn-block" href="login.php">Already a member? Login</a>
                            <br>
                            <br>
                            <p class="text-center">By signing up you agree to our</p>
                            <p class="text-center"><a href="#">Terms and Privacy Policy</a></p>
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
