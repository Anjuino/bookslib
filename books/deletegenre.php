<?php
if(isset($_POST["id"]))
{
    $conn = new mysqli("localhost", "root", "acea", "books");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sql = "DELETE FROM genre WHERE genre.ID = '$id'";
    if(mysqli_query($conn, $sql)){
         
        header("Location: 1.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
        header('Refresh: 2; URL=1.php');
        exit;
    }
    mysqli_close($conn);    
}
?>