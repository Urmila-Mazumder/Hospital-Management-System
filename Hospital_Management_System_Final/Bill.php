<?php
    
    session_start();
    $id=$_SESSION["id"];
    $Date=$_SESSION["Date"];
    require_once 'db_connect.php';  

    $sql2 = "SELECT * FROM Bill WHERE P_ID='".$id."' and Date = '".$Date."'";
    $result = $conn->query($sql2);

    if ($result->num_rows > 0) 
    {
      $row = $result->fetch_assoc();
      $Total_Amount = $row['Total_Amount'];   
      $Fees= $row['D_Amount']; 

      $Total_Amount2 = $Total_Amount + $Fees;

     // echo $Total_Amount2;
    } 
    else 
    {
        echo '<script type="text/javascript">window.location.href="Bill_Page_Error.php";</script>';
    }

    $D=0;
    $sql = "UPDATE Bill SET Total_Amount='".$Total_Amount2."', D_Amount='".$D."' WHERE P_ID='".$id."' and Date = '".$Date."'";

    if ($conn->query($sql) === TRUE) 
    {
      echo '<script type="text/javascript">window.location.href="Bill_Page.php";</script>';
    } 
    else 
    {
      
    }

    $conn->close();

?>