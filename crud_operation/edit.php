<?php
include 'connection.php';
$id = $_REQUEST['id'];
$sql = "SELECT * from mytable where id =" .$id;
$result = mysqli_query($conn, $sql);
if ($result) {
	$row = mysqli_fetch_assoc($result);
}
?>

<?php 
if (isset($_POST['submit'])) {

	$id = $_REQUEST['id'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$salary = $_POST['salary'];
	$mobilenumber = $_POST['mobilenum'];
	$image = $_FILES['image']['name'];
	$temp_name = $_FILES['image']['tmp_name'];
	$path = $image;
	move_uploaded_file($temp_name, $path);

	$sql = "UPDATE mytable set name = '$name', address = '$address', salary = '$salary', mobilenumber = '$mobilenumber', image = '$image' where id = '$id'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		header('location: index.php');
	}
	else{
		echo "not updated".mysqli_error($conn);
	}
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
		.wrapper{
			width: 400px;
		    margin: 0 auto;
        }
        input{
        	width: 100%;
        }
    </style>
</head>
<body>
	<!-- <div class="container-fluid">
		
	</div> -->
<div class="wrapper">
    <div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
            	<div class="mt-5 mb-3 clearfix">
                	<h2 class="pull-left">Update Record</h2>
            	</div>
            	<form class="table table-striped table-bordered" method="post" enctype="multipart/form-data">
					<label>Name</label>
					<input type="text" name = "name" value="<?php echo $row['name'];?>"><br>
					<label>Address</label>
					<input type="text" name = "address" value="<?php echo $row['address'];?>"><br>
					<label>Salary</label>
					<input type="text" name = "salary" value="<?php echo $row['salary'];?>"><br>
					<label>MobileNumber</label>
					<input type="text" name = "mobilenum" value="<?php echo $row['mobilenumber'];?>"><br>
					<label>MyPhote</label>
					<input type="file" name="image" value="<?php echo $row['image'] ?>"><br>
					<input type="submit" value="Update Record" name="submit" class="btn btn-success">
				</form>
			</div>        
		</div>
    </div>
</body>
</html>