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
        $sql = "INSERT INTO workspaces (wname,price_per_office,price_per_desk)
            VALUES ('".$_POST['wname']."', '".$_POST['price_per_office']."', '".$_POST['price_per_desk']."')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
            $_SESSION['reply'] = "Added Successfully";
        header("location:../package_details.php");
    }
    if(isset($_POST['update']))
         
    {
        $sql = "UPDATE workspaces SET wname='".$_POST['wname']."',
    price_per_office='".$_POST['price_per_office']."',
    price_per_desk='".$_POST['price_per_desk']."'
     WHERE id='".$_GET['edit_id']."'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
     $_SESSION['reply'] = "Updated Successfully";
        header("location:../package_details.php");
    }
    if(isset($_GET['id']))
    {
        $sql = "DELETE FROM workspaces WHERE id='".$_GET['id']."'";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Record deleted successfully";
             $_SESSION['reply'] = "Record deleted successfully";
        header("location:../package_details.php");
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


    

$conn = null;
?>