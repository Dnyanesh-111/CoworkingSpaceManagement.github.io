<?php
require_once('check_login.php');
?>
<?php include"header.php"?>
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"sidebar.php"?>
<?php
include"config.php";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM clients"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $clients=$stmt->fetchAll();


     $stmt1 = $conn->prepare("SELECT * FROM workspaces"); 
    $stmt1->execute();

    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 
    $workspaces=$stmt1->fetchAll();
    
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

        
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Add Booking Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Booking</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            
            
            <div class="container-fluid">
                
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="operations/booking.php" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">clients Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select name="client_id" class="form-control" required>
                                                    <option value=""> Select Traveller</option>
                                                    <?php
                                                    foreach ($clients as $value) { ?>
                                                    <option value="<?php echo $value['id']?>"><?php echo $value['name']; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">State<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select name="state_id" onchange="tax();" class="form-control" required>
                                                    <option value="">Select State</option>
                                                    <?php
                                                    foreach ($clients as $value) { ?>
                                                     <option value="<?php echo $value['id']?>"><?php echo $value['state_name']; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Worksapce Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select name="workspace_id" id="workspace_id" onchange="calculate();" class="form-control" required>
                                                    <option value=""> Select Workspaces</option>
                                                    <?php
                                                    foreach ($workspaces as $value) { ?>
                                                    <option value="<?php echo $value['id'].','.$value['price_per_office'].','.$value['price_per_desk']?>"><?php echo $value['wname']; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">No of Offices <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="number" min="0" onchange="calculate();" onkeyup="calculate();" class="form-control" id="no_of_offices" name="no_of_offices" placeholder="Enter no of offices.." required>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">No of desk <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="number" min="0" onchange="calculate();" onkeyup="calculate();" class="form-control" id="no_of_desk" name="no_of_desk" placeholder="Enter no of desk.." required>
                                            </div>
                                        </div>
                                        
                                      
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">From Date<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" onchange="calculate();" onkeyup="calculate();" class="form-control" id="from_date" name="from_date" placeholder="From Date" required>
                                            </div>
                                        </div>
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">To Date<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" onchange="calculate();" onkeyup="calculate();" class="form-control" id="to_date" name="to_date" placeholder="To Date" required>
                                            </div>
                                        </div> 
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Total Amount <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="total_amount" name="total_amount" placeholder="Enter Total Amount.." required readonly>
                                            </div>
                                        </div>
                                            
                                              <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Tax<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="taxprice1" name="tax" onkeyup="sum2()" placeholder="Enter Total Amount.." required>
                                            </div>
                                        </div>


                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Total<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="ttt2" name="total" placeholder="Enter Total Amount.." required readonly>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Advance Amount<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="advance_amount" min="0" max="<?php echo $total; ?>" name="adv_amount" placeholder="Enter Advance Amount.." required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"footer.php"?>
            <script>

                function calculate() {
                
                    var package =$('#workspace_id').val();
                    var details= package.split(",");
                    var p_id=details[0];
                    var price_per_office=details[1];
                    var price_per_desk=details[2];
if($("#from_date").val()!="" && $("#to_date").val()!=""){
 
var From_date = new Date($("#from_date").val());
var To_date = new Date($("#to_date").val());
var diff_date =  To_date - From_date;
var years = Math.floor(diff_date/31536000000);
var months = Math.floor((diff_date % 31536000000)/2628000000);
var days = Math.floor(((diff_date % 31536000000) % 2628000000)/86400000);
}
else
{
    var days=0;
}

                    if($('#no_of_desk').val()!='')
                    {
                        var no_of_desk=$('#no_of_desk').val();
                    }
                    else
                    {
                        var no_of_desk=0;
                    }
                    if($('#no_of_offices').val()!='')
                    {
                        var no_of_offices=$('#no_of_offices').val();
                    }
                    else
                    {
                        var no_of_offices=0;
                    }
                    var total=(parseInt(price_per_office)* parseInt(no_of_offices))+(parseInt(price_per_desk)*parseInt(no_of_desk));
                    var total_amount=total*days;
                    $('#total_amount').val(total_amount);
                    $('#advance_amount').attr('max',total_amount);

                }

     function sum2()
    {
      var total1=parseInt(document.getElementById('total_amount').value);
      var tx=parseInt(document.getElementById('taxprice1').value);
      var total2=(parseInt(total1)*(parseFloat(tx)/100))+parseInt(total1);
      document.getElementById('ttt2').value=total2;
    }
 
            </script>
