<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" type="text/css" href="signup_style.css">
</head>
<body>
    <div class="overall">
    <form action="." method="post">
        <?php
        if($message){
            echo "<h4 style=color:red;padding:10px;padding-left:90px;>$message</h4>";
        }

        ?>
        <input type="hidden"name="action" value="signing"><br><br>
        <input type="text" name="full_name" placeholder="ENTER FULL NAME"><br><br>
        <input type="text" name="username" placeholder="ENTER USERNAME"><br><br>
        <input type="password" name="pass_word" placeholder="ENTER PASSWORD"><br><br>
        <input type="password" name="con_password" placeholder="CONFIRM PASSWORD"><br><br>
        <input type="file" name="file">
        <input type="submit" value="SIGN UP">
    </form>
    </div>
</body>
</html>