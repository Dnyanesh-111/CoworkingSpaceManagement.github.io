<?php session_start();?>
<?php
require_once('../check_login.php');
?>
<?php
include"../config.php";
 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['submit']))
    {
        $sql = "INSERT INTO booking_report (from_date, to_date)
            VALUES ('".$_POST['from_date']."', '".$_POST['to_date']."')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
            // $_SESSION['reply'] = "Added Successfully";
        header("location:../bookingreport_details.php");
    }
    if(isset($_POST['update']))
         
    {
        $sql = "UPDATE clients SET name='".$_POST['val-username']."',
    email='".$_POST['val-email']."',
    password='".$_POST['val-password']."',
    state_name='".$_POST['state_name']."',
    mobile='".$_POST['val-digits']."',
    address='".$_POST['val-suggestions']."'
     WHERE id='".$_GET['edit_id']."'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
     $_SESSION['reply'] = "Added Successfully";
        header("location:../traveller_details.php");
    }
    if(isset($_GET['id']))
    {
        $sql = "DELETE FROM clients WHERE id='".$_GET['id']."'";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Record deleted successfully";
             $_SESSION['reply'] = "Record deleted successfully";
        header("location:../traveller_details.php");
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


    

$conn = null;
?>