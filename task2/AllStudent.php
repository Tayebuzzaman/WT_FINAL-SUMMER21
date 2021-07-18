<html>
	<head>
	<title>All Student</title></head>
	<body><h1>All Student</h1>	</body>
</html>	
	<?php 
	include 'Dashboard.php';
	include 'controllers/CategoryController.php';
	
	$student=getAllStudent();
	?>
	


	<?php
	
                    $i=1;
					foreach($student as $c)
					{
						echo "<tr>";
							echo "<td>$i</td>";
							echo "<td>".$c["name"]."</td>";
							echo '<td><a href="EditStudent.php?id='.$c['id'].'">Edit</a></td>';
							
						echo "</tr>";
						$i++;
					}
	
	
	?>