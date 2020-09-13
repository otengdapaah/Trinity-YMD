<?php
    $conn = mysqli_connect("localhost", "root", "", "trinity_ymd_db") or die($conn);

    $msg='';

    function validate_input($data) {
        $con = mysqli_connect("localhost", "root", "", "trinity_ymd_db");
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars(strip_tags($data));
        $data = mysqli_real_escape_string($con, $data);
        $data = filter_var($data, FILTER_SANITIZE_STRING);
        return $data;
    }
    
    if(ISSET($_POST['register'])){
        $name = validate_input($_POST['name']);
        $birthday = validate_input($_POST['birthday']);
        $maritalstatus = validate_input($_POST['maritalstatus']);
        $occupation = validate_input($_POST['occupation']);
        $phone = validate_input($_POST['phone']);

        $result =mysqli_query($conn, "INSERT INTO `members` VALUES('', '$name', '$birthday', '$maritalstatus', '$occupation', '$phone')") or die(mysqli_error());

        if ($result) {
            $msg = "Member record successfully saved";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Trinity Methodist Oforikrom YMD Registration">
    <meta name="author" content="ElManuel">
    <meta name="keywords" content="Trinity YMD">

    <!-- Title Page-->
    <title>Trinity YMD Registration</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Details</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                        <h5 style="color:#fbc2eb; text-align: center; margin-bottom: 10px"><?php echo $msg; ?></h5>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Name" name="name" required = "required">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="date" placeholder="Birthdate" name="birthday" required = "required">
                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="maritalstatus" required="required">
                                    <option disabled="disabled" selected="selected">Marital Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
						<div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Occupation" name="occupation">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="tel" placeholder="Phone" name="phone" pattern="[0-9]{10}">
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit" name="register">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
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
<!-- end document-->