<?php
 include 'MainHeader.php'; 
 include 'AdminHeader.php';
 include '../Controllers/ProductControll.php';
 $key = $_GET["key"];
 $products = search($key);
 
 if(count($products)> 0){
	 foreach($products as $p){
		 echo "<p>".$p["name"]."</p>";
	 }
 }
?>