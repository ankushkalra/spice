<?php
	require_once 'db_config.php';
	$conn = mysqli_connect($db_host, $db_user, $db_userPassword, $db_name);
	
	if($conn->connect_error) {
		echo "<br/>";
		echo($conn->connect_errno);
		echo "<br/>";
		echo($conn->connect_error);
	
		die("Failed to connect to MySql.");
	}

	if(isset($_POST['p_name']) && $_POST['category'] && isset($_POST['brand']) && isset($_POST['price']) && isset($_FILES['fileToUpload'])) {

		$p_name = $_POST['p_name'];
		$category = $_POST['category'];
		$brand = $_POST['brand'];
		$price = $_POST['price'];

		$uploadOk = 1;

		// first move the image in a direcotory
		$target_dir = "uploads/";
		$oldFileName = basename($_FILES["fileToUpload"]["name"]);
		$fileExtension = pathinfo($oldFileName, PATHINFO_EXTENSION);

		function uniqueNameForImage($target_dir, $fileExtension) {
			$name = base_convert(microtime(), 10, 36);
			if (file_exists($target_dir.$name.".".$fileExtension)) {
				uniqueNameForImage();
			} else return $name ;
		}
		
		$newFileName = uniqueNameForImage($target_dir, $fileExtension).".".$fileExtension;

		$target_file = $target_dir.$newFileName;

		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$query = "INSERT INTO products(p_name, image, price, category, brand) values ('$p_name', '$target_file', '$price', 1, '$brand')";
			if(mysqli_query($conn, $query)) {
				echo "Product successfully added.";
			} else {
				echo "Query execution failed.";
				trigger_error(mysqli_error($conn)." in ".$query);
			}
		} else {
			echo "File moving failed.";
		}
	} else {
		echo "Something is not set.";
	}
?>