<?php
// Get employee ID from the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Database connection
require_once('process/dbh.php');

// Fetch employee details
$sql1 = "SELECT * FROM employee WHERE id = ?";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("i", $id);
$stmt1->execute();
$result1 = $stmt1->get_result();
$employeen = $result1->fetch_assoc();
$empName = $employeen['firstName'] ?? '';

// Fetch leaderboard data
$sql = "SELECT employee.id, employee.firstName, employee.lastName, rank.points 
        FROM employee 
        INNER JOIN rank ON rank.eid = employee.id 
        ORDER BY rank.points DESC";
$result = $conn->query($sql);

// Fetch due projects
$sql1 = "SELECT pname, duedate FROM project WHERE eid = ? AND status = 'Due'";
$stmt2 = $conn->prepare($sql1);
$stmt2->bind_param("i", $id);
$stmt2->execute();
$result1 = $stmt2->get_result();

// Fetch leave details
$sql2 = "SELECT employee_leave.start, employee_leave.end, employee_leave.reason, employee_leave.status 
         FROM employee_leave 
         WHERE employee_leave.id = ? 
         ORDER BY employee_leave.token";
$stmt3 = $conn->prepare($sql2);
$stmt3->bind_param("i", $id);
$stmt3->execute();
$result2 = $stmt3->get_result();

// Fetch salary details
$sql3 = "SELECT * FROM salary WHERE id = ?";
$stmt4 = $conn->prepare($sql3);
$stmt4->bind_param("i", $id);
$stmt4->execute();
$result3 = $stmt4->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Panel | XYZ Corporation</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins|Lobster|Montserrat" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #1f4037, #99f2c8); color: #333; display: flex; flex-direction: column; align-items: center; justify-content: flex-start; min-height: 100vh; }
        nav { width: 100%; background: #222; padding: 15px 0; text-align: center; }
        nav h1 { color: #fff; }
        #navli { list-style-type: none; display: flex; justify-content: center; gap: 20px; }
        #navli a { color: white; text-decoration: none; padding: 10px 15px; border-radius: 5px; transition: background 0.3s; }
        #navli a:hover { background: #ff6f61; }
        table { width: 80%; margin: 20px auto; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background: #444; color: white; }
        tr:nth-child(even) { background: #f2f2f2; }
        h2 { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <header>
        <nav>
            <h1>XYZ Corp.</h1>
            <ul id="navli">
                <li><a href="eloginwel.php?id=<?php echo $id ?>">HOME</a></li>
                <li><a href="myprofile.php?id=<?php echo $id ?>">My Profile</a></li>
                <li><a href="#empproject.php?id=<?php echo $id ?>">My Projects</a></li>
                <li><a href="applyleave.php?id=<?php echo $id ?>">Apply Leave</a></li>
                <li><a href="elogin.html">Log Out</a></li>
            </ul>
        </nav>
    </header>
    <h2>Employee Leaderboard</h2>
    <table>
        <tr><th>Seq.</th><th>Emp. ID</th><th>Name</th><th>Points</th></tr>
        <?php $seq = 1; while ($employee = $result->fetch_assoc()) { ?>
            <tr><td><?php echo $seq++; ?></td><td><?php echo $employee['id']; ?></td><td><?php echo $employee['firstName'] . ' ' . $employee['lastName']; ?></td><td><?php echo $employee['points']; ?></td></tr>
        <?php } ?>
    </table>
    <h2>Due Projects</h2>
    <table>
        <tr><th>Project Name</th><th>Due Date</th></tr>
        <?php while ($project = $result1->fetch_assoc()) { ?>
            <tr><td><?php echo $project['pname']; ?></td><td><?php echo $project['duedate']; ?></td></tr>
        <?php } ?>
    </table>
    <h2>Salary Status</h2>
    <table>
        <tr><th>Base Salary</th><th>Bonus</th><th>Total Salary</th></tr>
        <?php while ($salary = $result3->fetch_assoc()) { ?>
            <tr><td><?php echo $salary['base']; ?></td><td><?php echo $salary['bonus']; ?>%</td><td><?php echo $salary['total']; ?></td></tr>
        <?php } ?>
    </table>
    <h2>Leave Status</h2>
    <table>
        <tr><th>Start Date</th><th>End Date</th><th>Total Days</th><th>Reason</th><th>Status</th></tr>
        <?php while ($leave = $result2->fetch_assoc()) { 
            $date1 = new DateTime($leave['start']);
            $date2 = new DateTime($leave['end']);
            $interval = $date1->diff($date2); ?>
            <tr><td><?php echo $leave['start']; ?></td><td><?php echo $leave['end']; ?></td><td><?php echo $interval->days; ?></td><td><?php echo $leave['reason']; ?></td><td><?php echo $leave['status']; ?></td></tr>
        <?php } ?>
    </table>
</body>
</html>
