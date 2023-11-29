<?php include('./partials/header.php') ?>
    <div class="container">
        <form action="" class='border rounded p-3 mt-5 m-auto' style='width: 60%'>
            <h4>UPDATE POST</h4>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter blog title">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                <textarea placeholder='Enter blog content' class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button class='btn btn-primary'>UPDATE</button>
        </form>
    </div>
<?php include('./partials/footer.php') ?>