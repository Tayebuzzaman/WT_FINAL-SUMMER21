<?php

	$sname="";
	$err_sname="";
	$uname="";
    $err_uname="";
    $pass="";
    $err_pass="";
	$dob="";
	$err_dob="";
	$credit="";
	$err_crdt="";
	
	$err_db="";
	$cgpa="";
	$err_cgpa="";
	$dept_id="";
	$err_dept_id="";
	$error=true;
	include 'models/db_config.php';
	if(isset($_POST["addstudent"]))
	{
		$rs=insertCategory($_POST["sname"],$_POST["dob"],$_POST["credit"],$_POST["cgpa"],$_POST["dept_id"]);
		if(empty($_POST["sname"]))
		{
			$err_sname="Name Required";
			$error=false;
		}
		else
		{
			$sname=$_POST["sname"];
		}
		if(empty($_POST["dob"]))
		{
			$err_dob="Date Required";
			$error=false;
		}
		else
		{
			$dob=$_POST["dob"];
		}
		if(empty($_POST["credit"]))
		{
			$err_crdt="Credit Required";
			$error=false;
		}
		else
		{
			$credit=$_POST["credit"];
		}
		if(empty($_POST["cgpa"]))
		{
			$err_cgpa="CGPA Required";
			$error=false;
		}
		else
		{
			$cgpa=$_POST["cgpa"];
		}
		if(empty($_POST["dept_id"]))
		{
			$err_dept_id="ID Required";
			$error=false;
		}
		else
		{
			$dept_id=$_POST["dept_id"];
		}
		if(!empty($_POST["sname"])&&!empty($_POST["dob"])&&!empty($_POST["credit"])&&!empty($_POST["cgpa"]))
		{
			if($rs == true)
			{
			header("Location: Allstudent.php");
			}
			$db_err = $rs;
		}
	}
	else if(isset($_POST["editstudents"]))
	{
		$rs = updatestd($_POST["id"],$_POST["sname"],$_POST["dob"],$_POST["credit"],$_POST["cgpa"]);
		if($_POST["sname"]=="")
		{
			$err_sname="Name Required";
			$error=false;
		}
		else
		{
			$sname=$_POST["sname"];
		}
		if($_POST["dob"]=="")
		{
			$err_dob="Date Required";
			$error=false;
		}
		else
		{
			$dob=$_POST["dob"];
		}
		if($_POST["credit"]=="")
		{
			$err_crdt="Credit Required";
			$error=false;
		}
		else
		{
			$credit=$_POST["credit"];
		}
		if($_POST["cgpa"]=="")
		{
			$err_cgpa="CGPA Required";
			$error=false;
		}
		else
		{
			$cgpa=$_POST["cgpa"];
		}
		if(!empty($_POST["sname"])&&!empty($_POST["dob"])&&!empty($_POST["credit"])&&!empty($_POST["cgpa"]))
		{
			if($rs == true)
			{
			header("Location: Allstudent.php");
			}
			$db_err = $rs;
		}
		
	}
	else if(isset($_POST["delete"]))
	{
		$rs = deletestd($_POST["id"]);
		if($_POST["sname"]=="")
		{
			$err_sname="Name Required";
			$error=false;
		}
		else
		{
			$sname=$_POST["sname"];
		}
		if($rs === true)
		{
			header("Location: Allstudent.php");
		}
		$db_err = $rs;
	}
	
	else if(isset($_POST["Login"])){
		
		
		if(!$hasError){
			if(authenticateUser($uname,$pass)){
				header("Location: Dashboard.php");
			}
			$err_db = "User Invalid";
		}
	}
	
	function insertCategory($name,$dob,$credit,$cgpa,$deptid)
	{
		$query = "insert into student values (NULL,'$name','$dob','$credit','$cgpa','$deptid')";
		 return execute($query);
	}
	
	function getallStd()
	{
		$query = "select * from student";
		$rs = get($query);
		return $rs;
	}
	function getStd($id)
	{
		$query= "select Name,DOB,Credit,CGPA from student where id=$id";
		$rs = get($query);
	return $rs[0];
	}
	function updatestd($id,$name,$dob,$credit,$cgpa)
	{
		$query= "update student set Name='$name',DOB='$dob',Credit='$credit',CGPA='$cgpa' where id=$id";
		return execute($query);
	}
	function deletestd($id)
	{
		$query= "DELETE FROM student WHERE id=$id";
		return execute($query);
	}
	
	function authenticateUser($uname,$pass){
		$query = "select * from admin where username='$uname' and password='$pass'";
		$rs = get($query);
		if(count($rs)>0){
			return true;
		}
		return false;
	}
?>