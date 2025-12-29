<?php
include 'db.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM basic_info WHERE id=$id");

header("Location: index.php");
?>
