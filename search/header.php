<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" type="text/css" href="login_page.css">
    <link rel="stylesheet" type="text/css" href="search_page.css">
    <link rel="stylesheet" type="text/css" href="uploading_page.css">
    <link rel="stylesheet" type="text/css" href="singlepage_result.css">
</head>
<body>
<div class="all">
        <div class="logo"><h3>KOOL BLOG</h3></div>
        <div class="iner">
        <ul>  
        <?php  if(!isset($_SESSION['user_id'])):?> 
            <li><a href=".?action=signing">SIGN UP</a></li>
            <?php endif; ?>

        <?php  if(!isset($_SESSION['user_id'])):?> 
            <li><a href=".?action=login">LOGIN</a></li>
            <?php endif; ?> 

        <?php  if(isset($_SESSION['user_id'])):?> 
            <li><a href=".?action=logout">LOGOUT</a></li>
            <?php endif; ?>   

        <?php  if(isset($_SESSION['user_id'])):?> 
            <li><a href=".?action=profile_picture">ADD PICTURE</a></li>
        <?php endif; ?> 

            <li><a href=".?action=show_dashboard">Dashboard</a></li>

        <div class="profile_pics">
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href=""><img src="<?php echo '../uploads/' .  $single_search_result['profile_picture']; ?>" alt="" width="100px"></a>
        <?php endif; ?>      
        </div>

                </ul>  
            </div>
    </div>
</body>
</html>