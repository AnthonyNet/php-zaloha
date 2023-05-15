<?php
require "assets/conn_to_db.php";

		$query = "SELECT * FROM student";
		$result = mysqli_query($connection, $query);
		$students = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php require "assets/header.php" ?>
	<section>
		<h1>MAIN</h1>
		<a href="./zaci.php">Na stránku žáci</a>
		<a href="./pridat-zaka.php">Přidat žáka</a>
		<?Php foreach ($students as $student) { ?>
			<div>
				<h2><?php echo $student["first_name"] . " " . $student["second_name"]; ?></h2>
				<p><?php echo $student["age"]; ?></p>
				<p><?php echo $student["life"]; ?></p>
				<p><?php echo $student["college"]; ?></p>
			</div>
		<?php } ?>
	</section>
	<?php require "assets/footer.php" ?>
</body>
</html>
