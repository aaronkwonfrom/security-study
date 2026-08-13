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

$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];

$sql = "
    UPDATE posts
    SET
        title = '$title',
        author = '$author',
        content = '$content'
    WHERE id = $id
";

if ($mysqli->query($sql)) {
    header("Location: view.php?id=$id");
    exit;
} else {
    echo "게시글 수정 실패: " . $mysqli->error;
}