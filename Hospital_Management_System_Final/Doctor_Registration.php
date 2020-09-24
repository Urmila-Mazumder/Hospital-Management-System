<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="css/All_registration.css"> 
</head>
<body>
<?php
$Mobile_No1="";
$id=$_SESSION["id"];
$nameErr = $dayErr = $monthErr = $yearErr  = $genderErr = $B_GErr = $degErr = $feesErr = $TimeErr = "";
$name = $DOB = $GENDER = $Blood_G = $Degree = $Fees = $Time = $Time2= "";

$Present_Add_Error=$Permanent_Add_Error=$Mail_Error=$Mobile_No_Error=$Telephone_No_Error ="";
$Present_Add = $Permanent_Add = $Mail = $Mobile_No = $Telephone_No = "";

$User_name_Error=$Pass_Error=$Confirm_Pass_Error="";
$User_name = $Pass = $Confirm_Pass = "";

$DataBase="";

$image=$Upload=" ";

$name1=$day=$month=$year=$Blood_G=$Present_Add= $Permanent_Add= $Mail =$Mobile_No=$Telephone_No1= $User_name=$Pass1= $Age = "";

$Img_Err = " ";
$ID="";
//-----------------------------Image Upload-------------------------------
if (isset($_POST['create'])) 
  {
    $permited  = array('jpg', 'jpeg', 'png');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;

    if (empty($file_name)) 
    {
      $Img_Err = "Please Select an Image !";
    }
    elseif ($file_size > 1048576) 
    {
      $Img_Err = "Image Size should be less then 1MB!";
    } 
    elseif (in_array($file_ext, $permited) === false) 
    {
      $Img_Err = "You can upload only:-".implode(', ', $permited) ;
    } 
    else
    {
      // move_uploaded_file($file_temp, $uploaded_image);
    }
  } 
//-----------------------------------------------------------------------

//-------------Name
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $flag_name =0;
  $name1 = test_input($_POST["name1"]);
  if (empty($_POST["name1"])) 
  {
    $nameErr = "Name is required";
    $flag_name = 1;
  } 

 else 
  {
    $arr1 = str_split($name1);
    if($arr1[0] == '.')
    {
      $nameErr= "Must start with a letter";
      $flag_name = 1;
    }
    else
    {
      if(strlen($name1) >= 2)
      {
        if (!preg_match("/^[a-zA-Z . ]*$/",$name1)) 
        {
          $nameErr = "Only Can contain a-z, A-Z, period only";
          $flag_name = 1;
        }
      }
      else
      {
        $nameErr= "You have to give atleast 2 characters"; 
        $flag_name = 1;
      }
    }
    if($flag_name != 1)
    {
      $name = test_input($_POST["name1"]);
      //echo $name;
    }
  }

  //------------------------DOB--------------
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
    $Age =$Current_Year - $int3; 
    //echo $Age; 
    //echo $DOB;
  }
  //-----------Gender----------------
  if(empty($_POST["GENDER_"])) 
  {
    $genderErr = "Gender can not be Empty";
  }
  else
  {
    $GENDER = $_POST["GENDER_"];
    //echo $GENDER;
  }
  //-----------Blood Group--------------
  if(empty($_POST["B_G_"]))
  {
    $B_GErr= "Blood Group can not be empty. ";
  }
  else
  {
    $Blood_G = $_POST["B_G_"];
    //echo $Blood_G;
  }
  //---------------Degree------------
  if(empty($_POST["degree"])) 
  {
    $degErr = "Degree can not be Empty";
  }
  else
  {
    $Degree = $_POST["degree"];
    //echo $Degree;
  }
  //-----------Fees--------------
  if(empty($_POST["fees"]))
  {
    $feesErr= "Fees can not be empty. ";
  }
  else
  {
    $Fees = $_POST["fees"];
    //echo $Fees;
  }

  //-----------Appoint Time--------------
  if(empty($_POST["time"]))
  {
    $TimeErr= "Appoint Time can not be empty. ";
  }
  else
  {
    $Time = $_POST["time"];
    //echo $Time;
    $Time2=$Time." "."PM";
  }
  //---------------------------contact---------------------------
  //------Present Address
  if (empty($_POST["pr_add"])) 
  {
    $Present_Add_Error = "Present Address is required";
  }
  else
  {
    $Present_Add = $_POST["pr_add"];
   // echo $Present_Add;
  }
  //------Permanent Address
  if (empty($_POST["pe_add"])) 
  {
    $Permanent_Add_Error = "Permanent Address is required";
  }
  else
  {
    $Permanent_Add = $_POST["pe_add"];
    //echo $Permanent_Add;
  }
  //------------Email
  if (empty($_POST["mail"])) 
  {
    $Mail_Error = "Mail is required";
  }
  else 
  {
    if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) 
    {
      $Mail_Error = "Invalid email format";
    }
    else//output mail
    {
      $Mail = $_POST["mail"];
    }
  }

  //------------Mobile No.
  $Mobile_No1 = $_POST["m_no"];
  if (empty($_POST["m_no"])) 
  {
    $Mobile_No_Error = "Mobile number is required";
    $flag_mob = 1;
  }

  else
  {
    $mob = str_split($Mobile_No1 );
    if(strlen($Mobile_No1) != 11)
    {
      $Mobile_No_Error= "Mobile Number must contain 11 digits"; 
    }
    else if (!preg_match('/^[0-9]{11}+$/', $Mobile_No1)) 
    {  
      $Mobile_No_Error = "Invalid mobile number"; 
    }
    else
    {
      $Mobile_No = $_POST["m_no"];
      //echo $Mobile_No;
    }
  } 
    //---------------Telephone--
  $Telephone_No1 = $_POST["t_no"];
  if(empty($_POST["t_no"])) 
  {
    
  }
  else
  {
    if(strlen($_POST["t_no"]) != 8)
    {
      $Telephone_No_Error = "* Invalid telephone number";
    }
    else if (!preg_match('/^[0-9]{8}+$/', $Telephone_No1)) 
    {  
      $Telephone_No_Error = "* Invalid mobile number"; 
    }
    else
    {
      $Telephone_No = $_POST["t_no"];
      //echo $Telephone_No;
    }
  }
    
//-------------------------------login information-----------
  //------------User Name----------------------------


  if (empty($_POST["u_nam"])) 
  {
    $User_name_Error = "User name is required";
  } 
  else
  {
    $User_name = $_POST["u_nam"];
    //echo $User_name;
  }
  //--------------Password-------------

  $Pass1 = $_POST["pass"];
  $pc=0;
  if (empty($_POST["pass"])) 
  {
    $Pass_Error = "Password is required";
    $pc=1;
  }
  $Confirm_Pass = $_POST["c_pass"];
  
  if (empty($_POST["c_pass"])) 
  {
    $Confirm_Pass_Error = "Confirm Password is required";
    $pc =1;
  }
  
  if (($Pass1 != $Confirm_Pass)&&($pc != 1))
  {
    $Confirm_Pass_Error = "Confirm Password doesnot match";
  } 
  else if(($Pass1 == $Confirm_Pass)&&($pc != 1))
  {
    $Pass = $_POST["pass"];
    //echo $Pass;
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

<?php
require_once 'db_connect.php';

//--------------------Doctor ID Genarate--------------------


$sql0 = "SELECT D_ID FROM Doctor ORDER BY D_ID DESC LIMIT 1";
$result = $conn->query($sql0);

if ($result->num_rows > 0) 
{
    $row = $result->fetch_assoc();
    $A = $row['D_ID'];

    for ($i=2; $i < strlen($A) ; $i++) 
    { 
        $ID1[$i]= $A[$i];
    }
    $ID2=implode("",$ID1);

    //echo $ID2;
    $ID2=$ID2+1;  

    $ID = "D_".$ID2; 
    //echo $ID;
    $_SESSION["ID1"]=$ID;
} 

//---------------------Username Check------------------------

$sql1 = "SELECT * FROM User WHERE User_Name='".$User_name."'";
$result = $conn->query($sql1);
if ($result->num_rows > 0) 
{
  $User_name_Error = "Username Already Used";
} 

//----------------------------Data Insert (User)------------------------
if(isset(($_POST['create'])) )
{
  //-------------------------------Time Generate-------------------
  if(empty($_POST['time']))
  {

  }
  else
  {
    $s=$Time;
    $a = array();
    $z = array();

    for ($i=0; $i < (strlen($s)/2)-1; $i++) 
    { 
      $a[$i]=$s[$i];
    }
    // print_r($a) ;
    // echo "<br>";
    // for ($i=7; $i < strlen($s); $i++) 
    // { 
    //   $z[$i]=$s[$i];
    // }
    //print_r($z) ;
    $i=0;
    while ($i < 8) 
    {
      if($a[3] == '0')
      {
        $b=$a[0].$a[1].$a[2].'3'.'0';
      }
      // print_r($b);
      if($a[3] == '3')
      {
        $b=$a[0].$a[1];
        $c=((int)$b)%12+1;
        if(strlen($c)<2)
        {
          $b='0'.$c.'.'.'0'.'0';
        }
        else
        {
          $b=$c.'.'.'0'.'0';
        }
      }
      $T[$i] = implode("",$a).'-'.$b;
      $a = str_split($b);
      $i++;
    }
    // for ($i=0; $i < 8; $i++) 
    // { 
    //   echo $T[$i];
    //   echo "<br>";
    // }
  }
  //---------------------------------------------------------------
  if(($name != "")and ($nameErr == "") and($dayErr == "")and($monthErr == "")and($yearErr == "")and($genderErr == "")and($B_GErr == "") and ($degErr == "") and ($feesErr == "") and($Present_Add_Error == "")and($Permanent_Add_Error == "")and($Mail_Error == "")and($Mobile_No_Error == "")and($User_name_Error == "")and($Pass_Error == "")and($Confirm_Pass_Error == ""))
  {
     $sql2 = "INSERT INTO User(U_ID,Name, DOB, Gender, B_G, Age, Pre_Add, Per_Add, Email, Mobile, Telephone, Photo, User_Name, Password)
    VALUES ('$ID','$name', '$DOB', '$GENDER', '$Blood_G', '$Age', '$Present_Add', '$Permanent_Add', '$Mail', '$Mobile_No', '$Telephone_No', '$uploaded_image','$User_name', '$Pass')";


    if ($conn->query($sql2) === TRUE) 
    {
      move_uploaded_file($file_temp, $uploaded_image);
      $_SESSION["DataBase"] = "New record created successfully";
      $_SESSION["User"] = $User_name;
    } 
    else 
    {
      $DataBase= "Error: " . $sql2 . "<br>" . $conn->error;
    }

    //----------------------------Data Insert (Doctor)------------------------
    $sql3 = "INSERT INTO Doctor(D_ID, Video_Link, App_ID, Degree, Fees, ATime, A_ID)
    VALUES ('$ID', 'None', '1', '$Degree', '$Fees','$Time2','$id')";

    if ($conn->query($sql3) === TRUE) 
    {
      $DataBase = "New record2 created successfully";
    } 
    else 
    {
      $DataBase= "Error: " . $sql3 . "<br>" . $conn->error;
    }

    //----------------------------Data Insert (Appoint Time)------------------------
    $cy = date("d-m-Y");
    $sql3 = "INSERT INTO Appoint_Time(D_ID,T1 ,S1 ,T2 ,S2 ,T3 ,S3 ,T4 ,S4 ,T5 ,S5 ,T6 ,S6 ,T7 ,S7 ,T8 ,S8, A_Date)
    VALUES ('$ID', '$T[0]', '0', '$T[1]', '0', '$T[2]', '0', '$T[3]', '0', '$T[4]', '0', '$T[5]', '0', '$T[6]', '0', '$T[7]', '0', '$cy')";

    if ($conn->query($sql3) === TRUE) 
    {
      $DataBase = "New record2 created successfully";
    } 
    else 
    {
      $DataBase= "Error: " . $sql3 . "<br>" . $conn->error;
    }

    $conn->close();
  }
}
?>

<!-- Regisration.php -->


  <div align="center">
      <?php
      if (empty($DataBase)) 
      {
        # code...
      }
      else
        echo '<script type="text/javascript">window.location.href="ID.php";</script>';
       // include 'ID.php';
     ?>
    <div align="center" class="ex1">
          <div class="pad_All">
          <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
            
            
            <fieldset align="left" class="width750_height910_Dctr" style="height: 1010px">
              
              <legend align="center" class="color_blue"><b>DOCTOR REGISTRATION</b></legend>
                <fieldset>
                  <legend>Personal Information</legend>
                <div class="float_left"> 

                  <div class="pad5px">
                    <label class="label">Name</label>
                    :<input type="text" name="name1" value="<?php echo $name1; ?>" size="50" class="width290">
                    <label class="error">*</label>
                  </div>
                  <div class="pad_left135">
                    <span class="error"><?php echo $nameErr;?></span>
                  </div>
                  <hr>

                  <!--Date of Birth-->
                  <div class="pad5px"> 
                      <label class="label">Date of Birth</label> 
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
                  <!--Gender-->
                  <div class="pad5px">

                      <label class="label">Gender</label>

                      :<input type="radio" name="GENDER_"<?php if($GENDER=="Male") {echo "checked";}?> value="Male" ><label>Male </label>

                      <input type="radio" name="GENDER_" <?php if($GENDER=="Female") {echo "checked";}?> value="Female" ><label>Female </label>

                      <input type="radio" name="GENDER_" <?php if($GENDER=="Other") {echo "checked";}?> value="Other" ><label>Other </label>

                      <label class="error">*</label>

                  </div> 
                  <div class="pad_left135">
                    <span class="error"><?php echo $genderErr;?></span>
                  </div> 
                  <hr>  
                  
                  <div class="pad5px">  
                      <label class="label">Blood Group</label>
                      :<select name="B_G_" value="<?php echo $Blood_G; ?>" class = "width35per">
                      <option value=""></option>
                      <option value="A+" <?php if ($Blood_G == 'A+') echo ' selected="selected"'; ?>>A+</option>
                      <option value="A-" <?php if ($Blood_G == 'A-') echo ' selected="selected"'; ?>>A-</option>
                      <option value="B+" <?php if ($Blood_G == 'B+') echo ' selected="selected"'; ?>>B+</option>
                      <option value="B-" <?php if ($Blood_G == 'B-') echo ' selected="selected"'; ?>>B-</option>
                      <option value="O+" <?php if ($Blood_G == 'O+') echo ' selected="selected"'; ?>>O+</option>
                      <option value="O-" <?php if ($Blood_G == 'O-') echo ' selected="selected"'; ?>>O-</option>
                      <option value="AB+" <?php if ($Blood_G == 'AB+') echo ' selected="selected"'; ?>>AB+</option>
                      <option value="AB-" <?php if ($Blood_G == 'AB-') echo ' selected="selected"'; ?>>AB-</option>
                      </select>
                      <label class="error">*</label>
                  </div>

                  <div class="pad_left135">
                    <span class="error"><?php echo $B_GErr;?></span>
                  </div> 
                  <hr>

                    <div class="pad5px">
                    <label class="label">Degree</label>
                    :<input type="text" name="degree" value="<?php echo $Degree; ?>" size="50" class="width290">
                    <label class="error">*</label>
                  </div>
                  <div class="pad_left135">
                    <span class="error"><?php echo $degErr;?></span>
                  </div>
                  <hr>

                  <div class="pad5px">  
                      <label class="label">Fees</label>
                      :<select name="fees" value="<?php echo $Fees; ?>" class = "width35per">
                      <option value=""></option>
                      <option value="500" <?php if ($Fees == '500') echo ' selected="selected"'; ?>>500</option>
                      <option value="1000" <?php if ($Fees == '1000') echo ' selected="selected"'; ?>>1000</option>
                      <option value="1500" <?php if ($Fees == '1500') echo ' selected="selected"'; ?>>1500</option>
                      <option value="2000" <?php if ($Fees == '2000') echo ' selected="selected"'; ?>>2000</option>
                      </select>
                      <label class="error">*</label>
                  </div>
                  <div class="pad_left135">
                        <span class="error"><?php echo $feesErr;?></span>
                      </div> 
                  <hr>
                    <!-------------------------------------------------------->
                   <div class="pad5px">  
                      <label class="label">Appointment Time</label>
                      :<select name="time" value="<?php echo $Time; ?>" class = "width35per">
                      <option value=""></option>
                      <option value="12.00-04.00" <?php if ($Time == '12.00-04.00') echo ' selected="selected"'; ?>>12.00-04.00</option>
                      <option value="04.00-08.00" <?php if ($Time == '04.00-08.00') echo ' selected="selected"'; ?>>04.00-08.00</option>
                      <option value="08.00-12.00" <?php if ($Time == '08.00-12.00') echo ' selected="selected"'; ?>>08.00-12.00</option>
                      </select>
                      <label>PM</label> <label class="error">*</label>
                  </div>

                      <div class="pad_left135">
                        <span class="error"><?php echo $TimeErr;?></span>
                      </div> 
                    </div>
                  
                <div class="float_right_width200">
                  <div class="pad5px">
                      <svg width="8em" height="8em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor"   xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      </svg>
                  </div>
                  <div class="pad5px">
                      <input type="file" value="<!-- <?php $file_name ?> -->" name="image" > 
                  </div>
                  <div>
                    <?php echo $Img_Err; ?>
                  </div>
                </div>

                
                </fieldset>
                <!-- ---------------------------------------------- -->
                <fieldset>
    
                    <legend>Contact Information</legend>
                    
                    <div class="pad5px">
                      <label class="label">Present Address</label>
                      :<input type="text" name="pr_add" value="<?php echo $Present_Add; ?>" size="50" class="width290"><label class="error">*</label>
                      <span class="error"><?php echo $Present_Add_Error;?></span>
                    </div>
                    <hr>

                    <div class="pad5px">
                      <label class="label">Permanent Address</label>
                      :<input type="text" name="pe_add" value="<?php echo  $Permanent_Add; ?>" size="50" class="width290"><label class="error">*</label>
                      <span class="error"><?php echo $Permanent_Add_Error;?></span>
                    </div>
                    <hr>

                    <div class="pad5px">
                      <label class="label">Email</label>
                      :<input type="text" name="mail" value="<?php echo   $Mail ; ?>" size="50" class="width290"><label class="error">*</label>
                      <span class="error"><?php echo $Mail_Error;?></span>
                    </div>
                    <hr>

                    <div class="pad5px">
                      <label class="label">Mobile No</label>
                      :<input type="text" name="m_no" value="<?php echo   $Mobile_No1 ; ?>" size="50" class="width290"><label class="error">*</label>
                      <span class="error"><?php echo $Mobile_No_Error;?></span>
                    </div>
                    <hr>

                    <div class="pad5px">
                      <label class="label">Telephone No</label>
                      :<input type="text" name="t_no" value="<?php echo   $Telephone_No1 ; ?>" size="50" class="width290">
                      <span class="error"><?php echo $Telephone_No_Error;?></span>
                    </div>
            </fieldset>
            <fieldset>
    
              <legend>Login Information</legend>
              
              <div class="pad5px">
                <label class="label">User Name</label>
                :<input type="text" name="u_nam" value="<?php echo    $User_name; ?>" size="50" class="width290"><label class="error">*</label>
                <span class="error"><?php echo $User_name_Error;?></span>
              </div>
              <hr>

              <div class="pad5px">
                <label class="label">Password</label>
                :<input type="Password" name="pass" value="<?php echo    $Pass1; ?>" size="50" class="width290"><label class="error">*</label>
                <span class="error"><?php echo $Pass_Error;?></span>
              </div>
              <hr>

              <div class="pad5px">
                <label class="label">Confirm Password</label>
                :<input type="Password" name="c_pass" value="<?php echo    $Confirm_Pass; ?>" size="50" class="width290"><label class="error">*</label>
                <span class="error"><?php echo $Confirm_Pass_Error;?></span>
              </div>

            </fieldset>
            <div class="pad_top20">
              <input type="submit" name="create">
              <input type="reset" value="Reset">
            </div>

             <div class="pad_top20">
              <?php echo $DataBase; ?>
            </div>
            </fieldset>
          </form>
        </div>  
    </div>
  </div>




</body>
</html>

