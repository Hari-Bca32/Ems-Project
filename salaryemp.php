<?php
require_once ('process/dbh.php');
$sql = "SELECT employee.id, employee.firstName, employee.lastName, salary.base, salary.bonus, salary.total FROM employee, salary WHERE employee.id = salary.id";
$result = mysqli_query($conn, $sql);
?>

<html>
<head>
    <title>Salary Table | Employee Management System</title>

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
                <li><a class="homeblack" href="assignproject.php">Project Status</a></li>
                <li><a class="homered" href="salaryemp.php">Salary Table</a></li>
                <li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
                <li><a class="homeblack" href="alogin.html">Log Out</a></li>
            </ul>
        </nav>
    </header>
     
    <div class="divider"></div>
    <div id="divimg"></div>

    <table>
        <tr>
            <th>Emp. ID</th>
            <th>Name</th>
            <th>Base Salary</th>
            <th>Bonus</th>
            <th>Total Salary</th>
        </tr>
        
        <?php
            while ($employee = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$employee['id']."</td>";
                echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
                echo "<td>".$employee['base']."</td>";
                echo "<td>".$employee['bonus']." %</td>";
                echo "<td>".$employee['total']."</td>";
                echo "</tr>";
            }
        ?>
    </table>

</body>
</html>
