<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM basic_info");
?>

<h3>User List</h3>
<a href="add.php">+ Add New</a><br><br>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Address</th>
    <th>Mobile</th>
    <th>Doc</th>
    <th>Action</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['address'] ?></td>
    <td><?= $row['mobile'] ?></td>
    <td><?= $row['doc'] ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $row['id'] ?>" 
           onclick="return confirm('Delete?')">Delete</a>
    </td>
</tr>
<?php } ?>
</table>
