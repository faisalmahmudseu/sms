<?php

require_once ('process/dbh.php');
$sql = "SELECT student.id,student.firstName,student.lastName,mark.base,mark.bonus,mark.total from student,`mark` where student.id=mark.id";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>Marks Table | Student Management System</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	
	<header>
		<nav>
			<h1>SMS</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">HOME</a></li>
				
				<li><a class="homeblack" href="addemp.php">Add Student</a></li>
				<li><a class="homeblack" href="viewemp.php">View Student</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homered" href="salaryemp.php">Marks Table</a></li>
				<li><a class="homeblack" href="empleave.php">Student Leave</a></li>
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">
		
	</div>
	
	<table>
			<tr>
				<th align = "center">Stu. ID</th>
				<th align = "center">Name</th>
				
				
				<th align = "center">Base Marks</th>
				<th align = "center">Bonus</th>
				<th align = "center">Total Marks</th>
				
				
			</tr>
			
			<?php
				while ($student = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$student['id']."</td>";
					echo "<td>".$student['firstName']." ".$student['lastName']."</td>";
					
					echo "<td>".$student['base']."</td>";
					echo "<td>".$student['bonus']." %</td>";
					echo "<td>".$student['total']."</td>";
					
					

				}


			?>
			
			</table>
</body>
</html>