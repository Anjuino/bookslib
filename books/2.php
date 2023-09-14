<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="site.css">
<meta charset="utf-8" />
</head>
<body>
<form action=http://localhost/books>
<button>На главную</button>
</form>
<h2>Список авторов и количества книг</h2>
<?php
$conn = new mysqli("localhost", "root", "acea", "books");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT `Author`, COUNT(`Name`) FROM `books` GROUP BY `Author`;";
if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows; // количество полученных строк
    echo "<p>Всего авторов: $rowsCount</p>";
    echo "<table><tr><th>Автор</th><th>Количество книг</th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["Author"] . "</td>";
            echo "<td>" . $row["COUNT(`Name`)"] . "</td>";
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