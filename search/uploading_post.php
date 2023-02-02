

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating Blog Post</title>
</head>
<?php
include('header.php');

?>
<body>
    <!-- <a href=".?action=logout">LOGOUT</a> -->
   <div class="wide">
    <h2>KOOL BLOG</h2>
   <form action="." method="post" enctype="multipart/form-data">
   <?php 
    if(!empty($message)){
        echo "<h5 style=color:red;padding:20px;padding-left:90px;>$message</h5>";
    }
    ?>     
        <input type="hidden" name="action" value="uploading">
        <input type="text" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="content" placeholder="Content">
        <input type="date" name="date_posted">
        <input type="file" name="file">
        <input type="submit" value="UPLOAD">
        <?php print_r($_SESSION); ?>
    </form>
   </div>
</body>
</html>