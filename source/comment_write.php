<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$mysqli = new mysqli(
    "localhost",
    "boarduser",
    "YOUR_PASSWORD",
    "study"
);

if ($mysqli->connect_error) {
    die("MySQL 연결 실패: " . $mysqli->connect_error);
}

$post_id = $_POST["post_id"];
$content = $_POST["content"];
$author = $_SESSION["username"];

$sql = "
    INSERT INTO comments (post_id, author, content)
    VALUES ('$post_id', '$author', '$content')
";

$mysqli->query($sql);

header("Location: view.php?id=$post_id");
exit;