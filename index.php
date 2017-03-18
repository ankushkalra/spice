<?php
	session_start();
	$connect = mysqli_connect("localhost","root","","tut");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SoftAx Tutorial | bla bla bla</title>
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<div class="container" style="width:60%;">
	<h2 align="center">blalajdklfa;dll</h2>
	<!-- Random Comment 2-->
	<?php
	$query = "SELECT * FROM products ORDER BY id ASC";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result) {
			?>
			<div class="col-md-3">
			<form method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
			<div style="border: 1px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
			<img src="<?php echo $row["image"]; ?>" class="img-responsive">
			<h5 class="text-info"><?php echo $row["p_name"]; ?></h5>
			<h5 class="text-danger"><?php echo $row["price"]; ?></h5>
			<input type="text" name="quantity" class="form-control" value="1">
			<input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
           	<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
           	<input type="submit" name="add" style="margin-top:5px;" class="btn btn-default" value="Add to Bag">
           	</div>
			</form>
			</div>
			<?php
		}
	}
	?>
	<div style="clear:both"></div>
	<h2>My Shopping Bag</h2>
	<div class="table-responsive">
	<table class="table table-bordered">
	<tr>
		<th width="40%">Product Name</th>
		<th width="10%">Quatity</th>
		<th width="20%">Price Details</th>
		<th width="15%">Order Total</th>
		<th width="5%">Action</th>
	</tr>
	<?php
	if(!empty($_SESSION["cart"])) {
		$total = 0;
		foreach ($_SESSION["cart"] as $key => $value) {
			?>
			<tr>
				<td><?php echo $value["item_name"]
		}
	}
	{

	}
	</div>
</div>
</body>
