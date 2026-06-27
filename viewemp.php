<!DOCTYPE html>
<html>

<head>
    <title>View Employee | Admin Panel | Employee Management System</title>

    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="styleview.css">

   <style>
        /* Reset & General Styling */
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
    width: 75%; /* Reduce width */
    border-collapse: separate;
    border-spacing: 5px; /* Reduce spacing */
    margin: 15px auto; /* Reduce margin */
    background: rgba(255, 255, 255, 0.95);
    border-radius: 8px; /* Slightly smaller border radius */
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
    overflow: hidden;
}

/* Table Header & Cells */
th, td {
    padding: 10px 12px; /* Reduce padding */
    text-align: center;
    border: 1px solid #ddd;
    font-size: 14px; /* Smaller font */
    line-height: 1.4;
}

th {
    background: #222;
    color: white;
    font-size: 16px; /* Reduce font size */
}

/* Row Hover Effect */
tr:hover {
    background-color: #f9f9f9;
}

/* Responsive Design */
@media (max-width: 768px) {
    table {
        width: 90%; /* Adjust for smaller screens */
        border-spacing: 3px; /* Further reduce spacing */
    }
    
    th, td {
        padding: 8px 10px; /* Reduce padding on mobile */
        font-size: 12px;
    }
}

/* Buttons */
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
                <li><a class="homered" href="viewemp.php">View Employee</a></li>
                <li><a class="homeblack" href="assign.php">Assign Project</a></li>
                <li><a class="homeblack" href="assignproject.php">Project Status</a></li>
                <li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
                <li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
                <li><a class="homeblack" href="alogin.html">Log Out</a></li>
            </ul>
        </nav>
    </header>

    <table>
        <tr>
            <th>Emp. ID</th>
            <th>Picture</th>
            <th>Name</th>
            <th>Email</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>NID</th>
            <th>Address</th>
            <th>Department</th>
            <th>Degree</th>
            <th>Point</th>
            <th>Options</th>
        </tr>

        <?php
        require_once ('process/dbh.php');
        $sql = "SELECT * FROM `employee`, `rank` WHERE employee.id = rank.eid";
        $result = mysqli_query($conn, $sql);

        while ($employee = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$employee['id']."</td>";
            echo "<td><img src='process/".$employee['pic']."' height='60' width='60'></td>";
            echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
            echo "<td>".$employee['email']."</td>";
            echo "<td>".$employee['birthday']."</td>";
            echo "<td>".$employee['gender']."</td>";
            echo "<td>".$employee['contact']."</td>";
            echo "<td>".$employee['nid']."</td>";
            echo "<td>".$employee['address']."</td>";
            echo "<td>".$employee['dept']."</td>";
            echo "<td>".$employee['degree']."</td>";
            echo "<td>".$employee['points']."</td>";
            echo "<td>
                    <a href='edit.php?id=".$employee['id']."'>Edit</a> | 
                    <a href='delete.php?id=".$employee['id']."' onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
                </td>";
            echo "</tr>";
        }
        ?>

    </table>

</body>
</html>
