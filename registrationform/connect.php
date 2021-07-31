<?php
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$cpassword = filter_input(INPUT_POST, 'cpassword');
$Lastname = filter_input(INPUT_POST, 'Lastname');
$Firstname = filter_input(INPUT_POST, 'Firstname');
$address = filter_input(INPUT_POST,'address');
$gender = filter_input(INPUT_POST, 'gender');
$pnumber = filter_input(INPUT_POST, 'pnumber');
if($password == $cpassword)
{
if (!empty($username)){
if (!empty($password) && !empty($cpassword) && !empty($Lastname) && !empty($Firstname) && !empty($address) && !empty($gender) && !empty($pnumber)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "asif";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO data (username, password,cpassword,Firstname,Lastname,gender,address,pnumber)
values ('$username','$password','$cpassword','$Firstname','$Lastname','$gender','$address','$pnumber')";
if ($conn->query($sql)){
echo "New record is inserted sucessfully";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "All Fields Are Required";
die();
}
}
else{
echo "email should not be empty";
die();
}
}
else{
	echo "password and confirm password must be same";
	die();
}
?>