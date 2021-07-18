<?php
include 'models/db_config.php';
$name="";
$err_name="";

$id="";
$err_id="";
$dob="";
$err_dob="";
$credit="";
$err_credit="";
$cgpa="";
$err_cgpa="";
$dept_id="";
$err_dept_id="";

$has_error=false;

$err_db_error="";

if(isset($_POST["add_student"]))
{
	if(empty($_POST["name"]))
	{
		$err_name="Name Required";
		$has_error=true;
	}else
	{
		$name=$_POST["name"];
	}
	if(!$has_error)
	{
		$rs=insertCategory($_POST["name"]);
		if($rs===true)
		{
			 header("Location: AllStudent.php");
			
		}$err_db_error= $rs;
		
	}
	
}

function insertCategory($name)
{
	$query= "insert into student values (NULL,'$name')";
	return execute($query);
}

function getAllStudent()
{
	$query="select * from student";
	$rs=get($query);
}

function getStudent($name,$id , $dob , $credit , $cgpa , $dept_id)
	{
		$query= "select name from student where id=$id";
		$rs = get($query);
	return $rs[1];
	}
	
	function updateStudent($name,$id , $dob , $credit , $cgpa , $dept_id )
	{
		$query= "update student set name='$name' where id=$id";
		return execute($query);
	}





?>