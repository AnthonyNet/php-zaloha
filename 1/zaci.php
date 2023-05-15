<?php
require "assets/conn_to_db.php";

echo "Connected successfully.";
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
	<section>
	<h2>Seznam žáků školy</h2>
	<main>
		<?php
			if(empty($students)): ?>
				<p>Žádní žáci nejsou v databázi</p>
	<?php	else: ?>
			<ul>
				<?php foreach ($students as $student): ?>
					<li>
						<h3><?php echo $student["first_name"] . " " . $student["second_name"]; ?></h3>
					</li>
					<a href='jeden-zak.php?id=<?= $student["id"]?>'>Více informací</a>

				<?php endforeach; ?>
			</ul>
	<?php  endif; ?>
	<a href="index.php">Zpět na úvodní stranu</a>
	</main>
	</section>

</body>
</html>
