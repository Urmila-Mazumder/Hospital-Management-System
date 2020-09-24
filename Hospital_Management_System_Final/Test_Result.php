<?php 
  if (isset($_SESSION["id"])) 
  {
  }
  else
  {
    echo '<script type="text/javascript">window.location.href="Welcome.php";</script>';
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Test Result</title>
   <link rel="stylesheet" href="css/All_registration.css">
</head>
<body>
<?php
$id=$_SESSION["id"];
$Tname1=$Pid1="";
$Pid=$Tname=$T_amount="";
$Pid_Error=$Tname_Error=$T_amount_Error="";
$DOB="";
$day=$month=$year="";
$dayErr = $monthErr = $yearErr="";
$image=$Upload=" ";
$Img_Err = " ";
$DataBase="";
$Connection_Error="";


//-------------ID--------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $flag_name = 0;
  $Pid1 = test_input($_POST["pid"]);
  if (empty($_POST["pid"])) 
  {
    $Pid_Error = "Patient ID is required";
    $flag_name = 1;
  } 

 else 
  {
    $arr1 = str_split($Pid1);
    if($arr1[0] != 'P' || $arr1[1] != '_' )
    {
      $Pid_Error= "Invalid Patient ID!!!";
      $flag_name = 1;
    }
    if(strlen($Pid1) != 8)
    {
      $Pid_Error= "You have to give atleast 10 characters"; 
      $flag_name = 1;
    }
    
    if($flag_name != 1)
    {
      $Pid = test_input($_POST["pid"]);
      //echo $name;
    }
  }
  //----------------------test name-------------------
  $Tname1 = $_POST["tname"];
  if (empty($_POST["tname"])) 
  {
    $Tname_Error = "Test name is required";
  } 
  else
  {
    $Tname = test_input($_POST["tname"]);
  }

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

//----------------------------Data Insert (Testing_Section)------------------------
if(isset(($_POST['create'])))
{
 
  $sql = "SELECT Result FROM testing_section WHERE P_ID='".$Pid."' AND T_Name= '".$Tname."' AND T_Date='".$DOB."'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {
    $row = $result->fetch_assoc();

  } 
  else 
  {
    $Connection_Error = "No results found!!!";
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
              
              <legend align="center" class="color_blue"><b>Test Report</b></legend> 
                  <!-- ---------------patient id--------------------- -->
                  <div class="pad5px" style="float: left;">
                    <label class="label">Patient ID</label>
                    :<input type="text" name="pid" value="<?php echo $Pid1; ?>" size="50" style="width:150px;">
                    <label class="error">*</label>
                  </div>
                  <!-- -----------------Test name--------------------------- -->
                  <div class="pad5px" style="float: left;padding-left: 70px">
                    <label class="label">Test Name</label>
                    :<input type="text" name="tname" value="<?php echo $Tname1; ?>" size="50" style="width:150px;">
                    <label class="error">*</label>
                  </div>
                  <!-- ---------------patient id error--------------------- -->
                  <div class="pad5px" style="float: left; clear: both;padding-left: 140px">
                    <span class="error"><?php echo $Pid_Error;?></span>
                  </div>
                  <!-- -----------------Test name error--------------------------- -->
                  <div class="pad5px" style="float: left;padding-left: 220px">
                    <span class="error"><?php echo $Tname_Error;?></span>
                  </div>
                  <!--Test date-->
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
                    <input type="reset" value="Reset">
                  </div>
                  <!-- new field -->
                  <fieldset align="left" style="width: auto;height: auto;">
                  <legend align="center" class="color_blue"><b>Test Result</b></legend>
                  <!-- -----------------Coonection name error--------------------------- -->
                  <div class="pad5px" style="float: left;padding-left: 300px">
                    <span class="error"><?php echo $Connection_Error;?></span>
                  </div> 
                  <!-- test photo -->
                  <div  style="float: left;width: 600px;height: 400px; padding-left: 40px;padding-bottom: 10px">
                    <img src="<?php echo $row["Result"]; ?>" style="height: 390px;width: 610px;">
                  </div>
                   
                </fieldset>
                   
            </fieldset>
          </form>
        </div>  
    </div>
  </div>




</body>
</html>

