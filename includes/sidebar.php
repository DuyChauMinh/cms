<div class="col-md-4">


<?php if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM posts where post_tag LIKE '%$search%'";
    $search_query = mysqli_query($conn, $query);
    if (!$search_query) {
        die('FAILED' . mysqli_error($conn));
    }
    $count = mysqli_num_rows($search_query);
    if ($count == 0) {
        echo 'No result';
    } else {
        echo 'true';
    }
} ?>

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
    <div class="input-group">
        <input name='search' type="text" class="form-control">
        <span class="input-group-btn">
            <button name='submit' class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>
 




<!-- Blog Categories Well -->
<div class="well">
<?php
$query = 'SELECT * FROM categories';
$SELECT_CAL_SIDEBAR = mysqli_query($conn, $query);
?>
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php while ($row = mysqli_fetch_assoc($SELECT_CAL_SIDEBAR)) {
                    $catTitle = $row['catTitle'];
                    echo "<li><a href=''>{$catTitle}</a></li>";
                } ?>
                
            </ul>
        </div>
       
    </div>
    <!-- /.row -->
</div>





<!-- Side Widget Well -->
<?php include 'includes/widget.php'; ?>

</div>