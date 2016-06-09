<?php
// Start the session
session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>search results</title>
</head>
<body>

<?php
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
        if($row["rollno"]===$_GET["rollno"])
	   {// echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]."-reg_date: ".$row["reg_date"] ."<br>";
           	   echo "your details have been found <br/>";
			   echo "Name: ".$row["name"]."<br/>";
               echo "rollno: ".$row["rollno"]."<br/>";
			   echo "email: ".$row["email"]."<br/>";
			   echo "department: ".$row["dept"]."<br/>";
			   echo "physical Address: ".$row["physicaladdress"]."<br/>";
			   echo "About you: ".$row["aboutme"]."<br/>";
			   break;
	   }
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<?php
// Set session variables
$_SESSION["rollno"] = $row["rollno"];
//echo "Session variables are set.";
?>
<form method="get" action="page5.php">
Rollno:<input type="text" name="rollno" value="<?php echo $row["rollno"];?>"  >
<br/>
<input type="submit" name="Edit" value="Edit">
</form>
</body>
</html>