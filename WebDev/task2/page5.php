<?php
// Start the session
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Details</title>
<link rel="stylesheet" type="text/css" href="task2css.css">
</head>
<body>

<?php

 $name = $dept = $email =$physical_address = $about_me= $passcode="";
  $nameErr  =$emailErr =$physical_addressErr=$passcodeErr="";
  $passcodeoriginal="";
  $rollno=$_SESSION["rollno"];
	  
	 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["rollno"]===$rollno)
			   {   $passcodeoriginal=$row["passcode"];
			      //  echo "rollno got";
		   break;
	   }
    }
} else {
    echo "wrong passcode";
}
	  
if($_SERVER['REQUEST_METHOD']=="POST"){
	  $dept=test_input($_POST["dept"]);
	  $about_me=test_input($_POST["aboutme"]);
	  $passcode=test_input($_POST["passcode"]);
 if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  //echo $passcodeoriginal."try me";
  if($passcode!=$passcodeoriginal)
  $passcodeErr="invalid passcode";
  if(empty($_POST["rollno"])){
	  $rollnoErr="rollno is required";
  }
  else{
	  $rollno=test_input($_POST["rollno"]);
	  if(!preg_match("/^[0-9]*$/",$rollno)||$rollno<100000000||$rollno>999999999)
	    $rollnoErr="rollno no is invalid";
     }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
	if(strpos($email,"@nitt.edu")==FALSE)
	  $emailErr="enter the email of nitt.edu";
	 }	 
     if(empty($_POST["physicaladdress"]))
	   $physical_addressErr="physical address is reqiured";
	   else 
	   $physical_address=test_input($_POST["physicaladdress"]);
if($nameErr===""&&$emailErr===""&&$physical_addressErr===""&&$passcodeErr==="")
{
	
$sql="UPDATE students SET name='$name',
email='$email',
physicaladdress='$physical_address',
aboutme='$about_me',
dept='$dept'
WHERE passcode='$passcode'";
if ($conn->query($sql) === TRUE) {
    echo "The old record below has been updated to the newly entered one successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
	
	
}

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
<h1>Student Details Editing Form</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
passcode: <input type="text" name="passcode" value="<?php echo $passcode;?>" >
<span class="error">*<?php echo $passcodeErr;?></span>
<br/><br/><pre style="display:inline">  </pre>
Name: <input type="text" name="name" value="<?php echo $row["name"];?>" >
 <span class="error">* <?php echo $nameErr;?></span>
<br/><br/>
Department:<select name="dept" value="<?php echo $row["dept"];?>">
 <option value="cse">CSE</option>
 <option value="eee">EEE</option>
 <option value="ece">ECE</option>
 <option value="civil">CIVIL</option>
 <option value="mech">MECH</option>
 <option value="prod">PROD</option>
</select>
<br/><br/><pre style="display:inline"> </pre>
E-mail: <input type="text" name="email" value="<?php echo $row["email"];?>">
<span class="error">* <?php echo $emailErr;?></span>
<br/><br/><pre style="display:inline">         </pre>
Physical Address:<textarea name="physicaladdress" rows="5" cols="40" ><?php echo $row["physicaladdress"];?></textarea> 
<span class="error">* <?php echo $physical_addressErr;?></span>
<br/><br/>
<pre style="display:inline">              </pre>
About me:  <textarea name="aboutme" rows="5" cols="40" ><?php echo $row["aboutme"];?></textarea>
<br/>
<input type="submit" name="submit" value="Submit"> 
<br/>
</form

></body>
</html>