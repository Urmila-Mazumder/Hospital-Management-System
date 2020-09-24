<?php 
  if (isset($_SESSION["id"])) 
  {
    $P_ID = $_SESSION["id"];
  }
  else
  {
    echo '<script type="text/javascript">window.location.href="Welcome.php";</script>';
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Prescription Details</title>
    <link rel="stylesheet" href="css/All_registration.css">
</head>
<body>
<?php

$DOB="";
$day=$month=$year="";
$dayErr = $monthErr = $yearErr="";
$Connection_Error="";
$T_N=$M_N=$Dose="";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
 
  //------------------------Date--------------
  $flag_DOB = 0;
  $day=test_input($_POST["Day_"]);
  if(empty($day))
  {
    $dayErr= "Day is empty. ";
    $flag_DOB = 1;
  } 
  else 
  {
    $int = (int)$day; 
    if(!($int >= 1 and $int <= 31))
    {
      $dayErr = " Day Out Of Bound. " ;
      $flag_DOB = 1;
    }
  } 
  $month=test_input($_POST['Month_']);    
  if (empty($month))
  {
    $monthErr= "Month is empty. ";
    $flag_DOB = 1;
  } 
  else 
  {
    $int2 = (int)$month; 
    if(!($int2 >= 1 and $int2 <= 12))
    {
      $monthErr = " Month Out Of Bound. ";
      $flag_DOB = 1;
    }
  }  
  $year=test_input($_POST['Year_']);    
  if (empty($year))
  {
    $yearErr = "Year is empty. ";
    $flag_DOB = 1;
  } 
  else 
  {
    $int3 = (int)$year; 
    $cy = date("Y");
    $Current_Year = (int)$cy;
    if(!($int3 >= 1900 and $int3 <= $Current_Year))
    {
      $yearErr = " Year Out of Bound. ";
      $flag_DOB = 1;
    }
  } 
  if($flag_DOB != 1)
  {
    $DOB = $day.'-'.$month.'-'.$year;
  }
}

function test_input($fun) 
{
  $fun = trim($fun);
  $fun = stripslashes($fun);
  $fun = htmlspecialchars($fun);
  return $fun;
}
?>
<!-- ------------------------------------------------------------------------------------------------------>
<?php
require_once 'db_connect.php';

if(isset(($_POST['create'])))
{
 
  $sql = "SELECT * FROM prescription WHERE P_ID='".$P_ID."' AND  Date='".$DOB."'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {
    $row = $result->fetch_assoc();
    $T_N=$row["Test_Name"];
    $M_N=$row["Medicine_Name"];
    $Dose=$row["Dose"];
  } 
  else 
  {
    $Connection_Error = "No Prescription Found!!!";
  }

  $conn->close();  
}
?>
  <div align="center">
    <div align="center" class="ex1">
          <div class="pad_All">
          <!--padding: top right bottom left -->
          <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
            
            
            <fieldset align="left" style="width: 750px;height: auto;">
              
              <legend align="center" class="color_blue"><b>View Prescription</b></legend> 
                  <!-- ---------------patient id--------------------- -->
                  <div class="pad5px" style="float: left;">
                    <label class="label">Patient ID</label>: <label><?php echo $P_ID; ?></label>
                  </div>
                  <!--Prescribtion Date-->
                  <div class="pad5px" style="clear: both;"> 
                      <label class="label">Test Date</label> 
                      :<input type="text" value="<?php echo $day; ?>" name="Day_" size="3"> / 
                      <input type="text" value="<?php echo $month; ?>" name="Month_" size="3"> /
                      <input type="text" value="<?php echo $year; ?>" name="Year_" size="5">
                      <label class="error">*</label>
                      <label>(dd/mm/yyyy)</label>
                  </div>
                  <div class="pad_left135">
                    <span class="error"><?php echo $dayErr;?></span>
                    <label class="error">  </label> <span class="error"><?php echo $monthErr;?></span>
                    <label class="error">  </label> <span class="error"><?php echo $yearErr;?></span>
                  </div>
                 
                  <!-- button -->
                  <div class="pad_top20">
                    <input type="submit" name="create" value="Search">
                    <input type="Reset" value="Reset">
                  </div>
                  <!-- new field -->
                  <fieldset align="left" style="width: auto;height: auto;">
                  <legend align="center" class="color_blue"><b>Prescription</b></legend>
                  <div>
                  <div class="pad5px" style="float: left;">
                    <div class="error">
                      <?php echo $Connection_Error; ?> 
                    </div>
                    <label class="label">Test Name</label>: <label>
                      <?php if (empty($T_N))
                        {
                          echo "No Test";
                        } 
                        else
                        {
                          echo $T_N;
                        }
                      ?>
                        </label>
                    <br>
                  </div>
                   <div class="pad5px" style="float: left;clear: both;">
                    <label class="label">Medicine Name</label>: <label>
                      <?php if (empty($M_N)) 
                        {
                          echo "No Medicine Name";
                        } 
                        else
                        {
                          echo $M_N;
                        }
                      ?>
                        </label>
                    <br>
                  </div>
                  <div class="pad5px" style="float: left;clear: both;">
                    <label class="label">Dose</label>: <label>
                      <?php if (empty($Dose)) 
                        {
                          echo " ";
                        } 
                        else
                        {
                          echo $Dose;
                        }
                      ?>
                        </label>
                  </div>
                  </div>
                </fieldset>
                   
            </fieldset>
          </form>
        </div>  
    </div>
  </div>
</body>
</html>

