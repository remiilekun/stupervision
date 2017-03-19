<?php

    session_start();
    require('../lib\connectdb.ext');
    require('../lib\functions.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Stupervision</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
  </head>
  <body>


        <?php



        try{
          $sql = "SELECT *  FROM `students` where `email` = '".$_SESSION['email']."'";
          $stmt = $conn->query($sql);
          $stmt->execute();
          $user = $stmt->fetch(PDO::FETCH_ASSOC);

      }




        catch(PDOException $e)
        {
          echo $e->getMessage();
        }



        ?>



        <nav class="navbar navbar-default snav">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="../home.php">Stupervision</a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><span><i class="fa fa-comments"></i></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation" class="dropdown-header">Messages</li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation"><a href="#">Item</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><span><i class="fa fa-bell"></i></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation" class="dropdown-header">Notifications</li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation"><a href="#">Item</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><img src="<?php require('../lib\imgcheck.php');?>" alt="" class="img-circle" height="25px" width="25px"> <?php require('../lib\studentcheck.php');?> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a href="index.php">Profile</a></li>
                                <li role="presentation"><a href="settings.php">Settings</a></li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation"><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>





    <script src="../assets/js/jquery.min.js" charset="utf-8"></script>
    <script src="../assets/js/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
