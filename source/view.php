<?php
session_start();

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
    <title><?= htmlspecialchars($row['title']) ?></title>
</head>
<body>

<h1><?= htmlspecialchars($row['title']) ?></h1>

<p>
    작성자: <?= htmlspecialchars($row['author']) ?>
</p>

<p>
    <?= nl2br(htmlspecialchars($row['content'])) ?>
</p>

<hr>

<p>
    작성일: <?= htmlspecialchars($row['created_at']) ?>
</p>

<?php if (
    isset($_SESSION['user_id']) &&
    $_SESSION['user_id'] === $row['user_id']
): ?>

    <a href="edit.php?id=<?= $row['id'] ?>">수정하기</a>
    <a href="delete.php?id=<?= $row['id'] ?>">삭제하기</a>
    
<?php endif; ?>

<a href="index.php">목록으로</a>

</body>
</html>