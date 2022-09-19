<?php
require_once('check_login.php');
?>
<?php include "header.php" ?>

<?php include "sidebar.php" ?>
<?php
include "config.php";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<div class="page-wrapper">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Add employee Details</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">employee</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>


    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-primary">

                    <div class="card-body">
                        <form action="operations/employee.php" method="post">
                            <div class="form-body">
                                <h3 class="card-title m-t-15">employee Info</h3>
                                <hr>
                                <div class="row p-t-20">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Employee Name</label>
                                            <input type="text" class="form-control" name="ename" placeholder="Select employee" required>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Address </label>
                                            <input type="text" class="form-control" name="addr" placeholder="Enter Address" required>
                                        </div>
                                    </div>



                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Employee Role </label>
                                            <select type="text" value="<?php echo $erole; ?>" class="form-control" name="erole" placeholder="Select Role" required>
                                                <option value="Undefined">Select Role</option>
                                                <option value="Cleaning Staff">Cleaning Staff</option>
                                                <option value="Security Staff">Security Staff</option>
                                                <option value="Workspace Manager Staff">Workspace Manager Staff</option>
                                                <option value="Receptionist">Receptionist</option>
                                                <option value="Canteen Manager">Canteen Manager</option>
                                                <option value="Canteen Chef ">Canteen Chef</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Contact Info </label>
                                            <input type="text" class="form-control"  name="cinfo" placeholder="Enter contact" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Salary </label>
                                            <input type="number" class="form-control"  name="salary" placeholder="Enter Salary" required>
                                        </div>
                                    </div>
                                </div>

                            </div>




                            <div class="form-actions">

                                <button type="submit" class="btn btn-success" name="submit"> <i class="fa fa-check"></i> Save</button>
                                <a href="add_employee.php"><button type="button" class="btn btn-inverse">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php include "footer.php" ?>