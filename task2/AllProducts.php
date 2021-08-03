<?php include 'MainHeader.php'; ?>
<?php include 'AdminHeader.php'; ?>
<?php include '../Controllers/ProductControll.php'; ?>
<?php $products = getAllProducts(); ?>
<html>
    <head></head>
	<boady>
	    <div align="center">
		    <h3>All Products</h3>
			<h5><?php echo $err_db; ?></h5>
			<form action="" method="post">
			    <input type = "text" onkeyup="search(this);" name = "pname"/>
				<span id ="suggestions"> </span>
			</form>
			<table>
			    <thead>
				    <th>SL#</th>
					<th>Name</th>
					
				</thead>
				<tboady>
				    <?php
                        $i = 1;
						foreach($products as $p){
							echo "<tr>";
							    echo "<td>$i</td>";
								echo "<td>".$p["pname"]."</td>";
								echo '<td><a href = "EditProduct.php?id='.$c["id"].'">Edit</td>';
							echo "</tr>";
							$i++;
						}
					?>
				</tboady>
			</table>
		</div>
	</boady>
	<script src="p.js"></script>
    <?php include 'Footer.php'; ?>
</html>