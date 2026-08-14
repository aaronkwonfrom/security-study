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

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "
        INSERT INTO users (username, password)
        VALUES ('$username', '$password_hash')
    ";

    if ($mysqli->query($sql)) {
        $message = "회원가입이 완료되었습니다.";
    } else {
        $message = "회원가입 실패: " . $mysqli->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
</head>
<body>

<h1>회원가입</h1>

<form method="post">

    <p>
        아이디
        <br>
        <input type="text" name="username" required>
    </p>

    <p>
        비밀번호
        <br>
        <input type="password" name="password" required>
    </p>

    <button type="submit">회원가입</button>

</form>

<p>
    <?= htmlspecialchars($message) ?>
</p>

<a href="index.php">게시판으로</a>

</body>
</html>