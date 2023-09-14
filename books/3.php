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
<h2>Общий список книг</h2>

<?php
$conn = new mysqli("localhost", "root", "acea", "books");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT `id`, `Name`, `Author`,`Genre`,`Date_publish`, `Type` FROM `books`;";
if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows; 
    echo "<p>Всего книг: $rowsCount</p>";
    echo "<table><tr><th>Книга</th><th>Автор</th><th>Жанр</th><th>Дата публикации</th><th>Издание</th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["Name"] . "</td>";    
            echo "<td>" . $row["Author"] . "</td>";
            echo "<td>" . $row["Genre"] . "</td>";
            echo "<td>" . $row["Date_publish"] . "</td>";
            echo "<td>" . $row["Type"] . "</td>";
            echo "<td><form action='deletebooks.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input type='submit' value='Удалить'>
                   </form></td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>
<h3>Добавить книгу</h3>
<form action="books.php" method="post">
    <p>Название: <input type="text" name="name" /> </p>
    <p>Жанр: <select name="genre">
    <option value="">
    <?php
    $conn = new mysqli("localhost", "root", "acea", "books");
    $sql = "SELECT `Name` FROM `genre`;";
    $result = $conn->query($sql);
    echo "<td>";
    $rows_select = mysqli_num_rows($result);
    for ($is = 0 ; $is < $rows_select ; ++$is)
    {
    $row_select = mysqli_fetch_row($result);
    for ($js = 0 ; $js < 1 ; ++$js)
    {
    echo "<option value = '".$row_select[$js]."' > ".$row_select[$js]." </option>";}}
    echo "</td>";
    ?>
    </option></select>
    <p>Издание: <select name="pub">
    <option value="1">digital edition</option>
    <option selected value="2">graphic edition</option>
    <option value="3">printed edition</option>
   </select>
    <p>Автор: <select name="author">
    <option value="">
    <?php
    $conn = new mysqli("localhost", "root", "acea", "books");
    $sql = "SELECT `FIO` FROM `author`;";
    $result = $conn->query($sql);
    echo "<td>";
    $rows_select = mysqli_num_rows($result);
    for ($is = 0 ; $is < $rows_select ; ++$is)
    {
    $row_select = mysqli_fetch_row($result);
    for ($js = 0 ; $js < 1 ; ++$js)
    {
    echo "<option value = '".$row_select[$js]."' > ".$row_select[$js]." </option>";}}
    echo "</td>";
    ?>
    </option></select>
    <p>Дата публикации: <input type="date" id="date" name="data"/> </p>
    
    <input type="submit" value="Добавить">
</form>
<br>

</body>
</html>