<?php include 'MainHeader.php'; ?>
<?php include 'AdminHeader.php'; ?>
<?php include '../Controllers/CategoryControll.php'; ?>
<html>
    <head></head>
	<body>
	    <div align="center">
		    <h3>Add Product</h3>
			<h5><?php echo $err_db; ?></h5>
			<form action="" method="post">
			    <div>
				    <h4>Name</h4>
					<input type = "text" name = "cname"/>
					<span> <?php echo $err_cname; ?> </span>
				</div>
				<div>
					<input type = "submit" name = "addProduct" value = "Add"/>
				</div>
			</form>
		</div>
	</body>
    <?php include 'Footer.php'; ?>
</html>