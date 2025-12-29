<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM basic_info WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name    = $_POST['name'];
    $address = $_POST['address'];
    $mobile  = $_POST['mobile'];
    $doc     = $_POST['doc'];

    $query = "UPDATE basic_info 
              SET name='$name', address='$address', mobile='$mobile', doc='$doc' 
              WHERE id='$id'";
            //   echo $query; exit;

    if (!mysqli_query($conn, $query)) {
        die("Update Failed: " . mysqli_error($conn));
    }

    header("Location: index.php");
}
?>

<h3>Edit User</h3>
<form method="post">
    Name: <input type="text" name="name" value="<?= $data['name'] ?>"><br><br>
    Address: <input type="text" name="address" value="<?= $data['address'] ?>"><br><br>
    Mobile: <input type="text" name="mobile" value="<?= $data['mobile'] ?>"><br><br>
    Doc: <input type="text" name="doc" value="<?= $data['doc'] ?>"><br><br>

    <button type="submit" name="update">Update</button>
</form>
