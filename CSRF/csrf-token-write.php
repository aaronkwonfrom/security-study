<?php
session_start();

if (!isset($_SESSION["csrf_token"])) {
        $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}

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

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (
            !isset($_POST["csrf_token"]) ||
            !hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])
    ) {
            die("CSRF 검증실패");
    }

    $title = $_POST["title"];
    $content = $_POST["content"];
    $author = $_SESSION["username"];

    $file = $_FILES["file"];
    $filename = $file["name"];
    $filepath = "uploads/" . basename($filename);

    move_uploaded_file(
        $file["tmp_name"],
        "/var/www/html/" . $filepath
    );

    $sql = "INSERT INTO posts (title, content, author, filename, filepath)
            VALUES ('$title', '$content', '$author', '$filename', '$filepath')
            ";

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

<form method="POST" enctype="multipart/form-data">

        <input
                type="hidden"
                name="csrf_token"
                value="<? htmlspecialchars($_SESSION["csrf_token"]) ?>

    <p>
        제목:
        <input type="text" name="title">
    </p>

    <p>
        내용:
        <br>
        <textarea name="content" rows="10" cols="50"></textarea>
    </p>

    <p>
        첨부파일:
        <input type="file" name="file">
    </p>

    <button type="submit">작성</button>

</form>

<a href="index.php">목록으로</a>

</body>
</html>