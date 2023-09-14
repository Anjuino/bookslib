<html>
    <p>333</p>
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
echo "<form name='myform' method='post'>";
echo "<table><tr><th></th></tr>";
echo "<tr>";
$sql = "SELECT `FIO` FROM `author`;";
$result_select = mysqli_query($conn, $sql);
echo "<td>";
echo "<select name = 'potr'>";

$rows_select = mysqli_num_rows($result_select);
for ($is = 0 ; $is < $rows_select ; ++$is)
{
$row_select = mysqli_fetch_row($result_select);
for ($js = 0 ; $js < 1 ; ++$js)
{
echo "<option value = '".$row_select[$js]."' > ".$row_select[$js]." </option>";}}
echo "</select>";
echo "</td>";
echo "<td><input name='org' type=text placeholder='оргвзнос'></td>";
echo "<td><input name='ID' type=hidden value='$row[$j]'></td>";
?>
</html>