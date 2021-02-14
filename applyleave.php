<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	$sql = "SELECT * FROM `student` where id = '$id'";
	$result = mysqli_query($conn, $sql);
	$student = mysqli_fetch_array($result);
	$StuName = ($student['firstName']);
	//echo "$id";
?>

<html>
<head>
	<title>Apply Leave | Student Panel | Student Management System</title>
	<link rel="stylesheet" type="text/css" href="styleapply.css">
</head>
<body bgcolor="#F0FFFF">
	
	<header>
		<nav>
			<h1>Student Management System</h1>
			<ul id="navli">
				<li><a class="homeblack" href="eloginwel.php?id=<?php echo $id?>"">HOME</a></li>
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
				<li><a class="homeblack" href="empproject.php?id=<?php echo $id?>"">My Projects</a></li>
				<li><a class="homered" href="applyleave.php?id=<?php echo $id?>"">Apply Leave</a></li>
				<li><a class="homeblack" href="elogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Apply Leave Form</h2>
                    <form action="process/applyleaveprocess.php?id=<?php echo $id?>" method="POST">


                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Reason" name="reason">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                            	<p>Start Date</p>
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="start" name="start">
                                   
                                </div>
                            </div>
                            <div class="col-2">
                            	<p>End Date</p>
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="end" name="end">
                                   
                                </div>
                            </div>
                        </div>
                        



                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
		
















	<table>
			<tr>
				<th align = "center">Stu. ID</th>
				<th align = "center">Name</th>
				<th align = "center">Start Date</th>
				<th align = "center">End Date</th>
				<th align = "center">Total Days</th>
				<th align = "center">Reason</th>
				<th align = "center">Status</th>
			</tr>


			<?php


				$sql = "Select student.id, student.firstName, student.lastName, student_leave.start, student_leave.end, student_leave.reason, student_leave.status From student, student_leave Where student.id = $id and student_leave.id = $id order by student_leave.token";
				$result = mysqli_query($conn, $sql);
				while ($student = mysqli_fetch_assoc($result)) {
					$date1 = new DateTime($student['start']);
					$date2 = new DateTime($student['end']);
					$interval = $date1->diff($date2);
					$interval = $date1->diff($date2);

					echo "<tr>";
					echo "<td>".$student['id']."</td>";
					echo "<td>".$student['firstName']." ".$student['lastName']."</td>";
					
					echo "<td>".$student['start']."</td>";
					echo "<td>".$student['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$student['reason']."</td>";
					echo "<td>".$student['status']."</td>";
					
				}


			?>


		</table>







</body>
</html>