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

    $stmt1 = $conn->prepare("SELECT * FROM cities");
    $stmt1->execute();

    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    $cities = $stmt1->fetchAll();

   
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<div class="page-wrapper">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Add Wroksapce Details</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Workspaces</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>


    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-primary">

                    <div class="card-body">
                        <form action="operations/workspaces.php" method="post">
                            <div class="form-body">
                                <h3 class="card-title m-t-15">Workspace Info</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Wroksapce Name </label>
                                            <input type="text" class="form-control" name="wname" placeholder="Enter workspace name" required>
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
                                            <label class="control-label">Select City </label>
                                            <select name="city" class="form-control custom-select" required>
                                                <option value=""> Select City</option>
                                                <?php
                                                foreach ($cities as $value) { ?>
                                                    <option value="<?php echo $value['cname'] ?>"><?php echo $value['cname']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Description </label>
                                            <input type="text" class="form-control" name="descrp" placeholder="Enter Description" required>
                                        </div>
                                    </div>
                                </div>



                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Price Per Office</label>
                                            <input type="number" class="form-control" name="price_per_office" placeholder="Enter Price per Office" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Price Per Desk </label>
                                            <input type="number" class="form-control" name="price_per_desk" placeholder="Enter Price per Desk" required>
                                        </div>
                                    </div>


                                </div>



                            </div>
                            <div class="form-actions">

                                <button type="submit" class="btn btn-success" name="submit"> <i class="fa fa-check"></i> Save</button>
                                <a href="add_workspaces.php"><button type="button" class="btn btn-inverse">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php include "footer.php" ?>