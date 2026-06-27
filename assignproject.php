<?php
require_once('process/dbh.php');

// Fetch project data ordered by due date
$sql = "SELECT * FROM `project` ORDER BY duedate DESC";
$result = mysqli_query($conn, $sql);
?>

<html>
<head>
	<title>Project Status | Admin Panel | Employee Management System</title>
	<style>
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1f4037, #99f2c8);
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
            padding: 20px;
        }

        /* Navigation Bar */
        nav {
            width: 100%;
            background: #222;
            padding: 15px 0;
            text-align: center;
        }

        nav h1 {
            color: #fff;
            margin-bottom: 10px;
        }

        #navli {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        #navli li {
            display: inline;
        }

        #navli a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s ease-in-out;
        }

        #navli a:hover {
            background: #ff6f61;
        }

        /* Page Wrapper */
        .page-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }

        /* Table Styling */
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #222;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            #navli {
                flex-wrap: wrap;
                justify-content: center;
            }

            table {
                width: 95%;
            }
        }
    </style>
</head>
<body>
	<header>
		<nav>
			<h1>EMS</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">HOME</a></li>
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homeblack" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homered" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>

	<table>
		<tr>
			<th>Project ID</th>
			<th>Emp. ID</th>
			<th>Project Name</th>
			<th>Due Date</th>
			<th>Submission Date</th>
			<th>Mark</th>
			<th>Status</th>
			<th>Option</th>
		</tr>

		<?php
		while ($project = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$project['pid']."</td>";
			echo "<td>".$project['eid']."</td>";
			echo "<td>".$project['pname']."</td>";
			echo "<td>".$project['duedate']."</td>";
			echo "<td>".(isset($project['subdate']) ? $project['subdate'] : "N/A")."</td>";
			echo "<td>".$project['mark']."</td>";
			echo "<td>".$project['status']."</td>";
			echo "<td><a href=\"mark.php?id={$project['eid']}&pid={$project['pid']}\">Mark</a></td>";
			echo "</tr>";
		}
		?>
	</table>
</body>
</html>
