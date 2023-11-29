<?php 

    include('./partials/header.php');

    $sql = "SELECT * FROM blog";

    $sql_query = mysqli_query($conn, $sql);

    $blogs = mysqli_fetch_all($sql_query, MYSQLI_ASSOC);

?>

    <div class="container">
        <h3 class='my-3'>My Awesome Blog</h3>
        <?php foreach ($blogs as $blog): ?>
        <div class="card m-auto mb-3" style='text-align: justify'>
            <div class="card-body">
                <h5 class="card-title"><?php echo $blog['blog_title'] ?></h5>
                <p class="card-text"><?php echo substr($blog['blog_content'], 0, 200) ?>...<a href=<?php echo "blog.php?id={$blog['blog_id']}" ?> class="card-link">READ MORE</a></p>
            </div>
        </div>
        <?php endforeach ?>
    </div>
<?php include('./partials/footer.php') ?>


