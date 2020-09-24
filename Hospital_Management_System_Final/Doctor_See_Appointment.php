<?php
require_once 'db_connect.php';
if (isset($_SESSION["id"])) 
{
  $id=$_SESSION["id"];
  $sql = "SELECT * FROM appoint_time WHERE D_ID='".$id."'";
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
  <title>Doctor's Appointment Information</title>
  <link rel="stylesheet" href="css/All_registration.css">
  <style >
    .font_Size120per
    {
      font-size: 120%;
    }
  </style>
</head>
<body>


<!-- HTML -->
  <div align="center">
    <div align="center" class="ex1">
      
          <div class="pad_All">
          <!--padding: top right bottom left -->
          <form> 
            
            
            <fieldset align="left" style="height: 450px;margin-left: 200px;width: 450px;margin-top: 50px;">
              
              <legend align="center" class="color_blue"><b>Appointment Information</b></legend>
               
                <div align="center"> 
                  <div class="pad5px">
                    <label >
                      <?php
                        echo $row["A_Date"];
                      ?>
                    </label>
                  </div>


                  <div class="pad5px">
                    <label class="label font_Size120per" ><?php echo "Appoint Time" ?></label>
                    <label class="font_Size120per">
                      <?php 
                        echo "Patient Name";
                      ?>
                    </label>
                  </div>

                  <hr>
                  <!-- T1 -->
                  <div class="pad5px">
                    <label class="label"><?php echo $row['T1'] ?></label>
                    :<label >
                      <?php
                        if ($row["S1"]=="0") 
                        {
                          echo "No Appointment";
                        } 
                        else
                        {
                          echo $row["S1"];
                        }
                      ?>
                    </label>
                  </div>

                  <hr>

                  <!-- T2 -->
                  <div class="pad5px">
                    <label class="label"><?php echo $row['T2'] ?></label>
                    :<label >
                       <?php
                        if ($row["S2"]=="0") 
                        {
                          echo "No Appointment";
                        } 
                        else
                        {
                          echo $row["S2"];
                        }
                        
                      ?>
                    </label>
                  </div>

                  <hr>
                  
                  <!-- T3 -->
                  <div class="pad5px">
                    <label class="label"><?php echo $row['T3'] ?></label>
                    :<label >
                       <?php
                        if ($row["S3"]=="0") 
                        {
                          echo "No Appointment";
                        } 
                        else
                        {
                          echo $row["S3"];
                        }
                        
                      ?>
                    </label>
                  </div>

                  <hr>

                  <!-- T4 -->
                  <div class="pad5px">
                    <label class="label"><?php echo $row['T4'] ?></label>
                    :<label >
                       <?php
                        if ($row["S4"]=="0") 
                        {
                          echo "No Appointment";
                        } 
                        else
                        {
                          echo $row["S4"];
                        }
                        
                      ?>
                    </label>
                  </div>

                  <hr>

                  <!-- T5 -->
                  <div class="pad5px">
                    <label class="label"><?php echo $row['T5'] ?></label>
                    :<label >
                       <?php
                        if ($row["S5"]=="0") 
                        {
                          echo "No Appointment";
                        } 
                        else
                        {
                          echo $row["S5"];
                        }
                        
                      ?>
                    </label>
                  </div>

                  <hr>

                  <!-- T6 -->
                  <div class="pad5px">
                    <label class="label"><?php echo $row['T6'] ?></label>
                    :<label >
                       <?php
                        if ($row["S6"]=="0") 
                        {
                          echo "No Appointment";
                        } 
                        else
                        {
                          echo $row["S6"];
                        }
                        
                      ?>
                    </label>
                  </div>

                  <hr>

                  <!-- T7 -->
                  <div class="pad5px">
                    <label class="label"><?php echo $row['T7'] ?></label>
                    :<label >
                       <?php
                        if ($row["S7"]=="0") 
                        {
                          echo "No Appointment";
                        } 
                        else
                        {
                          echo $row["S7"];
                        }
                        
                      ?>
                    </label>
                  </div>

                  <hr>

                  <!-- T8 -->
                  <div class="pad5px">
                    <label class="label"><?php echo $row['T8'] ?></label>
                    :<label >
                       <?php
                        if ($row["S8"]=="0") 
                        {
                          echo "No Appointment";
                        } 
                        else
                        {
                          echo $row["S8"];
                        }
                        
                      ?>
                    </label>
                  </div>


                </div>

               </fieldset>
          </form>
        </div>  
        
    </div>
  </div>
</body>
</html>

