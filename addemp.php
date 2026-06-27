<!DOCTYPE html>
<html>

<head>
    <!-- Title Page-->
    <title>Add Employee | Admin Panel</title>

    <!-- Icons font CSS -->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font for page -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS -->
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
            <h1>XYZ Corp.</h1>
            <ul id="navli">
                <li><a class="homeblack" href="aloginwel.php">HOME</a></li>
                <li><a class="homered" href="addemp.php">Add Employee</a></li>
                <li><a class="homeblack" href="viewemp.php">View Employee</a></li>
                <li><a class="homeblack" href="assign.php">Assign Project</a></li>
                <li><a class="homeblack" href="assignproject.php">Project Status</a></li>
                <li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
                <li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
                <li><a class="homeblack" href="alogin.html">Log Out</a></li>
            </ul>
        </nav>
    </header>

    <div class="page-wrapper">
        <div class="wrapper">
            <div class="card">
                <h2 class="title">Registration Info</h2>
                <form action="process/addempprocess.php" method="POST" enctype="multipart/form-data">

                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="First Name" name="firstName" required>
                    </div>

                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="Last Name" name="lastName" required>
                    </div>

                    <div class="input-group">
                        <input class="input--style-1" type="email" placeholder="Email" name="email" required>
                    </div>

                    <div class="input-group">
                        <input class="input--style-1" type="date" placeholder="Birthday" name="birthday" required>
                    </div>

                    <div class="input-group">
                        <select name="gender" required>
                            <option disabled selected>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <input class="input--style-1" type="number" placeholder="Contact Number" name="contact" required>
                    </div>

                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="Address" name="address" required>
                    </div>

                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="Department" name="dept" required>
                    </div>

                    <div class="input-group">
                        <input class="input--style-1" type="number" placeholder="Salary" name="salary">
                    </div>

                    <div class="input-group">
                        <input class="input--style-1" type="file" name="file">
                    </div>

                    <div>
                        <button class="btn" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <script src="js/global.js"></script>
</body>
</html>
