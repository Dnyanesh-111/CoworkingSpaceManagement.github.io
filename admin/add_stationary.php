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
            <h3 class="text-primary">Add stationary Details</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">stationary</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>


    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-primary">

                    <div class="card-body">
                        <form action="operations/stationary.php" method="post">
                            <div class="form-body">
                                <h3 class="card-title m-t-15">stationary Info</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Stationary</label>
                                            <select type="text" class="form-control" name="sname" placeholder="Select Stationary" required>
                                                <option value="Undefined">Select Stationary</option>
                                                <option value="Pen">Pen</option>
                                                <option value="Pencil">Pencil</option>
                                                <option value="Notebook">Notebook</option>
                                                <option value="Files">Files</option>
                                                <option value="Blank Papers">Blank Papers</option>
                                                <option value="Gum">Gum</option>
                                                <option value="Scale">Scale</option>
                                            </select>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Stock</label>
                                            <input type="number" class="form-control" name="items" placeholder="Enter items" required>
                                        </div>
                                    </div>



                                </div>


                              

                            </div>
                            <div class="form-actions">

                                <button type="submit" class="btn btn-success" name="submit"> <i class="fa fa-check"></i> Save</button>
                                <a href="add_stationary.php"><button type="button" class="btn btn-inverse">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php include "footer.php" ?>