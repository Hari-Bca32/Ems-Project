<?php
require_once('process/dbh.php');

// Sanitize the GET values
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$pid = isset($_GET['pid']) ? (int)$_GET['pid'] : 0;

// Fetch data from the database
if ($id > 0 && $pid > 0) {
    $sql = "SELECT project.pid, project.eid, project.pname, project.duedate, project.subdate, project.mark, 
                   rank.points, employee.firstName, employee.lastName, salary.base, salary.bonus, salary.total 
            FROM project
            INNER JOIN rank ON project.eid = rank.eid
            INNER JOIN employee ON project.eid = employee.id
            INNER JOIN salary ON project.eid = salary.id
            WHERE project.eid = ? AND project.pid = ?";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $id, $pid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($result && $res = mysqli_fetch_assoc($result)) {
        $pname = $res['pname'];
        $duedate = $res['duedate'];
        $subdate = $res['subdate'];
        $firstName = $res['firstName'];
        $lastName = $res['lastName'];
        $mark = $res['mark'];
        $points = $res['points'];
        $base = $res['base'];
        $bonus = $res['bonus'];
        $total = $res['total'];
    } else {
        echo "No records found.";
        exit();
    }
}

if (isset($_POST['update'])) {
    // Sanitize POST values
    $eid = (int) $_POST['eid'];
    $pid = (int) $_POST['pid'];
    $mark = (int) $_POST['mark'];
    $points = (int) $_POST['points'];
    $base = (float) $_POST['base'];
    $bonus = (float) $_POST['bonus'];

    // Calculate the updated points, bonus, and salary
    $upPoint = $points + $mark;  
    $upBonus = $bonus + $mark;  
    $upSalary = $base + ($upBonus * $base) / 100;

    // Update the `project`, `rank`, and `salary` tables
    $sql_update_project = "UPDATE project SET mark = ? WHERE eid = ? AND pid = ?";
    $stmt = mysqli_prepare($conn, $sql_update_project);
    mysqli_stmt_bind_param($stmt, "iii", $mark, $eid, $pid);
    mysqli_stmt_execute($stmt);

    $sql_update_rank = "UPDATE rank SET points = ? WHERE eid = ?";
    $stmt = mysqli_prepare($conn, $sql_update_rank);
    mysqli_stmt_bind_param($stmt, "ii", $upPoint, $eid);
    mysqli_stmt_execute($stmt);

    $sql_update_salary = "UPDATE salary SET bonus = ?, total = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql_update_salary);
    mysqli_stmt_bind_param($stmt, "ddi", $upBonus, $upSalary, $eid);
    mysqli_stmt_execute($stmt);

    // Redirect after update
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.location.href='assignproject.php';
        </SCRIPT>");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Project Mark | Employee Management System</title>
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
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

/* Form Container */
.wrapper {
    max-width: 680px;
    width: 100%;
}

/* Card Styling */
.card {
    background: rgba(255, 255, 255, 0.95);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    text-align: center;
}

/* Title */
.title {
    font-size: 24px;
    margin-bottom: 20px;
    font-weight: 600;
    color: #222;
}

/* Input Fields */
.input-group {
    margin-bottom: 15px;
}

.input--style-1 {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    transition: all 0.3s ease-in-out;
}

.input--style-1:focus {
    border-color: #ff6f61;
    outline: none;
}

/* Dropdown Styling */
select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    background: #fff;
}

/* Button Styling */
.btn {
    display: inline-block;
    padding: 12px 20px;
    font-size: 16px;
    color: white;
    background: #444;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}

.btn:hover {
    background: #ff6f61;
    transform: scale(1.05);
}

/* Responsive Design */
@media (max-width: 768px) {
    #navli {
        flex-wrap: wrap;
        justify-content: center;
    }

    .wrapper {
        max-width: 95%;
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

  <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
      <div class="card card-1">
        <div class="card-heading"></div>
        <div class="card-body">
          <h2 class="title">Project Mark</h2>
          <form id="registration" action="mark.php" method="POST">
            <div class="input-group">
              <p>Project Name</p>
              <input class="input--style-1" type="text" name="pname" value="<?php echo htmlspecialchars($pname); ?>" readonly>
            </div>

            <div class="input-group">
              <p>Employee Name</p>
              <input class="input--style-1" type="text" name="firstName" value="<?php echo htmlspecialchars($firstName) . ' ' . htmlspecialchars($lastName); ?>" readonly>
            </div>

            <div class="row row-space">
              <div class="col-2">
                <div class="input-group">
                  <p>Due Date</p>
                  <input class="input--style-1" type="text" name="duedate" value="<?php echo htmlspecialchars($duedate); ?>" readonly>
                </div>
              </div>
              <div class="col-2">
                <div class="input-group">
                  <p>Submission Date</p>
                  <input class="input--style-1" type="text" name="subdate" value="<?php echo htmlspecialchars($subdate); ?>" readonly>
                </div>
              </div>
            </div>

            <div class="input-group">
              <p>Assign Mark</p>
              <input class="input--style-1" type="text" name="mark" value="<?php echo htmlspecialchars($mark); ?>">
            </div>

            <input type="hidden" name="eid" value="<?php echo (int)$id; ?>" required>
            <input type="hidden" name="pid" value="<?php echo (int)$pid; ?>" required>
            <input type="hidden" name="points" value="<?php echo (int)$points; ?>" required>
            <input type="hidden" name="base" value="<?php echo (float)$base; ?>" required>
            <input type="hidden" name="bonus" value="<?php echo (float)$bonus; ?>" required>
            <input type="hidden" name="total" value="<?php echo (float)$total; ?>" required>

            <div class="p-t-20">
              <button class="btn btn--radius btn--green" type="submit" name="update">Assign Mark</button>
            </div>
          </form>
          <br>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
