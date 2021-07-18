<?php
    include 'models/db_config.php';
	$name="";
    $err_name="";
	$id="";
    $err_id="";
    $username="";
    $err_username="";
    $pass="";
    $err_pass="";
	$err_db="";
	$hasError = false;

   
	
	if(isset($_POST["Login"])){
		
		if(empty($_POST["username"])){
		    $err_username = "Username Requird";
			$hasError = true;
	    }
		else{
		    $username = $_POST["username"];
	    }
		
		if(empty($_POST["pass"])){
		    $err_pass = "Password Requird";
			$hasError = true;
	    }
		else{
		    $pass = $_POST["pass"];
	    }
		
		
		if(!$hasError){
			if(authenticateUser($username,$pass)){
				header("Location: Dashboard.php");
			}
			$err_db = "User Invalid";
		}
	}
	
	
	
	function authenticateUser($username,$pass){
		$query = "select * from admin where username='$username' and pass='$pass'";
		$rs = get($query);
		if(count($rs)>0){
			return true;
		}
		return false;
	}
?>