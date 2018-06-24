<?php
// sql to create table
$sql = "CREATE TABLE Programmer_test (
Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Firstname VARCHAR(30) NOT NULL,
Lastname VARCHAR(30) NOT NULL,
Email VARCHAR(50),
File varchar (50),
reg_date TIMESTAMP
)";

if (!mysqli_query($conn, $sql)) {
    mysqli_query($conn,$sql);
} else
    $error_count++;
?>