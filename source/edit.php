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

$result = $mysqli->query(
    "SELECT * FROM posts WHERE id = $id"
);

if ($result->num_rows === 0) {
    die("게시글을 찾을 수 없습니다.");
}

$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>게시글 수정</title>
</head>
<body>

<h1>게시글 수정</h1>

<form action="update.php" method="post">

    <input
        type="hidden"
        name="id"
        value="<?= $row['id'] ?>"
    >

    <p>
        제목
        <br>
        <input
            type="text"
            name="title"
            value="<?= htmlspecialchars($row['title']) ?>"
        >
    </p>

    <p>
        작성자
        <br>
        <input
            type="text"
            name="author"
            value="<?= htmlspecialchars($row['author']) ?>"
        >
    </p>

    <p>
        내용
        <br>
        <textarea name="content" rows="10" cols="50"><?= htmlspecialchars($row['content']) ?></textarea>
    </p>

    <button type="submit">수정하기</button>

</form>

<a href="view.php?id=<?= $row['id'] ?>">취소</a>

</body>
</html>