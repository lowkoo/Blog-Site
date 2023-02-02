

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
    <?php
    include('header.php');
    ?>
</head>
<body>
   <div class="overall">
    <h2>Your Search Result</h2>

    <p>We found <?php echo $row_count?> result<?php echo $singular_plural_ending; ?> that matches your search</p>

    <?php foreach ($search_result as $search) : ?>
      <a href=".?action=single_search_result&amp;p_id=<?php echo $search['p_id']; ?>"><h3><?php echo $search['p_topic']; ?></h3></a>

    <?php endforeach; ?>
    
   </div>

</body>
</html>