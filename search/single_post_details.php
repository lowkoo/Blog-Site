<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('header.php');
?>
<body> 
<span><a href=".?action=editing">EDIT</a></span>
<div class="overall">
<p><a href=".?action=search_data">Back to search</a></p>
<h1>YOUR BLOG POST</h1>
    <?php if(isset($single_search_result)){
        $single_search_result = single_search_result($p_id);
    } ?>
    <img src="<?php echo '../uploads/' . $single_search_result['p_url']; ?>" alt="your blog post" width="500px" height="300px">
    <h2> <?php echo $single_search_result['p_topic']; ?></h2>
    <p><?php echo $single_search_result['p_content']; ?></p>
    <footer>Date Posted: <?php echo $single_search_result['p_date']; ?></footer>

</div>
</body>
</html>