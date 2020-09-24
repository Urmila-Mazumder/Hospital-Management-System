<!DOCTYPE html>
<html>
<head>
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
//-----------------------------Image Upload-------------------------------
if (isset($_POST['create'])) 
  {
  	$Flag = 1;
    $permited  = array('jpg', 'jpeg', 'png');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "Test_Report/".$unique_image;

    if (empty($file_name)) 
    {
      $Img_Err = "Please Select an Image !";
      $Flag = 0;
    }
    elseif ($file_size > 1048576) 
    {
      $Img_Err = "Image Size should be less then 1MB!";
      $Flag = 0;
    } 
    elseif (in_array($file_ext, $permited) === false) 
    {
      $Img_Err = "You can upload only:-".implode(', ', $permited) ;
      $Flag = 0;
    } 
    else
    {
      // move_uploaded_file($file_temp, $uploaded_image);
    }
  } 
//-----------------------------------------------------------------------

//-------------ID
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
  //-----------Total amount----------------
  $flag_name2 = 0;
  $T_amount1 = test_input($_POST["t_amount"]);
  if (empty($_POST["t_amount"])) 
  {
    $T_amount_Error = "Total amount is required";
    $flag_name2 = 1;
  } 

 else 
  {
    $arr1 = str_split($T_amount1);
    if($arr1[0] == '.')
    {
      $T_amount_Error= "Invalid amount!!!";
      $flag_name2 = 1;
    }
    else
    {
       if (!preg_match('/^[0-9]*$/', $T_amount1)) 
        {
          $T_amount_Error = "Invalid Amount!!!";
          $flag_name2 = 1;
        }
    }
    if($flag_name2 != 1)
    {
      $T_amount = test_input($_POST["t_amount"]);
      //echo $name;
    }
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

//--------------------Receptionist ID Genarate--------------------


$sql0 = "SELECT T_ID FROM testing_section ORDER BY T_ID DESC LIMIT 1";
$result = $conn->query($sql0);

if ($result->num_rows > 0) 
{
    $row = $result->fetch_assoc();
    $T = $row['T_ID'];
} 

//----------------------------Data Insert (Testing_Section)------------------------
if(isset(($_POST['create'])))
{
  if(($Pid!="")and($Pid_Error == "") and($dayErr == "")and($monthErr == "")and($yearErr == "")and($Tname_Error == "")and($T_amount_Error == "")and($Flag == 1))
  {
    $sql2 = "INSERT INTO Testing_Section(T_Name, T_Date, Result, T_Amount, P_ID)
    VALUES ('$Tname','$DOB', '$uploaded_image', '$T_amount', '$Pid')";

    if ($conn->query($sql2) === TRUE) 
    {
      move_uploaded_file($file_temp, $uploaded_image);
      $DataBase = "New record created successfully";
    } 
    else 
    {
      $DataBase= "Error: " . $sql2 . "<br>" . $conn->error;
    }

    $conn->close();
  }
}
?>
  <div align="center">
    <div align="center" class="ex1">
          <div class="pad_All">
          <!--padding: top right bottom left -->
          <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
            
            
            <fieldset align="left" style="width: 750px;height: 380px;">
              
              <legend align="center" class="color_blue"><b>Upload Test Report</b></legend>
                <div class="float_left"> 
                  <!-- ---------------patient id--------------------- -->
                  <div class="pad5px">
                    <label class="label">Patient ID</label>
                    :<input type="text" name="pid" value="<?php echo $Pid1; ?>" size="50" class="width290">
                    <label class="error">*</label>
                  </div>
                  <div class="pad_left135">
                    <span class="error"><?php echo $Pid_Error;?></span>
                  </div>
                  <hr>
                  <!-- -----------------Test name--------------------------- -->
                  <div class="pad5px">
                    <label class="label">Test Name</label>
                    :<input type="text" name="tname" value="<?php echo $Tname1; ?>" size="50" class="width290">
                    <label class="error">*</label>
                  </div>
                  <div class="pad_left135">
                    <span class="error"><?php echo $Tname_Error;?></span>
                  </div>
                  <hr>
                  <!--Date of Birth-->
                  <div class="pad5px"> 
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
                   <hr>
                  <!--Total amount-->
                 <div class="pad5px">
                    <label class="label">Total amount</label>
                    :<input type="text" name="t_amount" value="<?php echo $T_amount; ?>" size="50" class="width290">
                    <label class="error">*</label>
                  </div>
                  <div class="pad_left135">
                    <span class="error"><?php echo $T_amount_Error;?></span>
                  </div>
                  <!-- button -->
                  <hr>  

                  <div class="pad_top20">
                    <input type="submit" name="create">
                    <input type="reset" value="Reset">
                  </div>
                   <div class="pad_top20">
                       <span><?php echo $DataBase; ?></span>
                   </div>
                </div>

                <div class="float_right_width200">
                    <div class="pad5px">
                        <svg width="8em" height="8em" viewBox="0 0 16 16" class="bi bi-images" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            					  <path fill-rule="evenodd" d="M12.002 4h-10a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1zm-10-1a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-10zm4 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
            					  <path fill-rule="evenodd" d="M4 2h10a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1v1a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2h1a1 1 0 0 1 1-1z"/>
            					  </svg>
                    </div>
                    <div class="pad5px">
                        <input type="file" value="<!-- <?php $file_name ?> -->" name="image" > 
                    </div>
                    <div class="pad5px">
                       <span class="error"><?php echo $Img_Err; ?></span>
                    </div>
                </div>
            </fieldset>
          </form>
        </div>  
    </div>
  </div>




</body>
</html>

