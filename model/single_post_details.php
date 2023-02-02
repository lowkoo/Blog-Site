<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Post Search</h2>
    <p>Topic: <?php echo $single_search_result['p_topic']; ?></p>
    <p>Content: <?php echo $single_search_result['p_content']; ?></p>
    <p>Post date: <?php echo $single_search_result['p_date']; ?></p>

    <p><a href=".?action=search_data">Back to search</a></p>
</body>
</html>