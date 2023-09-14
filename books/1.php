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
<h2>Список жанров</h2>
<?php
$conn = new mysqli("localhost", "root", "acea", "books");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT * FROM `genre` ORDER BY `ID`  ASC;";
if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows; // количество полученных строк
    echo "<p>Количество записей: $rowsCount</p>";
    echo "<table><tr><th>Название жанра</th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["Name"] . "</td>";
            echo "<td><form action='deletegenre.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["ID"] . "' />
                        <input type='submit' value='Удалить'>
                   </form></td>";
                   echo "<td><form action='updategenre.php' method='post'>
                   <input type='hidden' name='id' value='" . $row["ID"] . "' />
                   <input type='text'  placeholder='Жанр' name='Name'  />
                   <input type='submit' value='Изменить'>
              </form></td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
    header('Refresh: 2; URL=index.php');
        exit;
}
$conn->close();
?>
<h3> Добавить жанр </h3>
<form action="genre.php" method="post">
<p>Название: <input type="text" name="genre" /></p>
<input type="submit" value="Добавить">
</form>
<br>

</body>
</html>