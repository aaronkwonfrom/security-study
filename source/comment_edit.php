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

$id = $_GET["id"];

$result = $mysqli->query(
    "SELECT * FROM comments WHERE id = $id"
);

$comment = $result->fetch_assoc();


// 여기부터 POST 처리
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $content = $_POST["content"];

    $mysqli->query(
        "UPDATE comments
         SET content = '$content'
         WHERE id = $id"
    );

    header("Location: view.php?id=" . $comment["post_id"]);
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>댓글 수정</title>
</head>
<body>

<h1>댓글 수정</h1>

<form method="post">

    <textarea name="content" rows="5" cols="50">
        <?= htmlspecialchars($comment["content"]) ?>
    </textarea>

    <br>

    <button type="submit">수정하기</button>

</form>

<a href="view.php?id=<?= $comment["post_id"] ?>">취소</a>

</body>
</html>