<?php
	require_once('db_config.php');
	$conn = mysqli_connect($db_host, $db_user, $db_userPassword, $db_name);
	if($conn->connect_errno) {
		echo $conn->connect_error;
		echo $conn->connect_errno;
		die('MySql connection failed');
	}
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale=1">

	<title>Add New Product - Shiva Spices</title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="bootstrap-mod.css">
</head>

<body>

	<div class="container">

		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">

			<form method="post" action="addProductPHP.php" enctype="multipart/form-data">

				<div class="input-group input-group-lg">
					<span class="input-group-addon">Product Name</span>
					<input type="text" name="p_name" class="form-control" placeholder="Product Name">
				</div><br> <!-- end of input-group -->

				<div class="input-group input-group-lg">
					<span class="input-group-addon">Category</span>
					<select class="form-control" name="category">
					<?php
						$query = "select id, c_name from categories";
						$result = mysqli_query($conn, $query);
						if($result) {
							while($row = mysqli_fetch_array($result)) {
					?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['c_name']; ?></option>

					<?php
							}
						}
					?>
					</select>
				</div><br>	<!-- end of input-group -->

				<div class="input-group input-group-lg">
					<span class="input-group-addon">Brand Name</span>
					<select class="form-control" name="brand">
					<?php
						$query = "select id, b_name from brands";
						$result = mysqli_query($conn, $query);
						if($result) {
							while($row = mysqli_fetch_array($result)) {
					?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['b_name']; ?></option>

					<?php
							}
						}
					?>
					</select>
				</div><br>	<!-- end of input-group -->

				<div class="input-group input-group-lg">
					<span class="input-group-addon">Price</span>
					<input type="number" class="form-control" placeholder="" name="price">
				</div><br>	<!-- end of input-group -->

				<div class="input-group input-group-lg">
					<span class="input-group-addon">Image</span>
					<input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
				</div>	<!-- end of input-group -->

				<button class="btn btn-lg btn-primary btn-block mod-form-submit-button" type="submit">Add Product</button>	<!-- Submit Button -->

			</form>
		</div>	
	</div>	<!-- End of container -->
</body>

</html>