<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="css/common.css">
   </head>
   <body>
   </body>
</html>
<?php  
if (isset($_SESSION["id"]) ) 
{
  require_once 'db_connect.php';
  $id=$_SESSION["id"];
  $cd = date("d-m-Y");
  $D_ID=$D_Name=$A_Date=$A_Time=$Fees=$Apperr=$Video_Link="";

  $sql = "SELECT * FROM Appointment WHERE P_ID='".$id."' and A_Date='".$cd."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) 
  {
    $row = $result->fetch_assoc(); 
    $D_ID=$row["D_ID"];
    $A_Date=$row["A_Date"];
    $A_Time=$row["A_Time"];
    $Fees=$row["Fees"]; 

    //===========================Doctor Name========================================================
    $sql2 = "SELECT Name FROM User WHERE U_ID='".$D_ID."' ";
    $result = $conn->query($sql2);

    if ($result->num_rows > 0) 
    {
      $row2 = $result->fetch_assoc(); 
      $D_Name=$row2["Name"];
    }
    //=============================================================================================

    //===========================Doctor Video Link========================================================
    $sql3 = "SELECT Video_Link FROM Doctor WHERE D_ID='".$D_ID."' ";
    $result = $conn->query($sql3);

    if ($result->num_rows > 0) 
    {
      $row3 = $result->fetch_assoc(); 
      $Video_Link=$row3["Video_Link"];
    }
    //=============================================================================================

    $Apperr="Appointed";  
  } 
  else 
  {
      $Apperr="No Appointment!!!!";
  }

  $conn->close();
}
else
{
  echo '<script type="text/javascript">window.location.href="Welcome.php";</script>';
}
   
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/All_registration.css">
   
</head>
<body>


<!-- HTML -->
  <div align="center">
    <div align="center" class="ex1">
      
          <div class="pad_All">
          <!--padding: top right bottom left -->
          <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
            
            
            <fieldset align="left" style="width: 550px;height: 360px;">
              
              <legend align="center" class="color_blue"><b>Appointment</b></legend>
               
                <div class="float_left"> 

                  <!-- D_Name -->
                  <div class="pad5px">
                    <label class="label">Doctor Name</label>
                    : Dr.<label >
                      <?php 
                        echo $D_Name;
                      ?>
                    </label> 
                  </div>

                  <hr>

                   <!-- Appointment Date -->
                  <div class="pad5px">
                    <label class="label">Appointment Date</label>
                    : <label >
                      <?php 
                        echo $A_Date;
                      ?>
                    </label> 
                  </div>

                  <hr>

                  <!-- Appointment Time -->
                  <div class="pad5px">
                    <label class="label">Appointment Time</label>
                    : <label >
                      <?php 
                        echo $A_Time;
                      ?>
                    </label> PM
                  </div>

                  <hr>

                  <!-- Doctor Fees -->
                  <div class="pad5px">
                    <label class="label">Doctor Fees</label>
                    : <label >
                      <?php 
                        echo $Fees;
                      ?>
                    </label> Taka
                  </div>

                    <hr>

                  <!-- Video Link-->
                  <div class="pad5px">
                    <label class="label">Video Link</label>
                    : <label >
                      <?php 
                        echo $Video_Link;
                      ?>
                    </label> 
                  </div>

                   <div class="pad5px">
                    <label style="color: red;" >
                      <?php 
                        echo "Save This Link to Communicate with the Doctor!!";
                      ?>
                    </label> 
                  </div>

            </fieldset>
          </form>
        </div>  
        
    </div>
  </div>
</body>
</html>