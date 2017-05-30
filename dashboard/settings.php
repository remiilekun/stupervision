<?php

    session_start();
    if (!isset($_SESSION['email'])) {
      header("location: ../");
    }
    require('../lib\connectdb.ext');
    require('../lib\functions.php');
    $user = getUser();
    if(isset($_POST['update']))
		{
      $firstname  = purify($_POST['firstname']);
      $lastname   = purify($_POST['lastname']);
      $phone      = purify($_POST['phone']);
      $gender     = purify($_POST['gender']);
      $dob        = purify($_POST['dob']);
      $state      = purify($_POST['state']);
      $matric     = purify($_POST['matric']);
      $bio        = purify($_POST['bio']);
      $password   = purify($_POST['password']);
			$repass     = purify($_POST['repass']);
      $image = $_FILES["image"]["name"];
			try{

        if($password != ''){
          if(!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $password)){
                  echo "<script>alert('Your Password Must Contain At Least 8 Characters, At Least 1 Number, 1 Capital Letter ,  and 1 Lowercase Letter ')</script>";
          }
          else{
            if($password != $repass){
                echo "<script>alert('Passwords do not match')</script>";
            }else{
              if($image != ''){
                require('../lib\upload.php');
                $sql = " UPDATE `students` SET `firstname`='$firstname',`lastname`='$lastname',`phone`='$phone',`gender`='$gender',`dob`='$dob',`matric`='$matric',`state`='$state',`bio`='$bio',`password`='$password',
                `image` ='$image' WHERE `email` ='".$_SESSION['email']."'";
                $stmt = $conn->prepare($sql);
        				$stmt->execute();

              }
              else{
                $sql = " UPDATE `students` SET `firstname`='$firstname',`lastname`='$lastname',`phone`='$phone',`gender`='$gender',`dob`='$dob',`matric`='$matric',`state`='$state',`bio`='$bio',`password`='$password'
                 WHERE `email` ='".$_SESSION['email']."'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
              }

            }
          }
        }else{
          if($image != ''){
                require('../lib\upload.php');
                $sql = "UPDATE `students` SET `firstname`='$firstname',`lastname`='$lastname',`phone`='$phone',`gender`='$gender',`dob`='$dob',`matric`='$matric',`state`='$state',`bio`='$bio',
                `image` ='$image' WHERE `email` ='".$_SESSION['email']."'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

        }
          else{
            $sql = "UPDATE `students` SET `firstname`='$firstname',`lastname`='$lastname',`phone`='$phone',`gender`='$gender',`dob`='$dob',`matric`='$matric',`state`='$state',`bio`='$bio'
             WHERE `email` ='".$_SESSION['email']."'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

          }
        }


	}



			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}

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
                    <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><span><i class="fa fa-comments"></i></span></a>
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
                    </li> -->
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

    <div class="container settings">

        <form class="" action="settings.php" method="post"  enctype="multipart/form-data">
          <div class="row">
            <div class="text-center imgup">
              <input type="file" name="image" value="" class="inputfile inputfile-5" id="imginput">
              <label class="limg"><img src="<?php require('../lib\imgcheck.php');?>" alt="" class="img-circle" height="100px" width="100px"><br><span>Click to add image</span></label>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" name="firstname" value="<?php echo $user['firstname'] ?>" placeholder="" required="required">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" name="lastname" value="<?php echo $user['lastname'] ?>" placeholder="" required="required">
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $user['email'] ?>" placeholder="" disabled>
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php echo $user['phone'] ?>" placeholder="e.g + 234 (909) 999-7645, 09099997645">
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" name="gender">
                  <?php  if($user['gender']!=''){
                    if($user['gender']=='male'){
                      echo "
                        <option value=\"male\">Male</option>
                        <option value=\"female\">Female</option>
                        <option value=\"other\">other</option>";
                    }else if($user['gender']=='female'){
                      echo "
                        <option value=\"female\">Female</option>
                        <option value=\"male\">Male</option>
                        <option value=\"other\">other</option>";
                    }
                    else{
                      echo "<option value=\"other\">other</option>
                        <option value=\"male\">Male</option>
                        <option value=\"female\">Female</option>";
                    }
                  }
                  else{
                    echo "  <option value=\"\">Select Gender</option>
                      <option value=\"male\">Male</option>
                      <option value=\"female\">Female</option>
                      <option value=\"other\">other</option>";
                  }

                  ?>

                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="dob">Dob</label>
                <input type="date" class="form-control" value="<?php echo $user['dob'] ?>" name="dob" placeholder="">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="matric">Matric No</label>
                <input type="text" class="form-control" value="<?php echo $user['matric'] ?>" name="matric" placeholder="">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" value="<?php echo $user['state'] ?>" name="state" placeholder="">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label for="bio">Bio</label>
                <textarea name="bio" class="form-control" placeholder="A short summary about yourself."><?php echo $user['bio'] ?></textarea>
              </div>
            </div>


            <div class="col-md-12">
              <h2>Change Password</h2>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Leave blank to keep password unchanged">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="repass">Retype Password</label>
                <input type="password" class="form-control" name="repass" placeholder="Confirm new password">
              </div>
            </div>
          </div>

          <button type="submit" name="update" class="btn btn-primary">Update Account</button>



        </form>
    </div>


    <script src="../assets/js/jquery.min.js" charset="utf-8"></script>
    <script src="../assets/js/scripts.js" charset="utf-8"></script>
    <script src="../assets/js/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
