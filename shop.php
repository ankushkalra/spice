<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "tut");
if(isset($_POST["add"])) {
	if(isset($_SESSION["cart"])) {
		$item_array_id = array_column($_SESSION["cart"],"product_id");
		if (!in_array($_GET["id"], item_array_id)) {
			$count = count($_SESSION["cart"])
		}
	}
}
?>