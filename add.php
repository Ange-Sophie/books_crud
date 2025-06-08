<?php
include 'auth.php';
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO books (title, author, publication_year) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $_POST['title'], $_POST['author'], $_POST['year']);
    $stmt->execute();
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Book</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h2>Add Book</h2>
  <form method="post">
    <input name="title" placeholder="Title" required>
    <input name="author" placeholder="Author" required>
    <input name="year" type="number" placeholder="Year" required>
    <button>Add</button>
  </form>
</body>
</html>
