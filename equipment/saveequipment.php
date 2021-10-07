<?php
 session_start(); //we need session for the log in thingy XD 
 include("../functions.php");
 if($_SESSION['login']!==true){
     header('location:index.php');
 }

 

    include("../functions.php");
    $qty =test_input( $_POST['qty']);
    $unit = test_input($_POST['unit']);
    $description = test_input($_POST['description']);
    $itemcode = test_input($_POST['itemcode']);
    $fullname = $_SESSION['Fullname'];
    $Department = $_SESSION['Department'];
        foreach ($qty as $key => $value){
            $chkuserquery = "SELECT * FROM equipment_tbl where Item_Code = '".$itemcode[$key]."'";
            $result =mysqli_query($conn, $chkuserquery);
     
            if (!mysqli_num_rows($result))
            {
                $save = "INSERT INTO equipment_tbl(Qty,Unit,Description,Item_Code,CreatedBy,Department)VALUES
                ('".$value."','".$unit[$key]."','".$description[$key]."','".$itemcode[$key]."','".$fullname."','".$Department."')";
                $query = mysqli_query($conn, $save) ;
              echo "Successfully Saved!";
            }
            else{
                echo "<script>alert('Item Code '".$itemcode[$key]."' Already Exist')</script>";   

            }
     
        }

        function test_input($data)
        {
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;

        }

?>