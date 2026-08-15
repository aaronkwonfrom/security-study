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

<?php if (isset($_SESSION['user_id'])): ?>

    <p>
        로그인 상태입니다.
        <?= htmlspecialchars($_SESSION['username']) ?>님 환영합니다.
    </p>

    <a href="write.php">게시글 작성</a>
    <a href="logout.php">로그아웃</a>

<?php endif; ?>

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

    <a href="login.php">로그인</a>
    <a href="register.php">회원가입</a>

    <hr>

<?php endwhile; ?>

</body>
</html>