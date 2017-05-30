<?php

		session_start();
    require('lib\connectdb.ext');
    require('lib\functions.php');
		if(isset($_POST['email']) && isset($_POST['password']))
		{
			$email = purify($_POST['email']);
			$pwd = purify($_POST['password']);
			try{
				$sql = "SELECT COUNT(*) FROM `students` where `email` = '".$_POST['email']."'";
        $stmt = $conn->query($sql);
				$stmt->execute();

			if ($stmt->fetchColumn() > 0) {
				echo "Exist";
				$conn= null;
				}
				else{
            if(!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $pwd)){
                echo "Mismatch";
            }
             else {
                	$sql = "INSERT INTO `students`(`firstname`, `lastname`, `email`, `phone`, `image`, `gender`, `dob`, `matric`, `state`, `bio`, `password`)
                   VALUES ('','','".$email."','','','','','','','','".$pwd."')";
      							if ($conn->exec($sql)) {
												$_SESSION['email']= $_POST['email'];
		                   	$_SESSION['welmess'] = "Welcome to Stupervison! You have signed up successfully.";
		        					  echo "Go";
		        					  $conn= null;
      					}
            }
		}
	}



			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
?>
