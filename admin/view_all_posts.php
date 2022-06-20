 <table class="table table-bordered">
   <thead>
     <tr>
       <th scope="col">Id</th>
       <th scope="col">Status</th>
       <th scope="col">Title</th>
       <th scope="col">Category</th>
       <th scope="col">Author</th>
       <th scope="col">Date</th>
       <th scope="col">Tags</th>
       <th scope="col">Image</th>
       <th scope="col">Comments count</th>
     </tr>
   </thead>
   <tbody>
     <?php
      $posts = findAllPosts();
      while ($row = mysqli_fetch_assoc($posts)) : ?>
       <tr>
         <td scope="col"><?= $row['post_id'] ?></td>
         <td scope="col"><?= $row['post_status'] ?></td>
         <td scope="col"><?= $row['post_title'] ?></td>
         <td scope="col"><?= $row['post_category_id'] ?></td>
         <td scope="col"><?= $row['post_author'] ?></td>
         <td scope="col"><?= $row['post_date'] ?></td>
         <td scope="col"><?= $row['post_tags'] ?></td>
         <td scope="col"><img width="100px" src="../img/<?= $row['post_image'] ?>"></td>
         <td scope="col"><?= $row['post_comment_count'] ?></td>
       </tr>
     <?php endwhile; ?>

   </tbody>
 </table>