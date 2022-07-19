<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>menu</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="navigation-bar">
		<div class="d-flex">
			<div>
				<h1>MD</h1>
			</div>
			<div>
				<ul>
					<li>
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#">About</a>
					</li>
					<li>
						<a href="#">Contact</a>
					</li>
					<li>
						<a href="#">Login</a>
					</li>
					<li>
						<a href="#">Register</a>
					</li>
				</ul>
			</div>
			
		</div>
	</div>

	<div class="container">
		<h1>I am Developer and Website Designer</h1>
	</div>

	<div class="about">
		<div class="text">
			<h2>About Us</h2>
		</div>
		<div class="d-flex m-20">

			<?php
                include 'connection.php';
                $id = 1;
                $sql = "SELECT * from mytable ORDER BY id desc";
                $result = mysqli_query($conn, $sql);
                if($result){
                while($row = mysqli_fetch_assoc($result)){
            ?>

			<div class="bg-color">
				<?php echo "<img src=".$row['image'].">"; ?>
				<div class="d-flex">
					<p><?php echo $row['name']; ?></p>
					<p><?php echo $row['salary']; ?></p>
				</div>
			</div>

			<?php $id++; ?>
            <?php }
            }?>

		</div>
	</div>
</body>
</html>