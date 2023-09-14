<?php
if (isset($_POST["author"]) && isset($_POST["data"]) && isset($_POST["city"])) {
    $conn = new mysqli("localhost", "root", "acea", "books");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $author = $conn->real_escape_string($_POST["author"]);
    $data = $conn->real_escape_string($_POST["data"]);
    $city = $conn->real_escape_string($_POST["city"]);
    $sql = "INSERT INTO author (FIO, Date_of_Birth, City) VALUES ('$author', '$data', '$city')";
    if($conn->query($sql)){
        header("Location: 5adm.php");
        exit;
    } else{
        echo "Ошибка: " . $conn->error;
        header('Refresh: 2; URL=5adm.php');
        exit;
    }
    $conn->close();
}
?>