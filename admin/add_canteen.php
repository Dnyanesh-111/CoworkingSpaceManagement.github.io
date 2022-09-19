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
            <h3 class="text-primary">Add canteen Details</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">canteen</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>


    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-primary">

                    <div class="card-body">
                        <form action="operations/canteen.php" method="post">
                            <div class="form-body">
                                <h3 class="card-title m-t-15">canteen Info</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">canteen</label>
                                            <select type="text" class="form-control" name="iname" placeholder="Select canteen" required>
                                                <option value="Undefined">Select canteen</option>
                                                <option value="Bread">Bread</option>
                                                <option value="Milk">Milk</option>
                                                <option value="Maggi">Maggi</option>
                                                <option value="Tea Powder">Tea powder</option>
                                                <option value="Sugar">Sugar</option>
                                            </select>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Stock</label>
                                            <input type="number" class="form-control" name="stock" placeholder="Enter stock" required>
                                        </div>
                                    </div>



                                </div>


                              

                            </div>
                            <div class="form-actions">

                                <button type="submit" class="btn btn-success" name="submit"> <i class="fa fa-check"></i> Save</button>
                                <a href="add_canteen.php"><button type="button" class="btn btn-inverse">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php include "footer.php" ?>