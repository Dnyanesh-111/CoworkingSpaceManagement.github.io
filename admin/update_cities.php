<?php
require_once('check_login.php');
?>
<?php include "header.php" ?>
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include "sidebar.php" ?>
<?php
include('config.php');
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt1 = $conn->prepare("SELECT * FROM cities");
  $stmt1->execute();

  $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
  $cities = $stmt1->fetchAll();

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("select * from cities where id='" . $_GET['id'] . "'");
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $row['id'];
    $cname = $row['cname'];
    $pincode = $row['pincode'];
  }
} catch (PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
  $_SESSION['reply'] = "Added Successfully";
  header("location:../cities.php");
}

$conn = null;
?>


<div class="page-wrapper">

  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-primary">Update Cities Details</h3>
    </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Update City</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </div>
  </div>


  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-12">
        <div class="card card-outline-primary">

          <div class="card-body">
            <form action="operations/cities.php?edit_id=<?php echo $id; ?>" method="post">


              <div class="form-body">
                <h3 class="card-title m-t-15">City Info</h3>
                <hr>
                <div class="row p-t-20">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">City Name </label>
                      <input type="text" class="form-control" value="<?php echo $cname; ?>" name="cname" placeholder="Enter  Name" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Pincode </label>
                      <input type="text" class="form-control" value="<?php echo $pincode; ?>" name="pincode" placeholder="Enter pincode" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-actions">

                <button type="submit" class="btn btn-success" name="update"> <i class="fa fa-check"></i> Update</button>
                <a href="cities_details.php"><button type="button" class="btn btn-inverse">Cancel</button></a>
              </div>
            </form>
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
            <button class="button button--success" data-for="js_success-popup">Close</button>
          </p>
      </div>
    </div>
  <?php unset($_SESSION["success"]);
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