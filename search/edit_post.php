<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if (isset($message)){
        echo $message;
    }
    ?>
    
    <form action="." method="post">
        <input type="text" name="action" value="editing">
        <input type="hidden" name="p_id" value="<?php echo $p_id; ?>"><br><br>
        <input type="text" name="p_topic" placeholder="TOPIC" value="<?php echo $single_post_to_edit['p_topic'];?>"><br><br>
        <textarea name="p_content" id="" cols="30" rows="10" placeholder="CONTENT"><?php echo $single_post_to_edit['p_content'];?></textarea><br><br>
        <input type="date" name="p_date" value="<?php echo $single_post_to_edit['p_date'];?>"><br><br>
        <input type="submit" value="UPDATE"><br><br>

    </form>
</body>
</html>