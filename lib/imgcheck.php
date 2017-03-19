<?php
    if($user['image']!=""){
      echo "../assets/uploads/".$user['image']."";
    }
    else{
      echo "../assets/img/def-user.png";
    }
?>
