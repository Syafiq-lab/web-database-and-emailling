<?php
//Variable
$error_count = 0;
$error_massage = "";

//sql variable
$servername = "localhost";
$username = "id6134051_test";
$password = "123456";
$dbname = "id6134051_test_name";
$db_table = "Programmer_test";

//check for data availability
if(!isset($_POST['first']) ||
    !isset($_POST['last']) ||
    !isset($_POST['email']) ||
    !isset($_POST['comments'])) {
    $error_count++;
    $error_message .='We are sorry, but there appears to be a problem with the form you submitted.';

}
//form variable
$first_name = $_POST["first"];
$last_name = $_POST["last"];
$email = $_POST["email"];
$comment = $_POST["comments"];

$file_dir = "uploads/";
$file_name = basename($_FILES["file"]["name"]);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    $error_count++;
    die("Connection failed: " . mysqli_connect_error());

}
//run script to create database
require_once "create_tbl.php";



function died ($error){
    echo "Seems there were problems with your input. ";
    echo $error. "<br /></br>";
    die();
}

$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
if (!preg_match($email_exp,$email)){
    $error_massage.='the email are not valid.<<br/>';
    $error_count++;
}
if(strlen($comment) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
    $error_count++;
}

if(strlen($error_message) > 0) {
    died($error_message);
} else {
    include "email.php";
}

move_uploaded_file($_FILES["file"]["tmp_name"], $file_dir.$file_name);

$ist_sql = "INSERT INTO Programmer_test (Firstname,Lastname,Email,File)
VALUES ('$first_name','$last_name','$email','$file_name')";

//real inserting code
if (mysqli_query($conn, $ist_sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $ist_sql . "<br>" . mysqli_error($conn);
    $error_count++;
}

?>