<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$mysqli = new mysqli(
    "localhost",
    "aaron",
    "0601",
    "study"
);

if ($mysqli->connect_error) {
    die("MySQL 연결 실패: " . $mysqli->connect_error);
}

$id = $_GET["id"];

$result = $mysqli->query(
    "SELECT post_id FROM comments WHERE id = $id"
);

$comment = $result->fetch_assoc();

$mysqli->query(
    "DELETE FROM comments WHERE id = $id"
);

header("Location: view.php?id=" . $comment["post_id"]);
exit;