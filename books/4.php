<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
</head>
<body>
<link rel="stylesheet" href="site.css">
<form action=http://localhost/books>
<button>На главную</button>
</form>
<h2>Автор и его книги</h2>
<?php
$conn = new mysqli("localhost", "root", "acea", "books");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT FIO,`Date_of_Birth`,`City`, COUNT(Name) AS Kol FROM `author` JOIN books ON author.FIO = books.Author GROUP BY FIO;";
if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows; 
    echo "<p>Всего авторов: $rowsCount</p>";
    echo "<table><tr><th>Автор</th><th>Год рождения</th><th>Город</th><th>Количество книг</th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["FIO"] . "</td>";    
            echo "<td>" . $row["Date_of_Birth"] . "</td>";
            echo "<td>" . $row["City"] . "</td>";
            echo "<td>" . $row["Kol"] . "</td>";
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