<?php

require_once ('process/dbh.php');

//$sql = "SELECT * from `student_leave`";
$sql = "Select student.id, student.firstName, student.lastName, student_leave.start, student_leave.end, student_leave.reason, student_leave.status, student_leave.token From student, student_leave Where student.id = student_leave.id order by student_leave.token";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>Student Leave | Admin Panel | Student Management System</title>
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
				<li><a class="homeblack" href="salaryemp.php">Marks Table</a></li>
				<li><a class="homered" href="empleave.php">Student Leave</a></li>
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">
		<table>
			<tr>
				<th>Stu. ID</th>
				<th>Token</th>
				<th>Name</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Total Days</th>
				<th>Reason</th>
				<th>Status</th>
				<th>Options</th>
			</tr>

			<?php
				while ($student = mysqli_fetch_assoc($result)) {

				$date1 = new DateTime($student['start']);
				$date2 = new DateTime($student['end']);
				$interval = $date1->diff($date2);
				$interval = $date1->diff($date2);
				//echo "difference " . $interval->days . " days ";

					echo "<tr>";
					echo "<td>".$student['id']."</td>";
					echo "<td>".$student['token']."</td>";
					echo "<td>".$student['firstName']." ".$student['lastName']."</td>";
					
					echo "<td>".$student['start']."</td>";
					echo "<td>".$student['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$student['reason']."</td>";
					echo "<td>".$student['status']."</td>";
					echo "<td><a href=\"approve.php?id=$student[id]&token=$student[token]\"  onClick=\"return confirm('Are you sure you want to Approve the request?')\">Approve</a> | <a href=\"cancel.php?id=$student[id]&token=$student[token]\" onClick=\"return confirm('Are you sure you want to Canel the request?')\">Cancel</a></td>";

				}


			?>

		</table>
		
	</div>
</body>
</html>