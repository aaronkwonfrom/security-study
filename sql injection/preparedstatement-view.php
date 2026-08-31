$id = $_GET['id'];

$stmt = $mysqli->prepare(
    "SELECT * FROM posts WHERE id = ?"
);

$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();

echo "조회된 행 수: " . $result->num_rows;