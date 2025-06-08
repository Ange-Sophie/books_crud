<?php include 'auth.php'; include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Book List</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h2>Books</h2>
  <a href="add.php">Add Book</a> | <a href="logout.php">Logout</a>
  <table>
    <tr><th>Title</th><th>Author</th><th>Year</th><th>Actions</th></tr>
    <?php
    $result = $conn->query("SELECT * FROM books");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['title']}</td>
            <td>{$row['author']}</td>
            <td>{$row['publication_year']}</td>
            <td>
              <a href='edit.php?id={$row['id']}'>Edit</a> |
              <a href='delete.php?id={$row['id']}'>Delete</a>
            </td>
        </tr>";
    }
    ?>
  </table>
</body>
</html>
