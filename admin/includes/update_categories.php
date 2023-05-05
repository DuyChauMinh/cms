<form action="" method="post">
            <div class="form-group">
                <label for="cat-title">Category Update</label>

                
<?php if (isset($_GET['edit'])) {
    $id_from_get_edit = $_GET['edit'];
    $query = "SELECT * FROM categories WHERE catId = $id_from_get_edit ";
    $select_categories_id = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($select_categories_id)) {

        $cat_id = $row['catID'];
        $cat_title = $row['catTitle'];
        ?>
<input value="<?php if (isset($cat_title)) {
    echo $cat_title;
} ?>" class="form-control" type="text" name="cat_title">
<?php
    }
} ?>
<?php if (isset($_POST['update_category'])) {
    $the_cat_title = $_POST['cat_title'];
    $query = "UPDATE categories SET catTitle = '{$the_cat_title}' WHERE catID={$cat_id}";
    $update_query = mysqli_query($conn, $query);
    if (!$update_query) {
        die('query fail' . mysqli_error($conn));
    }
} ?>
            </div>
            <div class="form-group">
                <input class="btn btn-primary"type="submit" name='update_category' value='Edit category'>
            </div>
        </form>





    </div>