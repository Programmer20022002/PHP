<!DOCTYPE html>
<html>
<head>
<title>METANIT.COM</title>
<meta charset="utf-8" />
</head>
<body>
<h2>Список пользователей</h2>
<?php
$conn = new mysqli("127.0.0.1", "root", "root", "app");
if($conn->connect_error){
	die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT * FROM Users";
if($result = $conn->query($sql)){
	$rowsCount = $result->num_rows; // количество полученных строк
	echo "<p>Получено объектов: $rowsCount</p>";
    echo "<table><tr><th>Id</th><th>Имя</th><th>Пароль</th></tr>";
	foreach($result as $row){
		echo "<tr>";
			echo "<td>" . $row["id"] . "</td>";
			echo "<td>" . $row["name"] . "</td>";
			echo "<td>" . $row["password"] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	$result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>
</body>
</html>