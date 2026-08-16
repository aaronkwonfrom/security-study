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

<h3>댓글</h3>

<?php
$comment_result = $mysqli->query(
    "SELECT * FROM comments
     WHERE post_id = {$row['id']}
     ORDER BY id ASC"
);
?>

<?php while ($comment = $comment_result->fetch_assoc()): ?>

    <p>
        <?= htmlspecialchars($comment['author']) ?> :
        <?= nl2br(htmlspecialchars($comment['content'])) ?>

        <a href="comment_edit.php?id=<?= $comment['id'] ?>">
            수정
        </a>
        <a href="comment_delete.php?id=<?= $comment['id'] ?>">
            삭제
        </a>
    </p>

<?php endwhile; ?>

<?php endwhile; ?>


<?php if (!empty($row["filename"])): ?>

        <p>
                첨부파일:
                <a href="<?= htmlspecialchars($row["filepath"]) ?>">
                        <?= htmlspecialchars($row["filename"]) ?>
                </a>
        </p>

<?php endif; ?>

<?php if (isset($_SESSION["user_id"])): ?>

    <form method="post" action="comment_write.php">

        <input
            type="hidden"
            name="post_id"
            value="<?= $row['id'] ?>"
        >

        <textarea
            name="content"
            rows="4"
            cols="50"
            required
        ></textarea>

        <br>

        <button type="submit">댓글 작성</button>

    </form>

<?php endif; ?>

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