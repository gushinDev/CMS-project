<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Status</th>
      <th scope="col">Post_id</th>
      <th scope="col">Author</th>
      <th scope="col">Email</th>
      <th scope="col">Content</th>
      <th scope="col">Date</th>
      <th scope="col">Approve</th>
      <th scope="col">Unapprove</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $comments = findAllComments();

    while ($row = mysqli_fetch_assoc($comments)) : ?>
      <tr>
        <td scope="col"><?= $row['comment_id'] ?></td>
        <td scope="col"><?= $row['comment_status'] ?></td>
        <td scope="col"><a href="../post.php?id=<?= $row['comment_post_id'] ?>">Post</a></td>
        <td scope="col"><?= $row['comment_author'] ?></td>
        <td scope="col"><?= $row['comment_email'] ?></td>
        <td scope="col"><?= $row['comment_content'] ?></td>
        <td scope="col"><?= $row['comment_date'] ?></td>
        <td scope="col"><a href="comments.php?source=change_status&comment_id=<?= $row['comment_id'] ?>&status=Published">Publish</a></td>
        <td scope="col"><a href="comments.php?source=change_status&comment_id=<?= $row['comment_id'] ?>&status=Not published">Not publish</a></td>
        <td scope="col"><a href="comments.php?source=edit_comment&comment_id=<?= $row['comment_id'] ?>">Edit</a></td>
        <td scope="col"><a href="comments.php?source=delete_comment&comment_id=<?= $row['comment_id'] ?>">Delete</a></td>
      </tr>
    <?php endwhile; ?>

  </tbody>
</table>