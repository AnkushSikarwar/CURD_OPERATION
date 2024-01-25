<?php
include 'dbcon.php';

if(isset($_POST['add_students'])){
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    // Check if first name is empty
    if($fname == "" || empty($fname)){
        header('location:index.php?message=You need to fill first name');
        exit(); // Added to stop further execution if there's an error
    }

    // Use prepared statement or mysqli_real_escape_string to sanitize input
    $fname = mysqli_real_escape_string($connection, $fname);
    $lname = mysqli_real_escape_string($connection, $lname);
    $age = mysqli_real_escape_string($connection, $age);

    $query = "INSERT INTO student (first_name, last_name, age) VALUES ('$fname', '$lname', '$age')";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query Failed: " . mysqli_error($connection));
    } else {
        header('location:index.php?insert_msg=Your data has been added successfully');
    }
}
?>
