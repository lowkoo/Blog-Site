<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <?php 
    include('header.php');
    ?>
</head>
<body>
    <?php
    if(!empty($message)){
        echo "<h4 style=color:red;padding:20px;padding-left:90px;>$message</h4>";
    }
    if(isset($_SESSION['user_id'])){
        header("location: .?searchpage.php");
    }
    ?>
    <form action="." method="post">
        <input type="hidden" name="action" value="login">
        <input type="text" name="user_name" placeholder="ENTER USERNAME"><br><br>
        <input type="password" name="pass" placeholder="ENTER PASSWORD"><br><br>
        <input type="submit" value="LOGIN">
    </form>
</body>
</html>