<?php
if(isset($_POST["id"]) && isset($_POST["Name"]))
{
    $conn = new mysqli("localhost", "root", "acea", "books");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $Name = mysqli_real_escape_string($conn, $_POST["Name"]);
    $sql = "UPDATE genre SET genre.Name = '$Name' WHERE genre.ID = '$id'";
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