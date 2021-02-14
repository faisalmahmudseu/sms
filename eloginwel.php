<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	 $sql1 = "SELECT * FROM `student` where id = '$id'";
	 $result1 = mysqli_query($conn, $sql1);
	 $employeen = mysqli_fetch_array($result1);
	 $empName = ($student['firstName']);

	$sql = "SELECT id, firstName, lastName,  points FROM student, rank WHERE rank.eid = student.id order by rank.points desc";
	$sql1 = "SELECT `pname`, `duedate` FROM `project` WHERE eid = $id and status = 'Due'";

	$sql2 = "Select * From student, student_leave Where student.id = $id and student_leave.id = $id order by student_leave.token";

	$sql3 = "SELECT * FROM `mark` WHERE id = $id";

//echo "$sql";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
?>



<html>
<head>
	<title>Student Panel | Student Management System</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
</head>
<body>
	
	<header>
		<nav>
			<h1>Student Management System</h1>
			<ul id="navli">
				<li><a class="homered" href="eloginwel.php?id=<?php echo $id?>"">HOME</a></li>
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
				<li><a class="homeblack" href="empproject.php?id=<?php echo $id?>"">My Projects</a></li>
				<li><a class="homeblack" href="applyleave.php?id=<?php echo $id?>"">Apply Leave</a></li>
				<li><a class="homeblack" href="elogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">
	<div>
		<!-- <h2>Welcome <?php echo "$empName"; ?> </h2> -->

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
   
    	<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Due Projects</h2>
    	

    	<table>

			<tr>
				<th align = "center">Project Name</th>
				<th align = "center">Due Date</th>
				
			</tr>

			

			<?php
				while ($student1 = mysqli_fetch_assoc($result1)) {
					echo "<tr>";
					
					echo "<td>".$student1['pname']."</td>";
					
					echo "<td>".$student1['duedate']."</td>";

				}


			?>

		</table>



		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Marks Status</h2>
    	

    	<table>

			<tr>
				
				<th align = "center">Marks </th>
				<th align = "center">Bonus</th>
				<th align = "center">Total Marks</th>
				
			</tr>

			

			<?php
				while ($student = mysqli_fetch_assoc($result3)) {
					

					echo "<tr>";
					
					
					echo "<td>".$student['base']."</td>";
					echo "<td>".$student['bonus']." %</td>";
					echo "<td>".$student['total']."</td>";
					
				}


				


			?>

		</table>










		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Leave Satus</h2>
    	

    	<table>

			<tr>
				
				<th align = "center">Start Date</th>
				<th align = "center">End Date</th>
				<th align = "center">Total Days</th>
				<th align = "center">Reason</th>
				<th align = "center">Status</th>
			</tr>

			

			<?php
				while ($student = mysqli_fetch_assoc($result2)) {
					$date1 = new DateTime($student['start']);
					$date2 = new DateTime($student['end']);
					$interval = $date1->diff($date2);
					$interval = $date1->diff($date2);

					echo "<tr>";
					
					
					echo "<td>".$student['start']."</td>";
					echo "<td>".$student['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$student['reason']."</td>";
					echo "<td>".$student['status']."</td>";
					
				}


				


			?>

		</table>




   
<br>
<br>
<br>
<br>
<br>







	</div>


		</h2>


		
		
	</div>
</body>
</html>