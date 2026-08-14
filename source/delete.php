<?php

$mysqli = new mysqli(
    "localhost",
    "boarduser",
    "YOUR_PASSWORD",
    "study"
);

if ($mysqli->connect_error) {
    die("MySQL connection failed: " . $mysqli->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM posts WHERE id = $id";

if ($mysqli->query($sql)) {
    header("Location: index.php");
    exit;
} else {
    echo "게시글 삭제 실패: " . $mysqli->error;
}