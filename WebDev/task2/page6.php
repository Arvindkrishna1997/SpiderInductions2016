<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>all students</title>
<link rel="stylesheet" type="text/css" href="task2css.css">
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



if($_SERVER['REQUEST_METHOD']=="POST")
$sql= "SELECT * FROM students ORDER BY name";
else if($_SERVER['REQUEST_METHOD']=="GET")
$sql = "SELECT * FROM students ORDER BY dept";
else
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

echo "<table>"; // start a table tag in the HTML
echo "<tr><th>Name</th><th>rollno</th><th>department</th><th>email</th><th>PhysicalAddress</th><th>Aboutme</th></tr>";
while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
echo "<tr><td>".$row['name'] . "</td><td>" . $row['rollno'] . "</td><td>".$row["dept"]."</td><td>".$row["email"]."</td><td>".$row["physicaladdress"]."</td><td>".$row["aboutme"]."</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML
$conn->close(); //Make sure to close out the database connection?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
<br/>
<input type="submit" name="SORT(by name)" value="SORT(by name)">
</form>
<form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
<br/>
<input type="submit" name="group" value="GROUP(by dept)">
</form>
</body>




</html>