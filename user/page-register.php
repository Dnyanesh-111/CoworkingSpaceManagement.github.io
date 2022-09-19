<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>User log in</title>

    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">



</head>

<body class="fix-header fix-sidebar">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>Register</h4>
                                <?php
                                if (isset($_SESSION['reply'])) {
                                    print '<div class="alert alert-success mb-2" role="alert">' . $_SESSION['reply'] . '</div>';
                                }
                                ?>
                                <form action="user_operations/register.php" method="post">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <input type="text" class="form-control" name="val-username" pattern="[a-zA-Z][a-zA-Z ]+" placeholder="Enter a username.." required>
                                    </div>

                                    <div class="form-group has-danger">
                                        <label class="control-label">Email</label>
                                        <input type="email" class="form-control" name="val-email" placeholder="Your valid email.." required>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Password </label>
                                        <input type="password" id="txtPassword" class="form-control" pattern="(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" name="val-password" title="Please Enter At least one alphabet,one alphabet in upper case,Special Character,Digit for Strong Password" placeholder="Choose a safe one.." required>
                                    </div>

                                    <div class="form-group has-danger">
                                        <label class="control-label">Confirm Password </label>
                                        <input type="password" id="txtConfirmPassword" class="form-control" name="val-confirm-password" placeholder="..and confirm it!" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">State</label>
                                        <select name="state_name" class="form-control custom-select" data-toggle="dropdown" required>
                                            <option value=""> Select State</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Gujrat">Gujrat</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Assam">Assam</option>
                                        </select>
                                    </div>

                                    <div class="form-group has-danger">
                                        <label class="control-label">Mobile </label>
                                        <input type="tel" class="form-control" name="val-digits" placeholder="Enter Your Mobile No." pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$" maxlength="10" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Address</label>
                                        <textarea class="form-control" name="val-suggestions" rows="5" placeholder="Enter Your Address" required></textarea>
                                    </div>

                                    <div class="form-group has-danger">
                                        <label class="control-label">Photo</label>
                                        <input type="file" class="form-control" name="photo" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="submit">Register</button>
                                    <div class="register-link m-t-15 text-center">
                                        <p>Already have account ? <a href="page-login.php"> Sign in</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="js/lib/jquery/jquery.min.js"></script>

    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>

    <script src="js/jquery.slimscroll.js"></script>

    <script src="js/sidebarmenu.js"></script>

    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

    <script src="js/custom.min.js"></script>

</body>

</html>
<?php
include "config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['submit'])) {

        $sql = "INSERT INTO register (uname, email, password, contact)
     VALUES ('" . $_POST['uname'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "','" . $_POST['contact'] . "')";


        echo "New record created successfully";
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}




$conn = null;
?>