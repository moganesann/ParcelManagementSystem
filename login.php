<?php
include("config.php");
   session_start();
   
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['userID']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
	  
      
      $sql = "SELECT * FROM users WHERE userID = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
	  
	  $_SESSION['login_user'] = $myusername;
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
		if($_POST['userID'] == 'admin' && $_POST['password'] == 'admin') {
         
         header("location: /admin/adminPage.php");	
      }
		
      else if($count == 1 && $_POST['usertype'] == "Officer") {
         
         header("location: /Officer/officerPage.php");	
      }
	   else if($count == 1 && $_POST['usertype'] == "Warden") {
         
         header("location: /Warden/wardenPage.php");	
      }
	  else if($count == 1 && $_POST['usertype'] == "Residents") {
         
         header("location: /Resident/residentPage.php");	
      }
	  else {
         header("location: index.html");
		 echo "Invalid password";
      }
   }
?>