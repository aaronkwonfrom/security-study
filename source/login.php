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

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "
        SELECT *
        FROM users
        WHERE username = '$username'
    ";

    $result = $mysqli->query($sql);

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];

            header("Location: index.php");
            exit;

        } else {
            $message = "아이디 또는 비밀번호가 올바르지 않습니다.";
        }

    } else {
        $message = "아이디 또는 비밀번호가 올바르지 않습니다.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>로그인</title>
</head>
<body>

<h1>로그인</h1>

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

    <button type="submit">로그인</button>

</form>

<p>
    <?= htmlspecialchars($message) ?>
</p>

<a href="register.php">회원가입</a>
<br>
<a href="index.php">게시판으로</a>

</body>
</html>