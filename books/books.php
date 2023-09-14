<?php
if (isset($_POST["name"]) && isset($_POST["genre"]) && isset($_POST["pub"]) && isset($_POST["author"]) && isset($_POST["data"])) {
    $conn = new mysqli("localhost", "root", "acea", "books");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $name = $conn->real_escape_string($_POST["name"]);
    $genre = $conn->real_escape_string($_POST["genre"]);
    $pub = $conn->real_escape_string($_POST["pub"]);
    $author = $conn->real_escape_string($_POST["author"]);
    $data = $conn->real_escape_string($_POST["data"]);
    $sql = "INSERT INTO books (Name, Genre, Type, Author, Date_publish) VALUES ('$name', '$genre', '$pub', '$author', '$data')";
    if($conn->query($sql)){
        header("Location: 3.php");
        exit;
    } else{
        echo "Ошибка: " . $conn->error;
        header('Refresh: 2; URL=3.php');
        exit;
    }
    $conn->close();
}
?>