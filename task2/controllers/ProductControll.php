<?php
    include '../Models/DBConfig.php';
    $cname="";
    $err_cname="";
	$err_db="";
	$hasError = false;

    if(isset($_POST["addProduct"])){
		if(empty($_POST["pname"])){
		    $err_cname = "Name Requird";
			$hasError = true;
	    }
		else{
			$cname= $_POST["pname"];
		}
		if(!$hasError){
			$rs = insertProduct($cname);
			if($rs === true){
				header("Location: AllProducts.php");
			}
			$err_db = $rs;
		}
	}
	else if(isset($_POST["updateProduct"])){
		if(empty($_POST["pname"])){
		    $err_cname = "Name Requird";
			$hasError = true;
	    }
		else{
			$cname= $_POST["pname"];
		}
		if(!$hasError){
			$rs = updateProduct($cname, $_POST["id"]);
			if($rs === true){
				header("Location: AllProducts.php");
			}
			$err_db = $rs;
		}
	}
	
	
	function insertCategory($cname){
		$query = "insert into categories values (NULL,'$cname')";
		return execute($query);
	}
	function getAllproducts(){
		$query = "select * from products";
		$rs = get($query);
		if(count($rs)>0){
			return $rs;
		}
		return false;
	}
	function getproduct($id){
		$query = "select * from products where id=$id";
		$rs = get($query);
		if(count($rs)>0){
			return $rs[0];
		}
		return false;
	}
	function updateproduct($cname,$id){
		$query = "update products set cname='$cname' where id=$id";
		$rs = execute($query);
		return $rs;
	}
	function search($key){
		$query = "select id,name from products where name like'%$key%'";
		$rs = get($query);
		return $rs;
	}
?>
