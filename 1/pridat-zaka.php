<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	require "assets/conn_to_db.php";

	/*$sql = "INSERT INTO student (first_name, second_name, age, life, college) VALUES ('" . $_POST["first_name"] . "', '" . $_POST["second_name"] . "', '" . $_POST["age"] . "', '" . $_POST["life"] . "', '" . $_POST["college"] . "')";
	$result = mysqli_query($connection, $sql);*/

	$sql = "INSERT INTO student (first_name, second_name, age, life, college) VALUES (?, ?, ?, ?, ?)";

	$statement = mysqli_prepare($connection, $sql);

	if($statement === false) {
		echo mysqli_error($connection);
	} else {
		mysqli_stmt_bind_param($statement, "ssiss", $_POST["first_name"], $_POST["second_name"], $_POST["age"], $_POST["life"], $_POST["college"]);

		if(mysqli_stmt_execute($statement)) {
			$id = mysqli_insert_id($connection);
			echo "ID přidaného žáka: $id";
		} else {
			echo mysqli_stmt_error($statement);
		}
	}


	mysqli_stmt_execute($statement);
	/*
	if ($result === false) {
		echo mysqli_error($connection);
	} else {
		$id = mysqli_insert_id($connection);
		echo "ID přidaného žáka: $id";
		echo "Žák přidán";
	}*/
}
//get data from form submit a send it to database
/*if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$sql = "INSERT INTO student (first_name, second_name, age, life, college) VALUES ('" . $_POST["first_name"] . "', '" . $_POST["second_name"] . "', '" . $_POST["age"] . "', '" . $_POST["life"] . "', '" . $_POST["college"] . "')";
	$result = mysqli_query($connection, $sql);

	if ($result === false) {
		echo mysqli_error($connection);
	} else {
		echo "Žák přidán";
	}
}*/



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

	<main>
		<section>
			<form action="pridat-zaka.php" method="POST">
				<input type="text" name="first_name" placeholder="Křestní jméno">
				<input type="text" name="second_name" placeholder="Příjmení">
				<input type="number" name="age" placeholder="Věk" min="13">
				<textarea name="life" placeholder="Podrobnosti o žákovi"></textarea>
				<input type="text" name="college" placeholder="Kolej">
				<input type="submit" value="Přidat">
			</form>
		</section>

	</main>


	<?php require "assets/footer.php" ?>

</body>

</html>