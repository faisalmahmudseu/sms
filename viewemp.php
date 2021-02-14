<?php

require_once ('process/dbh.php');
$sql = "SELECT * from `student` , `rank` WHERE student.id = rank.eid";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>View Student |  Admin Panel | Student Management System</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	<header>
		<nav>
			<h1>SMS</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">HOME</a></li>
				<li><a class="homeblack" href="addemp.php">Add Student</a></li>
				<li><a class="homered" href="viewemp.php">View Student</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Marks Table</a></li>
				<li><a class="homeblack" href="empleave.php">Student Leave</a></li>
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>

		<table>
			<tr>

				<th align = "center">Stu. ID</th>
				<th align = "center">Picture</th>
				<th align = "center">Name</th>
				<th align = "center">Email</th>
				<th align = "center">Birthday</th>
				<th align = "center">Gender</th>
				<th align = "center">Contact</th>
				<th align = "center">NID</th>
				<th align = "center">Address</th>
				<th align = "center">Department</th>
				<th align = "center">Degree</th>
				<th align = "center">Point</th>
				
				
				<th align = "center">Options</th>
			</tr>

			<?php
				while ($student = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$student['id']."</td>";
					echo "<td><img src='process/".$student['pic']."' height = 60px width = 60px></td>";
					echo "<td>".$student['firstName']." ".$student['lastName']."</td>";
					
					echo "<td>".$student['email']."</td>";
					echo "<td>".$student['birthday']."</td>";
					echo "<td>".$student['gender']."</td>";
					echo "<td>".$student['contact']."</td>";
					echo "<td>".$student['nid']."</td>";
					echo "<td>".$student['address']."</td>";
					echo "<td>".$student['dept']."</td>";
					echo "<td>".$student['degree']."</td>";
					echo "<td>".$student['points']."</td>";

					echo "<td><a href=\"edit.php?id=$student[id]\">Edit</a> | <a href=\"delete.php?id=$student[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";

				}


			?>

		</table>
		
	
</body>
</html>