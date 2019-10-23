



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php foreach($limitedPosts as $i) { ?>
    <article>
        <header>
            <h3><?php echo $i['title'] ?></h3>
        </header>
        <p><?php echo '<img height="150" width="150" src="data:image;base64,'. $i['image'] .' "> ' ?></p>
        <p><?php echo $i['posted_at'] ?></p>
        <footer>
            <?php echo '<a href="moreInfo.php?page=' .$i['id']. '" class="button special">' . 'More' . '</a>'?>
        </footer>
    </article>
<?php } ?>

</body>
</html>