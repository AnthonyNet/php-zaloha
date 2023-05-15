<?php
require "assets/conn_to_db.php";


if (isset($_GET["id"]) and is_numeric($_GET["id"])) {
	$sql =
		"SELECT *
            FROM student
            WHERE id = " . $_GET["id"];

	$result = mysqli_query($connection, $sql);
	//$students = mysqli_fetch_all($result, MYSQLI_ASSOC);

	if ($result === false) {
		echo mysqli_error($connection);
	} else {
		$students = mysqli_fetch_all($result, MYSQLI_ASSOC);
	}
}




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
	<header>
		<h2>Informace o žákovi</h2>
	</header>
	<main>
		<?php
		/*echo "<pre>";
		var_dump($students);
		echo "</pre>";*/
		?>
		<section>
			<?php if ($students === null) : ?>
				<p>Žák nenalezen</p>
			<?php else : ?>
				<h2><?= $students[0]["first_name"] . " " . $students[0]["second_name"] ?></h2>
				<p>Věk: <?= $students[0]["age"] ?></p>
				<p>Dodatečné informace: <?= $students[0]["life"] ?></p>
				<p>Kolej: <?= $students[0]["college"] ?></p>
			<?php endif ?>
		</section>
		<a href="zaci.php">Zpět na seznam žáků</a>
	</main>
	<footer></footer>
</body>

</html>