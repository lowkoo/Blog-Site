<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href=".?action=uploading">Add Post</a>
    <table border>
        <tr>
            <th>TOPIC</th>
            <th>CONTENT</th>
            <th>DATE</th>
            <th>PICTURE</th>
        </tr>
        <?php foreach($post_by_user_id as $post){ ?>
        <tr>
           
              <td>  <?php echo $post['p_topic']; ?></td>
              <td>   <?php echo $post['p_content']; ?></td>
              <td>   <?php echo $post['p_date']; ?></td>
              <td>   <?php echo $post['p_url'];?></td>
              <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="edit_post">
                    <input type="hidden" name="p_id" value="<?php echo $post['p_id']; ?>">
                    <input type="submit" value="EDIT">
                </form>
              </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>