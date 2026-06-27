<?php
require_once ('process/dbh.php');
$sql = "SELECT * FROM `employee` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $nid = mysqli_real_escape_string($conn, $_POST['nid']);
    $dept = mysqli_real_escape_string($conn, $_POST['dept']);
    $degree = mysqli_real_escape_string($conn, $_POST['degree']);
    //$salary = mysqli_real_escape_string($conn, $_POST['salary']);

    $result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`birthday`='$birthday',`gender`='$gender',`contact`='$contact',`nid`='$nid',`address`='$address',`dept`='$dept',`degree`='$degree' WHERE id=$id");
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Successfully Updated')
    window.location.href='viewemp.php';
    </SCRIPT>");
}
?>

<?php
    $id = (isset($_GET['id']) ? $_GET['id'] : '');
    $sql = "SELECT * from `employee` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if($result){
        while($res = mysqli_fetch_assoc($result)){
            $firstname = $res['firstName'];
            $lastname = $res['lastName'];
            $email = $res['email'];
            $contact = $res['contact'];
            $address = $res['address'];
            $gender = $res['gender'];
            $birthday = $res['birthday'];
            $nid = $res['nid'];
            $dept = $res['dept'];
            $degree = $res['degree'];
        }
    }
?>

<html>
<head>
    <title>View Employee | Admin Panel | Employee Management System</title>
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
                <li><a class="homered" href="viewemp.php">View Employee</a></li>
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
                    <h2 class="title">Update Employee Info</h2>
                    <form id="registration" action="edit.php" method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label for="firstName">First Name</label>
                                    <input class="input--style-1" type="text" name="firstName" value="<?php echo $firstname;?>" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label for="lastName">Last Name</label>
                                    <input class="input--style-1" type="text" name="lastName" value="<?php echo $lastname;?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <label for="email">Email</label>
                            <input class="input--style-1" type="email" name="email" value="<?php echo $email;?>" required>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label for="birthday">Birthday</label>
                                    <input class="input--style-1" type="text" name="birthday" value="<?php echo $birthday;?>" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label for="gender">Gender</label>
                                    <input class="input--style-1" type="text" name="gender" value="<?php echo $gender;?>" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <label for="contact">Contact</label>
                            <input class="input--style-1" type="number" name="contact" value="<?php echo $contact;?>" required>
                        </div>

                        <div class="input-group">
                            <label for="nid">National ID (NID)</label>
                            <input class="input--style-1" type="number" name="nid" value="<?php echo $nid;?>" required>
                        </div>

                        <div class="input-group">
                            <label for="address">Address</label>
                            <input class="input--style-1" type="text" name="address" value="<?php echo $address;?>" required>
                        </div>

                        <div class="input-group">
                            <label for="dept">Department</label>
                            <input class="input--style-1" type="text" name="dept" value="<?php echo $dept;?>" required>
                        </div>

                        <div class="input-group">
                            <label for="degree">Degree</label>
                            <input class="input--style-1" type="text" name="degree" value="<?php echo $degree;?>" required>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id;?>" required><br><br>

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
