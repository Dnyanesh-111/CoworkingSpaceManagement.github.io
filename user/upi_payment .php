<?php
require_once('check_login.php');
?>
<?php include "header.php" ?>
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include "sidebar.php" ?>
<?php
include "config.php";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM clients where id='" . $_SESSION['id'] . "'");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $clients = $stmt->fetchAll();


    $stmt9 = $conn->prepare("SELECT id,state_name FROM clients group by state_name");
    $stmt9->execute();

    $result9 = $stmt9->setFetchMode(PDO::FETCH_ASSOC);
    $state = $stmt9->fetchAll();


    $stmt1 = $conn->prepare("SELECT * FROM packages");
    $stmt1->execute();

    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    $packages = $stmt1->fetchAll();

    $stmt1 = $conn->prepare("SELECT * FROM vehicals");
    $stmt1->execute();

    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    $vehicals = $stmt1->fetchAll();

    $stmt1 = $conn->prepare("SELECT * FROM clients");
    $stmt1->execute();

    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    $travellers1 = $stmt1->fetchAll();

    $stmt5 = $conn->prepare("SELECT * FROM payment_type group by payment_type");
    $stmt5->execute();

    $result2 = $stmt5->setFetchMode(PDO::FETCH_ASSOC);
    $payment1 = $stmt5->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>


<div class="page-wrapper">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Make Payment</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Booking</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card card-outline-primary">
                    <div class="card-body">
                        <form >
                            <div class="form-body">
                                <h3 class="card-title m-t-15">Payment Info</h3>
                                <hr>

                                <div class="row p-t-20">

                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Enter your upi Id</label>
                                            <input type="text" class="form-control" id="card_number" min="0" max="<?php echo $total; ?>" name="card_number" placeholder="   upi id.." required>
                                        </div>
                                    </div>
                                    

                                </div>
                                


                            </div>
                            <div class="form-actions">

                            <a href="my_bookings.php"><button type="button" class="btn btn-success" name="submit" id="btnValidate"> <i class="fa fa-check"></i>Pay</button> </a>
                                <a href="add_booking.php"><button type="button" class="btn btn-inverse">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
    <?php include "footer.php" ?>

    <div class="popup popup--icon -error js_error-popup" id="show_error">
        <div class="popup__background"></div>
        <div class="popup__content">
            <h3 class="popup__content__title">
                Error
                </h1>
                <p>Please Enter Valid Date.</p>
                <p>

                    <button class="button button--error" data-for="js_error-popup">Close</button>

                </p>
        </div>
    </div>


    <script>
        function calculate() {

            var package = $('#package_id').val();
            var details = package.split(",");
            var p_id = details[0];
            var price_adult = details[1];
            var price_children = details[2];
            if ($("#from_date").val() != "" && $("#to_date").val() != "") {

                var From_date = new Date($("#from_date").val());
                var To_date = new Date($("#to_date").val());
                var diff_date = To_date - From_date;
                var years = Math.floor(diff_date / 31536000000);
                var months = Math.floor((diff_date % 31536000000) / 2628000000);
                var days = Math.floor(((diff_date % 31536000000) % 2628000000) / 86400000);
            } else {
                var days = 0;
            }

            if ($('#no_of_children').val() != '') {
                var no_of_children = $('#no_of_children').val();
            } else {
                var no_of_children = 0;
            }
            if ($('#no_of_adults').val() != '') {
                var no_of_adults = $('#no_of_adults').val();
            } else {
                var no_of_adults = 0;
            }
            var total = (parseInt(price_adult) * parseInt(no_of_adults)) + (parseInt(price_children) * parseInt(no_of_children));
            var total_amount = total * days;
            $('#total_amount').val(total_amount);
            $('#advance_amount').attr('max', total_amount);

            if (total_amount < 0) {
                $('#show_error').addClass('popup--visible');
            }

        }

        function sum2() {
            var total1 = parseInt(document.getElementById('total_amount').value);
            var tx = parseInt(document.getElementById('taxprice1').value);
            var total2 = (parseInt(total1) * (parseFloat(tx) / 100)) + parseInt(total1);
            document.getElementById('ttt2').value = total2;
            $('#advance_amount').attr('max', total2);
        }


        $(function() {
            $("#btnValidate").click(function() {


                if (fromdate > todate) {

                    $('#show_error').addClass('popup--visible');
                }
            });
        });



        var addButtonTrigger = function addButtonTrigger(el) {
            el.addEventListener('click', function() {
                var popupEl = document.querySelector('.' + el.dataset.for);
                popupEl.classList.toggle('popup--visible');
            });
        };

        Array.from(document.querySelectorAll('button[data-for]')).
        forEach(addButtonTrigger);
    </script>