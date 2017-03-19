<?php
      session_start();
      require('lib\connectdb.ext');
      require('lib\functions.php');
      if(isset($_POST['email']) && isset($_POST['password']))
      {
        $email = purify($_POST['email']);
        $pwd = purify($_POST['password']);

        try{
          $sql = "SELECT  COUNT(*)  FROM `students` where `email` = '".$email."' AND `password` = '".$pwd."'";
          $stmt = $conn->query($sql);
          $stmt->execute();


          if ($stmt->fetchColumn() > 0) {
            echo "Valid";
            $conn= null;
            $_SESSION['email']=$email;
          }
          else{
            echo "Invalid";
            }


      }




        catch(PDOException $e)
        {
          echo $e->getMessage();
        }
      }
      else{
        header("Location:login.php");
      }


 ?>
