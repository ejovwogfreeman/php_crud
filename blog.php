<?php 

    include('./partials/header.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM blog WHERE blog_id = $id";

    $sql_query = mysqli_query($conn, $sql);

    $blogs = mysqli_fetch_all($sql_query, MYSQLI_ASSOC);

?>
    <div class="container">
        <?php foreach ($blogs as $blog): ?>
            <div class="card m-auto mt-5 m-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $blog['blog_title'] ?></h5>
                    <p class="card-text"><?php echo $blog['blog_content'] ?></p>
                    <a href="update.php" class="btn btn-outline-primary">UPDATE</a>
                    <a href="delete.php" class="btn btn-outline-danger ms-2">DELETE</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
<?php include('./partials/footer.php') ?>

