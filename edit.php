<?php
include 'auth.php';
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM books WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE books SET title=?, author=?, publication_year=? WHERE id=?");
    $stmt->bind_param("ssii", $_POST['title'], $_POST['author'], $_POST['year'], $id);
    $stmt->execute();
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Book</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h2>Edit Book</h2>
  <form method="post">
    <input name="title" value="<?= $row['title'] ?>" required>
    <input name="author" value="<?= $row['author'] ?>" required>
    <input name="year" type="number" value="<?= $row['publication_year'] ?>" required>
    <button>Update</button>
  </form>
</body>
</html>
