<?php


  function purify($input){
      $input =trim($input);
      $input =stripslashes($input);
      $input =htmlspecialchars($input);

      return $input;
  }

function getAdmin(){
  global $conn;

  $sql = "SELECT *  FROM `admin` where `email` = '".$_SESSION['email']."'";
  $stmt = $conn->query($sql);
  $stmt->execute();
  $admin = $stmt->fetch(PDO::FETCH_ASSOC);
  return $admin;
}


function getAdmins(){
  global $conn;

  $sql = "SELECT *  FROM `admin`";
  $stmt = $conn->query($sql);
  $stmt->execute();
  return $stmt->fetchAll();
  // return $admin;
}




function getUser(){
  global $conn;
        $sql = "SELECT *  FROM `students` where `email` = '".$_SESSION['email']."'";
        $stmt = $conn->query($sql);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
}


function getUsers(){
  global $conn;
        $sql = "SELECT *  FROM `students`";
        $stmt = $conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
}

function getSchedule(){
  $admin = getAdmin();
  global $conn;
        $sql = "SELECT *  FROM `schedule` where `sup_id` = '".$admin['id']."'";
        $stmt = $conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
}


function getSchedules(){
  global $conn;
        $sql = "SELECT *  FROM `schedule`";
        $stmt = $conn->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
}





 function getApp(){
   $admin = getAdmin();
   global $conn;
         $sql = "SELECT *  FROM `appointments` where `sup_id` = '".$admin['id']."'";
         $stmt = $conn->query($sql);
         $stmt->execute();
         return $stmt->fetchAll();
 }

 function getSApp(){
   $user = getUser();
   global $conn;
         $sql = "SELECT *  FROM `appointments` where `student_id` = '".$user['id']."'";
         $stmt = $conn->query($sql);
         $stmt->execute();
         return $stmt->fetchAll();
 }



 function getApps(){
   global $conn;
         $sql = "SELECT *  FROM `appointments`";
         $stmt = $conn->query($sql);
         $stmt->execute();
         return $stmt->fetchAll();
 }

  ?>
