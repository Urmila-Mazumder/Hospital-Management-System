<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//insert
$sql = "INSERT INTO patient(Name, DOB, Gender, B_G, Age, Pre_Add, Per_Add, Email, Mobile, Telephone, Photo, User_Name, Password)
VALUES ('$name', '$DOB', '$GENDER', '$Blood_G', '23', '$Present_Add', '$Permanent_Add', '$Mail', '$Mobile_No', '$Telephone_No', '',         '$User_name', '$Pass')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
