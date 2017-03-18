<?php
 
/*
 * Following code will get single product details
 * A product is identified by product id (pid)
 */
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();
 
// check for post data
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // get a product from products table
    $result = mysql_query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
 
    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {
            echo "You are logged in.";
        } else {
            echo "User not found.";
        }
    } else {
        echo "User not found";
    }
} else {
    echo "Please fill both fields";
}
?>