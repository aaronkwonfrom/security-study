<?php

$mysqli = new mysqli(
    "localhost",
    "boarduser",
    "YOUR_PASSWORD",
    "study"
);

if ($mysqli->connect_error) {
    die("MySQL 연결 실패: " . $mysqli->connect_error);
}

$id = $_GET["id"];

$result = $mysqli->query(
    "SELECT filename, filepath
     FROM posts
     WHERE id = $id"
);

$file = $result->fetch_assoc();

if (!$file) {
    die("파일을 찾을 수 없습니다.");
}

$filepath = "/var/www/html/" . $file["filepath"];

if (!file_exists($filepath)) {
    die("파일이 존재하지 않습니다.");
}

header("Content-Disposition: attachment; filename=\"" . $file["filename"] . "\"");
header("Content-Length: " . filesize($filepath));

readfile($filepath);
exit;