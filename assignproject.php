<?php

require_once ('process/dbh.php');
$sql = "SELECT * from `project` order by subdate desc";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>Subject Status |  Admin Panel | Student Management System</title>
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
				<li><a class="homered" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Marks Table</a></li>
				<li><a class="homeblack" href="empleave.php">Student Leave</a></li>
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>

		<table>
			<tr>

				<th align = "center">Project ID</th>
				<th align = "center">Stu. ID</th>
				<th align = "center">Project Name</th>
				<th align = "center">Due Date</th>
				<th align = "center">Submission Date</th>
				<th align = "center">Marks</th>
				<th align = "center">Status</th>
				<th align = "center">Option</th>
				
			</tr>

			<?php
				while ($student = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$student['pid']."</td>";
					echo "<td>".$student['eid']."</td>";
					echo "<td>".$student['pname']."</td>";
					echo "<td>".$student['duedate']."</td>";
					echo "<td>".$student['subdate']."</td>";
					echo "<td>".$student['mark']."</td>";
					echo "<td>".$student['status']."</td>";
					echo "<td><a href=\"mark.php?id=$student[eid]&pid=$student[pid]\">Mark</a>"; 

				}


			?>

		</table>
		
	
</body>
</html>