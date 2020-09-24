<?php
require_once 'db_connect.php';
if (isset($_SESSION["id"])) 
{
  $Name=$Age=$Gender=$B_G="";
  $IDerr=$ID=$ID2="";
  if (isset($_POST['Search'])) 
  {
    $ID2=test_input($_POST["ID"]);
    if (empty($_POST["ID"])) 
    {
      $IDerr = "ID is required";
    }
    else if($ID2[0]!='P')
    {
      $IDerr="Please Enter Patient ID";
    } 
    else
    {
      $ID=test_input($_POST["ID"]);
    } 
    $_SESSION["DP_ID"]=$ID;
    if ($IDerr=="") 
    {
      $sql = "SELECT * FROM User WHERE U_ID='".$ID."'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0 ) 
      {
        $row = $result->fetch_assoc();
        $Name = $row['Name'];
        $Age = $row['Age'];
        $Gender = $row['Gender'];
        $B_G = $row['B_G'];
      } 
      else 
      {
        //echo "0 results";
        $IDerr="Invalid ID";
      }

      }
      $conn->close();
    }
 
}
else
{
  echo '<script type="text/javascript">window.location.href="Welcome.php";</script>';
}


function test_input($fun) 
{
  $fun = trim($fun);
  $fun = stripslashes($fun);
  $fun = htmlspecialchars($fun);
  return $fun;
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Patient Information</title>
  <link rel="stylesheet" href="css/All_registration.css">

  <style >
    .button 
  {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
  }

  .button1 
  {
    background-color: white; 
    color: black;  
  }
  .button1:hover 
  {
    background-color: #4CAF50;
    color: white;
  }
    .font_Size120per
    {
      font-size: 120%;
    }
  </style>
</head>
<body>


<!-- HTML -->

      <div class="pad_All" style="margin-left: 500px;">
        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">   
            <fieldset align="left" >
                  <div align="center" class="pad5px">
                    <label class="label">Patient ID</label>
                    :<input type="text" name="ID" value="<?php echo $ID2 ?>">
                    <button type="submit" class="button button1" name="Search">Search</button>
                  </div>

                  <div class="error pad5px" style="padding-left: 200px;">
                    <?php 
                      echo $IDerr;
                    ?>
                  </div>

                  <hr>

                  <div>
                    <fieldset>
                      <legend>Patient Information</legend>
                        <div >
                          <label class="label" style="padding-top: 5px;">Name</label>
                          : <?php echo $Name ?>
                        </div>
                        <hr>
                        <div >
                          <label class="label" style="padding-top: 5px;">Age</label>
                          : <?php echo $Age ?>
                        </div>
                        <hr>
                        <div >
                          <label class="label" style="padding-top: 5px;">Blood Group</label>
                          : <?php echo $B_G ?>
                        </div>
                        <hr>
                        <div >
                          <label class="label" style="padding-top: 5px;">Gender</label>
                          : <?php echo $Gender ?>
                        </div>
                    </fieldset>
                  </div>

                  <div align="center" style="padding-top: 10px;">
                     <button type="submit" class="button button1" name="Prescription">Prescription</button>
                      <button type="submit" class="button button1" name="Report">Test Report</button>
                  </div>

               </fieldset>
          </form>
        </div>  
        
   
</body>
</html>

<?php
  if(isset(($_POST['Prescription'])))
  {
    echo '<script type="text/javascript">window.location.href="Medicine.php";</script>';
  }
  if(isset(($_POST['Report'])))
  {
    echo '<script type="text/javascript">window.location.href="Test_Result_Doctor_final.php";</script>';
  }

?>

