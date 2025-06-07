<?php include 'auth.php'; include 'db.php';

$id = $_GET['id'];
if ($_POST) {
    $stmt = $conn->prepare("UPDATE books SET title=?, author=?, publication_year=? WHERE id=?");
    $stmt->bind_param("sssi", $_POST['title'], $_POST['author'], $_POST['year'], $id);
    $stmt->execute();
    header("Location: index.php");
}

$book = $conn->query("SELECT * FROM books WHERE id=$id")->fetch_assoc();
?>

<form method="post">
  <input name="title" value="<?= $book['title'] ?>">
  <input name="author" value="<?= $book['author'] ?>">
  <input name="year" value="<?= $book['publication_year'] ?>">
  <button>Update</button>
</form>
