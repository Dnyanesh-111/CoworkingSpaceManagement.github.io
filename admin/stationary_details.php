<?php
require_once('check_login.php');
?>
<?php include "header.php" ?>
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include "sidebar.php" ?>
<?php
if (isset($_GET['id'])) { ?>
    <div class="popup popup--icon -question js_question-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
            <h3 class="popup__content__title">
                Sure
                </h1>
                <p>Are You Sure To Delete This Record?</p>
                <p>
                    <a href="operations/stationary.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
                    <a href="stationary_details.php" class="button button--error" data-for="js_success-popup">No</a>
                </p>
        </div>
    </div>
<?php } ?>

<div class="page-wrapper">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">stationary Details</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">stationary Details</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>


    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <a href="add_stationary.php"><button type="button" class="btn btn-primary">Add Stationary</button></a>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Stationary Name</th>
                                        <th>Stock</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Stationary Name</th>
                                        <th>Stock</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "friday";

                                    try {
                                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $stmt = $conn->prepare("SELECT * FROM stationary");
                                        $stmt->execute();


                                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                        $data = $stmt->fetchAll();
                                    } catch (PDOException $e) {
                                        echo "Error: " . $e->getMessage();
                                    }

                                    foreach ($data as $value) { ?>
                                        <tr>
                                            <td><?php echo $value['id']; ?></td>
                                            <td><?php echo $value['sname']; ?></td>
                                            <td><?php echo $value['items']; ?></td>


                                            <td><a href="stationary_details.php?id=<?php echo $value['id']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash fa-2x" data-toggle="tooltip" title="Delete"></i></a>
                                                <a href="update_stationary.php?id=<?php echo $value['id']; ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil fa-2x" data-toggle="tooltip" title="Edit"></i></a>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>


    <?php include "footer.php" ?>


    <?php if (!empty($_SESSION['success'])) {  ?>
        <div class="popup popup--icon -success js_success-popup popup--visible">
            <div class="popup__background"></div>
            <div class="popup__content">
                <h3 class="popup__content__title">
                    Success
                    </h1>
                    <p><?php echo $_SESSION['success']; ?></p>
                    <p>
                        <?php echo "<script>
  setTimeout(\"location.href='stationary_details.php'\", 2000);

</script>" ?>
                    </p>
            </div>
        </div>
    <?php unset($_SESSION["success"]);
    } ?>
    <?php if (!empty($_SESSION['error'])) {  ?>
        <div class="popup popup--icon -error js_error-popup popup--visible">
            <div class="popup__background"></div>
            <div class="popup__content">
                <h3 class="popup__content__title">
                    Error
                    </h1>
                    <p><?php echo $_SESSION['error']; ?></p>
                    <p>
                        <?php echo "<script>
  setTimeout(\"location.href='stationary_details.php'\", 2000);

</script>" ?>
                    </p>
            </div>
        </div>
    <?php unset($_SESSION["error"]);
    } ?>
    <script>
        var addButtonTrigger = function addButtonTrigger(el) {
            el.addEventListener('click', function() {
                var popupEl = document.querySelector('.' + el.dataset.for);
                popupEl.classList.toggle('popup--visible');
            });
        };

        Array.from(document.querySelectorAll('button[data-for]')).
        forEach(addButtonTrigger);
    </script>