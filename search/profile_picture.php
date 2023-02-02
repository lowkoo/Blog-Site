<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Picture</title>
</head>
<body>
    <?php
        if(!empty($message)){
            echo $message;
        }
    ?>
    <form action="." method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="profile_picture">
        <input type="file" name="file">
        <input type="submit" value="UPLOAD">
    </form>
</body>
</html>