<?php

include('./partials/header.php');

$title = $content = '';
$titleErr = $contentErr = '';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $id = $_GET['id'];

    $sql = "SELECT * FROM blog WHERE blog_id=$id";

    $sql_query = mysqli_query($conn, $sql);

    $blog = mysqli_fetch_all($sql_query, MYSQLI_ASSOC)[0];

    $title = $blog['blog_title'];

    $content = $blog['blog_content'];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['title'])) {
        $titleErr = 'PLEASE ENTER BLOG TITLE';
    } else {
        $title = htmlspecialchars($_POST['title']);
    }

    if (empty($_POST['content'])) {
        $contentErr = 'PLEASE ENTER BLOG CONTENT';
    } else {
        $content = htmlspecialchars($_POST['title']);
    }

    if ($title !== '' && $content !== '') {


        $sql = "UPDATE blog SET blog_title = '$title', blog_content='$content', user_id='1' WHERE blog_id = '$id'";

        $sql_query = mysqli_query($conn, $sql);

        if ($sql_query) {
            header('Location: index.php');
        } else {
            echo 'an error occured';
        }
    }
}

?>

<div class="container">
    <form action="" class='border rounded p-3 mt-5 m-auto' style='width: 60%' method='POST'>

        <?php if ($titleErr) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?php echo $titleErr ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
        <?php elseif ($contentErr) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?php echo $contentErr ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
        <?php endif ?>

        <h4>UPDATE BLOG POST</h4>
        <div class="mb-3">
            <input type="text" hidden value=<?php echo $id ?>>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter blog title" name='title' value=<?php echo $title ?>>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Content</label>
            <textarea placeholder='Enter blog content' class="form-control" id="exampleFormControlTextarea1" rows="3" name='content'><?php echo $content  ?></textarea>
        </div>
        <button class='btn btn-primary'>UPDATE POST</button>
    </form>
</div>
<?php include('./partials/footer.php') ?>