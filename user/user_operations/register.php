
            
<?php
include"config.php";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    if(isset($_POST['submit']))
       
    {

        $file_name=$_FILES['photo']['name'];
        $file_type=$_FILES['photo']['type'];
        $file_size=$_FILES['photo']['size'];
        $file_tem_loc=$_FILES['photo']['tmp_name'];
        $file_store="../../admin/img/".$file_name;
         if (move_uploaded_file($file_tem_loc, $file_store)){

            echo "File Uploaded Successfully";
        } 

            function createSalt()
             {
               return '2123293dsj2hu2nikhiljdsd';
             }
         $passw = hash('sha256', $_POST['val-password']);
         $salt = createSalt();
         $pass = hash('sha256', $salt . $passw);   
        echo $sql = "INSERT INTO clients(name, email, password,confirm,state_name,mobile,address,photo)
            VALUES ('".$_POST['val-username']."','".$_POST['val-email']."', '".$pass."','".$pass."','".$_POST['state_name']."','".$_POST['val-digits']."','".$_POST['val-suggestions']."','".$file_name."')";
            // use exec() because no results are returned
            $conn->exec($sql);

           
                // if ($pass != $_POST['val-confirm-password'])
                //  {
                //    echo("Error... Passwords do not match");
                //  }
 

              //echo "<pre>";print_r($conn);exit;
           $_SESSION['success']=' Record Added Successfully.....';
            // $_SESSION['reply'] = "Added Successfully";
        header("location:../page-login.php");
    //     $password=sha1($_POST['password']);
    //      echo $sql = "INSERT INTO clients (uname, email, password, contact)
    //  VALUES ('".$_POST['uname']."','".$_POST['email']."','".$_POST['password']."','".$_POST['contact']."')";

    //         $conn->exec($sql);
    //          echo "string"; exit;
    //         echo "New record created successfully";
    //         $_SESSION['reply'] = "Added Successfully";
    //         header("location:../page_register.php");
    }
    
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


    

$conn = null;
?> 