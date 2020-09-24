<?php
require_once 'db_connect.php';

if (isset($_SESSION["id"])) 
{
  //$id=$_SESSION["id"];
  $D_ID = $_SESSION["D_ID"];
  $sql = "SELECT * FROM Appoint_Time WHERE D_ID='".$D_ID."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0 ) 
  {
    $row = $result->fetch_assoc(); 
  } 
  else 
  {
      echo "0 results";
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
            
            
            <fieldset align="left" style="width: 400px;height: 500px;">
              
              <legend align="center" class="color_blue"><b>Time</b></legend>
               
                <div class="float_left"> 
                  <!-- T1 -->
                  <div class="pad5px">
                    <label class="label">Time 1</label>
                    :<label >
                      <?php 
                        echo $row["T1"];
                      ?>
                    </label> PM
                    <input type="submit" value="Take" name="create1"<?php if ($row["S1"] != "0"){ ?> disabled <?php   } ?> >
                  </div>

                  <hr>

                    <!-- T2 -->
                  <div class="pad5px">
                    <label class="label">Time 2</label>
                    :<label >
                      <?php 
                        echo $row["T2"];
                      ?>
                    </label> PM
                     <input type="submit" value="Take" name="create2"<?php if ($row["S2"] != "0"){ ?> disabled <?php   } ?> >
                  </div>

                  <hr>

                    <!-- T3 -->
                  <div class="pad5px">
                    <label class="label">Time 3</label>
                    :<label >
                      <?php 
                        echo $row["T3"];
                      ?>
                    </label> PM
                     <input type="submit" value="Take" name="create3"<?php if ($row["S3"] != "0"){ ?> disabled <?php   } ?> >
                  </div>

                  <hr>

                    <!-- T4 -->
                  <div class="pad5px">
                    <label class="label">Time 4</label>
                    :<label >
                      <?php 
                        echo $row["T4"];
                      ?>
                    </label> PM
                     <input type="submit" value="Take" name="create4"<?php if ($row["S4"] != "0"){ ?> disabled <?php   } ?> >
                  </div>

                  <hr>

                    <!-- T5 -->
                  <div class="pad5px">
                    <label class="label">Time 5</label>
                    :<label >
                      <?php 
                        echo $row["T5"];
                      ?>
                    </label> PM
                     <input type="submit" value="Take" name="create5"<?php if ($row["S5"] != "0"){ ?> disabled <?php   } ?> >
                  </div>

                  <hr>

                    <!-- T6 -->
                  <div class="pad5px">
                    <label class="label">Time 6</label>
                    :<label >
                      <?php 
                        echo $row["T6"];
                      ?>
                    </label> PM
                     <input type="submit" value="Take" name="create6"<?php if ($row["S6"] != "0"){ ?> disabled <?php   } ?> >
                  </div>

                  <hr>

                    <!-- T7 -->
                  <div class="pad5px">
                    <label class="label">Time 7</label>
                    :<label >
                      <?php 
                        echo $row["T7"];
                      ?>
                    </label> PM
                     <input type="submit" value="Take" name="create7"<?php if ($row["S7"] != "0"){ ?> disabled <?php   } ?> >
                  </div>

                  <hr>

                    <!-- T8 -->
                  <div class="pad5px">
                    <label class="label">Time 8</label>
                    :<label >
                      <?php 
                        echo $row["T8"];
                      ?>
                    </label> PM
                     <input type="submit" value="Take" name="create8"<?php if ($row["S8"] != "0"){ ?> disabled <?php   } ?> >
                  </div>


            </fieldset>
          </form>
        </div>  
        
    </div>
  </div>
</body>
</html>

<?php
 
if (isset($_POST['create1']) ) 
{
  $_SESSION["T"]=$row["T1"];
  $_SESSION["S"]=S1;
  echo '<script type="text/javascript">window.location.href="Appoint_Time_Confirmation.php";</script>';
}

if (isset($_POST['create2'])) 
{
  $_SESSION["T"]=$row["T2"];
  $_SESSION["S"]=S2;
  echo '<script type="text/javascript">window.location.href="Appoint_Time_Confirmation.php";</script>';
}
if (isset($_POST['create3'])) 
{
  $_SESSION["T"]=$row["T3"];
  $_SESSION["S"]=S3;
  echo '<script type="text/javascript">window.location.href="Appoint_Time_Confirmation.php";</script>';
}
if (isset($_POST['create4'])) 
{
  $_SESSION["T"]=$row["T4"];
  $_SESSION["S"]=S4;
  echo '<script type="text/javascript">window.location.href="Appoint_Time_Confirmation.php";</script>';
}
if (isset($_POST['create5'])) 
{
  $_SESSION["T"]=$row["T5"];
  $_SESSION["S"]=S5;
  echo '<script type="text/javascript">window.location.href="Appoint_Time_Confirmation.php";</script>';
}
if (isset($_POST['create6'])) 
{
  $_SESSION["T"]=$row["T6"];
  $_SESSION["S"]=S6;
  echo '<script type="text/javascript">window.location.href="Appoint_Time_Confirmation.php";</script>';
}
if (isset($_POST['create7'])) 
{
  $_SESSION["T"]=$row["T7"];
  $_SESSION["S"]=S7;
  echo '<script type="text/javascript">window.location.href="Appoint_Time_Confirmation.php";</script>';
}
if (isset($_POST['create8'])) 
{
  $_SESSION["T"]=$row["T8"];
  $_SESSION["S"]=S8;
  echo '<script type="text/javascript">window.location.href="Appoint_Time_Confirmation.php";</script>';
}
?>