<?php include"header.php"?>
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"sidebar.php"?>
     <?php

 include('config.php');
 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if(isset($_GET['id']))
    {
      $id=$_GET['id'];

        $stmt1 = $conn->prepare("SELECT * FROM booking where id='".$_GET['id']."'"); 
     $stmt1->execute();
      $row=$stmt1->fetch(PDO::FETCH_ASSOC);

       $id=$row['id'];
       $client_id=$row['client_id'];
        $state_id=$row['state_id'];
        $workspace_id=$row['workspace_id'];
        $no_of_offices=$row['no_of_offices'];
         $no_of_desk=$row['no_of_desk'];
          
           $from_date=$row['from_date'];
            $to_date=$row['to_date'];




     $data1=$stmt1->fetchAll();



    $stmt_sel = $conn->prepare("SELECT * FROM clients where id='$client_id'"); 
    $stmt_sel->execute();


    $result_sel = $stmt_sel->setFetchMode(PDO::FETCH_ASSOC); 
    $expense_sel=$stmt_sel->fetchAll();


      $stmt_sel1 = $conn->prepare("SELECT * FROM clients where id='$state_id'"); 
    $stmt_sel1->execute();


    $result_sel1 = $stmt_sel1->setFetchMode(PDO::FETCH_ASSOC); 
    $expense_sel1=$stmt_sel1->fetchAll();



     $stmt = $conn->prepare("SELECT * FROM clients"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $clients=$stmt->fetchAll();


  
  $stmt11 = $conn->prepare("SELECT * FROM workspaces where id='$workspace_id'"); 
    $stmt11->execute();

    $result11= $stmt11->setFetchMode(PDO::FETCH_ASSOC);

    $success=$stmt11->fetchAll();



     $stmt1 = $conn->prepare("SELECT * FROM workspaces"); 
    $stmt1->execute();

    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 
    $success1=$stmt1->fetchAll();
  
     
       
       

    
         
    }

    
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
     $_SESSION['reply'] = "Added Successfully";
  header("location:../booking.php");
    }

$conn = null;
?>


        
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Update Booking Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Update Booking</a></li>
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
                                    <form action="operations/booking.php" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">clients Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select name="client_id" class="form-control" required>

                                                     <?php
foreach ($expense_sel as $package) { ?>
<option value="<?php echo $package['id']?>"><?php echo $package['name']; $expense_sel = $package['name']; ?></option>

                                              <?php
                                                    foreach ($clients as $value) { 
                                                      if($expense_sel != $value['name'])
                                                        {?>
                                                    <option value="<?php echo $value['id']?>"><?php echo $value['name']; ?></option>
                                                <?php 
                                                    }
                                                    } ?>
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
foreach ($expense_sel1 as $abc) { ?>
<option value="<?php echo $abc['id']?>"><?php echo $abc['state_name']; $expense_sel1 = $abc['state_name']; ?></option>

                                              <?php
                                                    foreach ($clients as $pqr) { 
                                                      if($expense_sel1 != $pqr['state_name'])
                                                        {?>
                                                    <option value="<?php echo $pqr['id']?>"><?php echo $pqr['state_name']; ?></option>
                                                <?php 
                                                    }
                                                    } ?>
                 <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Worksapce Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select name="workspace_id" id="workspace_id" onchange="calculate();" class="form-control" required>
                                                    <?php
foreach ($success as $package) { ?>
<option value="<?php echo $package['id']?>"><?php echo $package['wname']; $success = $package['wname']; ?></option>

                                              <?php
                                                    foreach ($success1 as $pack) { 
                                                      if($success != $pack['wname'])
                                                        {?>
                                                    <option value="<?php echo $pack['id']?>"><?php echo $pack['wname']; ?></option>
                                                <?php 
                                                    }
                                                    } ?>
                 <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">No of Offices <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="number" min="0" onchange="calculate();" onkeyup="calculate();" class="form-control" value="<?php echo $no_of_offices;?>" id="no_of_offices" name="no_of_offices" placeholder="Enter no of offices.." required>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">No of desk <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="number" min="0" onchange="calculate();" onkeyup="calculate();" class="form-control" value="<?php echo $no_of_desk;?>" id="no_of_desk" name="no_of_desk" placeholder="Enter no of desk.." required>
                                            </div>
                                        </div>
                                        
                                      
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">From Date<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" onchange="calculate();" onkeyup="calculate();" class="form-control" id="from_date" value="<?php echo $from_date;?>" name="from_date" placeholder="From Date" required>
                                            </div>
                                        </div>
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">To Date<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" onchange="calculate();" onkeyup="calculate();" value="<?php echo $to_date;?>" class="form-control" id="to_date" name="to_date" placeholder="To Date" required>
                                            </div>
                                        </div> 
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Total Amount <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="total_amount" name="total_amount" placeholder="Enter Total Amount.." required readonly>
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Advance Amount<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="advance_amount" min="0" name="adv_amount" placeholder="Enter Advance Amount.." required>
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
 
            </script>