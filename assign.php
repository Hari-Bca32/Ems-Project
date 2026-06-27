<!DOCTYPE html>
<html>

<head>
    <!-- Title Page-->
    <title>Assign Project | Admin Panel | Employee Management System</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

     <style>
        /* Reset & General Styling */
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

        /* Form Container */
        .page-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }

        .wrapper {
            max-width: 680px;
            width: 100%;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

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

        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background: #fff;
        }

        /* Button */
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
                <li><a class="homered" href="assign.php">Assign Project</a></li>
                <li><a class="homeblack" href="assignproject.php">Project Status</a></li>
                <li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
                <li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
                <li><a class="homeblack" href="alogin.html">Log Out</a></li>
            </ul>
        </nav>
    </header>

    <div class="wrapper">
        <div class="card">
            <h2>Assign Project</h2>
            <form action="process/assignp.php" method="POST" enctype="multipart/form-data">
                <div class="input-group">
                    <input class="input--style-1" type="text" placeholder="Employee ID" name="eid" required>
                </div>

                <div class="input-group">
                    <input class="input--style-1" type="text" placeholder="Project Name" name="pname" required>
                </div>

                <div class="input-group">
                    <input class="input--style-1" type="date" placeholder="Due Date" name="duedate" required>
                </div>

                <button class="btn" type="submit">Assign</button>
            </form>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>

