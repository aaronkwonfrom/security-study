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

$result = $mysqli->query("SELECT * FROM posts ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>게시판</title>
</head>
<body>

<h1>게시판</h1>

<?php while ($row = $result->fetch_assoc()): ?>

    <h2>
    <a href="view.php?id=<?= $row['id'] ?>">
        <?= htmlspecialchars($row['title']) ?>
    </a>
    </h2>

    <p>
        작성자: <?= htmlspecialchars($row['author']) ?>
    </p>

    <p>
        <?= nl2br(htmlspecialchars($row['content'])) ?>
    </p>

    <hr>

<?php endwhile; ?>

</body>
</html>