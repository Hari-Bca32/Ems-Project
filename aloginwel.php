<?php
session_start();
require_once ('process/dbh.php'); // Ensure database connection

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: alogin.html"); // Redirect if not logged in
    exit();
}

// Fetch employee leaderboard data
$sql = "SELECT id, firstName, lastName, points FROM employee ORDER BY points DESC";
$result = mysqli_query($conn, $sql);

// Check if query failed
if (!$result) {
    die("Database Query Failed: " . mysqli_error($conn));
}
?>

<html>
<head>
    <title>Admin Panel | XYZ Corporation</title>
    <style>
/* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1f4037, #99f2c8);
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
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

        /* Main Container */
        .container {
            width: 90%;
            max-width: 800px;
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h2 {
            font-size: 25px;
            margin-bottom: 15px;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }

        table th {
            background: #222;
            color: white;
        }

        table tr:hover {
            background: rgba(0, 0, 0, 0.1);
        }

        /* Button Styling */
        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            font-size: 16px;
            color: white;
            background: #444;
            border-radius: 5px;
            border: none;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background: #ff6f61;
            transform: scale(1.05);
        }

    </style>
</head>
<body>

    <nav>
        <h1>XYZ Corp.</h1>
        <ul id="navli">
            <li><a class="homered" href="aloginwel.php">HOME</a></li>
            <li><a class="homeblack" href="addemp.php">Add Employee</a></li>
            <li><a class="homeblack" href="viewemp.php">View Employee</a></li>
            <li><a class="homeblack" href="assign.php">Assign Project</a></li>
            <li><a class="homeblack" href="assignproject.php">Project Status</a></li>
            <li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
            <li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
            <li><a class="homeblack" href="alogin.html">Log Out</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2>Employee Leaderboard</h2>
        <table>
            <tr>
                <th>Seq.</th>
                <th>Emp. ID</th>
                <th>Name</th>
                <th>Points</th>
            </tr>

            <?php
                $seq = 1;
                while ($employee = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$seq."</td>";
                    echo "<td>".$employee['id']."</td>";
                    echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
                    echo "<td>".$employee['points']."</td>";
                    $seq++;
                }
            ?>
        </table>

        <a href="reset.php" class="btn">Reset Points</a>
    </div>

</body>
</html>
