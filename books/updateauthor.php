<?php
if(isset($_POST["id"]) && isset($_POST["FIO"]) && isset($_POST["City"]))
{
    $conn = new mysqli("localhost", "root", "acea", "books");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $FIO = mysqli_real_escape_string($conn, $_POST["FIO"]);
    $City = mysqli_real_escape_string($conn, $_POST["City"]);
    $sql = "UPDATE author SET author.FIO = '$FIO', author.City = '$City'  WHERE author.ID = '$id'";
    if(mysqli_query($conn, $sql)){
         
        header("Location: 5adm.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
        header('Refresh: 2; URL=5adm.php');
        exit;
    }
    mysqli_close($conn);    
}
?>