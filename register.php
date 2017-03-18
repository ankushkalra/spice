<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */

// check for required fields
if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['password'])) {
 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO users(first_name, last_name, email, password) VALUES('$first_name', '$last_name', '$email', '$password')");
 
    // check if row inserted or not
    if ($result) {
        echo "The user has been created";
    } else {
        echo "The databse connection failed";
    }
} else {
        echo "There was an error in user creation. Please fill all the fields.";
}
?>