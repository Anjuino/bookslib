<?php
if (isset($_POST["genre"])) {
    $conn = new mysqli("localhost", "root", "acea", "books");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $genre = $conn->real_escape_string($_POST["genre"]);
    $sql = "INSERT INTO genre (Name) VALUES ('$genre')";
    if($conn->query($sql)){
        header("Location: 1.php");
        exit;
    } else{
        echo "Ошибка: " . $conn->error;
        header('Refresh: 2; URL=1.php');
        exit;
    }
    $conn->close();
}
?>
