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

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = $_POST["title"];
    $content = $_POST["content"];
    $author = $_POST["author"];

    $sql = "INSERT INTO posts (title, content, author)
            VALUES ('$title', '$content', '$author')";

    if ($mysqli->query($sql)) {
        echo "게시글 작성 성공!";
    } else {
        echo "게시글 작성 실패: " . $mysqli->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>게시글 작성</title>
</head>
<body>

<h1>게시글 작성</h1>

<form method="POST">

    <p>
        제목:
        <input type="text" name="title">
    </p>

    <p>
        작성자:
        <input type="text" name="author">
    </p>

    <p>
        내용:
        <br>
        <textarea name="content" rows="10" cols="50"></textarea>
    </p>

    <button type="submit">작성</button>

</form>

</body>
</html>