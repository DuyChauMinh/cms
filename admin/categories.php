<?php

include 'includes/ad_header.php';
// include '../includes/db.php';
?>

    <div id="wrapper">
    

        <!-- Navigation -->
        <?php include 'includes/ad_navigation.php'; ?>

        <div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin pages
                <small>...</small>
            </h1>
    <div class="col-xs-6">
<?php if (isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];
    //post bang name cua input
    //nhập mysql mới bằng tên của cột trong bảng
    if ($cat_title == '' || empty($cat_title)) {
        echo 'cant empty';
    } else {
        $query = "INSERT INTO categories(catTitle) VALUE('{$cat_title}')";
        $create_cat = mysqli_query($conn, $query);
        if (!$create_cat) {
            die('query failed' . mysqli_error($conn));
        }
    }
} ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="cat-title">Category add</label>
                <input type="text" class="form-control" name='cat_title'>
            </div>
            <div class="form-group">
                <input class="btn btn-primary"type="submit" name='submit' value='Add category'>
            </div>
        </form>


<?php if (isset($_GET['edit'])) {
    $cat_id = $_GET['edit'];
    include 'includes/update_categories.php';
} ?>    
</div>
<div class="col-xs-6">

        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cat title</th>
                </tr>
                <tbody>
                    
                        <?php
                        //find cat
                        $query = 'SELECT * FROM categories';
                        $select_categories = mysqli_query($conn, $query);
                        //display cat
                        while ($row = mysqli_fetch_assoc($select_categories)) {
                            $cat_title = $row['catTitle'];
                            $cat_id = $row['catID'];
                            echo '<tr>';
                            echo "<td>{$cat_id}</td>";
                            echo "<td>{$cat_title}</td>";
                            echo "<td><a href='categories.php?delete={$cat_id}'>delete</a></td>";
                            echo "<td><a href='categories.php?edit={$cat_id}'>edit</a></td>";
                            echo '</tr>';
                        }
                        //delete row from cat table
                        if (isset($_GET['delete'])) {
                            $the_cat_id = $_GET['delete'];
                            $query = "DELETE FROM categories WHERE catID = {$the_cat_id}";
                            $delete_query = mysqli_query($conn, $query); //không có header thì phải load lại trang hoặc ấn delete 2 lần mới xóa được 1 row //The header() function sends a raw HTTP header to a client. // It is important to notice that the header() function must be called before any actual output is sent!
                            header('Location: categories.php');
                        }
                        ?>
                    
                </tbody>
            </thead>
        </table>

</div>   
        
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
        
    <!-- /#wrapper -->
<?php include 'includes/ad_footer.php'; ?>
