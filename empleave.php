<html>
<head>
    <title>Employee Leave | Admin Panel | Employee Management System</title>
    <link rel="stylesheet" type="text/css" href="styleview.css">

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
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 0;
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
            padding: 12px;
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

            th, td {
                padding: 10px;
                font-size: 14px;
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
                <li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
                <li><a class="homered" href="empleave.php">Employee Leave</a></li>
                <li><a class="homeblack" href="alogin.html">Log Out</a></li>
            </ul>
        </nav>
    </header>

    <div class="divider"></div>
    <div id="divimg">
        <table>
            <tr>
                <th>Emp. ID</th>
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
                require_once ('process/dbh.php');
                $sql = "SELECT employee.id, employee.firstName, employee.lastName, employee_leave.start, employee_leave.end, employee_leave.reason, employee_leave.status, employee_leave.token FROM employee, employee_leave WHERE employee.id = employee_leave.id ORDER BY employee_leave.token";
                $result = mysqli_query($conn, $sql);

                while ($employee = mysqli_fetch_assoc($result)) {
                    $date1 = new DateTime($employee['start']);
                    $date2 = new DateTime($employee['end']);
                    $interval = $date1->diff($date2);

                    echo "<tr>";
                    echo "<td>".$employee['id']."</td>";
                    echo "<td>".$employee['token']."</td>";
                    echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
                    echo "<td>".$employee['start']."</td>";
                    echo "<td>".$employee['end']."</td>";
                    echo "<td>".$interval->days."</td>";
                    echo "<td>".$employee['reason']."</td>";
                    echo "<td>".$employee['status']."</td>";
                    echo "<td>
                        <a href=\"approve.php?id=$employee[id]&token=$employee[token]\" onClick=\"return confirm('Approve this request?')\">Approve</a> | 
                        <a href=\"cancel.php?id=$employee[id]&token=$employee[token]\" onClick=\"return confirm('Cancel this request?')\">Cancel</a>
                    </td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>

</body>
</html>
