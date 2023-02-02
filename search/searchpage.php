<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
</head>
<?php
include('header.php');

?>
<body>

    <h2>SearchDoc</h2>
   <!-- <div class="none">
   <a href=".?action=login"><h4>login</h4></a>
   </div> -->
    <form action="." method="post">
    <?php 
    if(!empty($message)){
        echo "<h5 style=color:red;padding:20px;padding-left:90px;>$message</h5>";
    }
    ?>
        <input type="hidden" name="action" value="search_data">
        <input type="text" name="search">
        <div class="sub">

        <?php if(isset($_SESSION['user_id'])) : ?>
        <a href=".?action=uploading"><input type="none" value="Add Post"></a>
        <?php endif; ?>

        <input type="submit" value="SEARCH">
        </div>
     
    </form>
    
</body>
</html>