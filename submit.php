<?php
//DataBase Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demoo_wampp";
$conn = new mysqli($severname,$username,$password,$dbname);
//check connection
if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}
//save From data to database
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$sql = "INSERT INTO contact_form_data(name,email,message)VALUES('$name','$email','$message')";
if($conn->query($sql) === TRUE) {
    echo "Form data saved successfully!";
}else{
    echo "Error:" .$sql."<br>".$conn->error;
}
$conn->close();
?>
