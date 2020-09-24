<?php session_start();?>
<?php

$S=$_SESSION["S"];
$D_ID = $_SESSION["D_ID"];
$P_ID=$_SESSION["id"];
$T=$_SESSION["T"];

?>

<!DOCTYPE html>
<html>
<head>
  <title>Appointment Confirmation</title>
</head>
<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
  <div align="center" style="margin-top: 200px;">
    <fieldset style="width: 40%;height: 100px">
      <div>Are you want to take this Appointment?</div>
      <div style="padding: 10px;"><?php echo $T ; ?> PM</div>
      <div style="padding: 15px;">
        <input type="submit" name = "Yes" value="Yes">
        <input type="submit" name = "No" value="No">
      </div>
    </fieldset>
  </div>
  </form>
</body>
</html>
<?php
  if (isset($_POST['Yes'])) 
  { 
    $cd = date("d-m-Y");
    require_once 'db_connect.php';
    //----------------------------Patient ----------------------------------------------
    $sql1 = "SELECT Name FROM User WHERE U_ID='".$P_ID."'";
    $result = $conn->query($sql1);

    if ($result->num_rows > 0) 
    {
        $row = $result->fetch_assoc();
    } 
    else 
    {
        echo "0 results";
    }

    //----------------------------Doctor ----------------------------------------------
    $sql2 = "SELECT * FROM Doctor WHERE D_ID='".$D_ID."'";
    $result = $conn->query($sql2);

    if ($result->num_rows > 0) 
    {
        $row2 = $result->fetch_assoc();
        $Fees=$row2["Fees"];
    } 
    else 
    {
        echo "0 results";
    }
    //----------------------Appointment Time-------------------------------------
    
    $sql = "UPDATE Appoint_Time SET  $S= '".$row['Name']."' WHERE D_ID='".$D_ID."'";

    if ($conn->query($sql) === TRUE) 
    {
    }

    //---------------------Insert Into appointment--------------------- 
    $sql3 = "INSERT INTO appointment(D_ID,P_ID, A_Date, A_Time, Fees)
    VALUES ('$D_ID','$P_ID', '$cd', '$T', '$Fees')";
    if ($conn->query($sql3) === TRUE) 
    {
      
    } 
    else 
    {
      $DataBase= "Error: " . $sql3 . "<br>" . $conn->error;
    }

    //======================================================================================================

    //==========================================App_ID=======================================

    $sql11 = "SELECT App_ID FROM appointment ORDER BY App_ID DESC LIMIT 1";
    $result = $conn->query($sql11);

    if ($result->num_rows > 0) 
    {
        $row11 = $result->fetch_assoc();
        $A = $row11['App_ID'];
        //$A22=$A+1;
        //echo $A;
    } 
    //======================================================================================================

    //===============================Update Patient Table App_ID============================================

    $sql22 = "UPDATE patient SET App_ID='".$A."' WHERE P_ID='".$P_ID."'";

    if ($conn->query($sql22) === TRUE) 
    {
      
    } 
    else 
    {
      $Up_Error = "Error updating record: " . $conn->error;
    }

    //====================================================================================================== 

    //===================================Bill Update========================================================
    $sql44 = "UPDATE Bill SET Date='".$cd."', D_Amount='".$Fees."' WHERE P_ID='".$P_ID."'";

    if ($conn->query($sql44) === TRUE) 
    {
      
    } 
    else 
    {
      $Up_Error = "Error updating record: " . $conn->error;
    }

    $conn->close();

    //======================================================================================================

    echo '<script type="text/javascript">window.location.href="Patient_Page.php";</script>';
  }

  if (isset($_POST['No'])) 
  {
    echo '<script type="text/javascript">window.location.href="Appoint_Time_final.php";</script>';
  }
?>
