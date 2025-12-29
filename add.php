<?php
include 'db.php';

if (isset($_POST['save'])) {
    $name  = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $doc = $_POST['doc'];

    mysqli_query($conn, "INSERT INTO basic_info (name, address, mobile, doc) VALUES ('$name','$address','$mobile','$doc')");
    header("Location: index.php");
}
?>

<h3>Add User</h3>
<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Address: <input type="text" name="address" required><br><br>
    Mobile: <input type="text" name="mobile" required><br><br>
    doc: <input type="text" name="doc" required><br><br>
    <button name="save">Save</button>
</form>
