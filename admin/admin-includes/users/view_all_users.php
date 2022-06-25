<?php
$sql = 'SELECT * FROM `users`';
$users = mysqli_query($connection, $sql);
checkQueryFailed($users);
?>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Email</th>
      <th scope="col">Image</th>
      <th scope="col">Role</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($users)) : ?>
      <tr>
        <td scope="col"><?= $row['user_id'] ?></td>
        <td scope="col"><?= $row['user_name'] ?></td>
        <td scope="col"><?= $row['user_first_name'] ?></td>
        <td scope="col"><?= $row['user_last_name'] ?></td>
        <td scope="col"><?= $row['user_email'] ?></td>
        <td scope="col"><?= $row['user_image'] ?></td>
        <td scope="col"><?= $row['user_role'] ?></td>
        <td scope="col"><a href="users.php?source=change_status&user_id=<?= $row['user_id'] ?>&status=Admin">Admin</a></td>
        <td scope="col"><a href="users.php?source=change_status&user_id=<?= $row['user_id'] ?>&status=Subscriber">Subscriber</a></td>
        <td scope="col"><a href="users.php?source=edit_user&user_id=<?= $row['user_id'] ?>">Edit</a></td>
        <td scope="col"><a href="users.php?source=delete_user&user_id=<?= $row['user_id'] ?>">Delete</a></td>

      </tr>
    <?php endwhile; ?>

  </tbody>
</table>