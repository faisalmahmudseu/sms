<?php 
require_once ('process/dbh.php');
$sql = "SELECT id, firstName, lastName,  points FROM student, rank WHERE rank.eid = student.id order by rank.points desc";
$result = mysqli_query($conn, $sql);
?>


<html>
<head>
	<title>Admin Panel | Student Management System</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
</head>
<body>
	
	<header>
		<nav>
			<h1>SMS</h1>
			<ul id="navli">
				<li><a class="homered" href="aloginwel.php">HOME</a></li>
				<li><a class="homeblack" href="addemp.php">Add Student</a></li>
				<li><a class="homeblack" href="viewemp.php">View Student</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Marks Table</a></li>
				<li><a class="homeblack" href="empleave.php">Student Leave</a></li>
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">
		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Student Leaderboard </h2>
    	<table>

			<tr bgcolor="#000">
				<th align = "center">Seq.</th>
				<th align = "center">Stu. ID</th>
				<th align = "center">Name</th>
				<th align = "center">Points</th>
				

			</tr>

			

			<?php
				$seq = 1;
				while ($student = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$seq."</td>";
					echo "<td>".$student['id']."</td>";
					
					echo "<td>".$student['firstName']." ".$student['lastName']."</td>";
					
					echo "<td>".$student['points']."</td>";
					
					$seq+=1;
				}


			?>

		</table>

		<div class="p-t-20">
			<button class="btn btn--radius btn--green" type="submit" style="float: right; margin-right: 60px"><a href="reset.php" style="text-decoration: none; color: white"> Reset Points</button>
		</div>

		
	</div>
</body>
</html>