
<?php
require_once('../check_login.php');
?>
<?php
include"../config.php";
date_default_timezone_set('Asia/Kolkata');
$current_date=date('Y-m-d');
 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['submit']))
    {
        $workspace_id=explode(',',$_POST['workspace_id']);
        $sql = "INSERT INTO booking (client_id, state_id, workspace_id, no_of_offices,no_of_desk,from_date,to_date,total_amount,adv_amount,created_date)
            VALUES ('".$_POST['client_id']."','".$_POST['state_id']."', '".$workspace_id[0]."', '".$_POST['no_of_offices']."','".$_POST['no_of_desk']."','".$_POST['from_date']."','".$_POST['to_date']."','".$_POST['total_amount']."','".$_POST['adv_amount']."', CURDATE())";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
            // $_SESSION['reply'] = "Added Successfully";
        header("location:../booking_details.php");
    }
    if(isset($_POST['update']))
         
    {
        $sql = "UPDATE booking SET client_id='".$_POST['client_id']."',
        state_id='".$_POST['state_id']."',
    workspace_id='".$_POST['workspace_id']."',
    no_of_offices='".$_POST['no_of_offices']."',
    no_of_desk='".$_POST['no_of_desk']."',
    from_date='".$_POST['from_date']."',
    to_date='".$_POST['to_date']."'
     WHERE id='".$_GET['edit_id']."'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
     $_SESSION['reply'] = "Added Successfully";
        header("location:../booking_details.php");
    }
    if(isset($_GET['id']))
    {
        $sql = "DELETE FROM booking WHERE id='".$_GET['id']."'";

            // use exec() because no results are returned
            $conn->exec($sql);
            // echo "Record deleted successfully";
            $_SESSION['success']=' Record Successfully Deleted';
        header("location:../booking_details.php");
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


    

$conn = null;
?>