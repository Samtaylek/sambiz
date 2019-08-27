<?php
/**
 * Created by PhpStorm.
 * User: O-Temitayo
 * Date: 02/04/2018
 * Time: 20:37
 */
require_once  $_SERVER['DOCUMENT_ROOT'].'/SamBiz/core/init.php';
if(!is_logged_in()){
    login_error_redirect();
}
include 'includes/head.php';
include 'includes/navigation.php';

    if(isset($_GET['restore'])){
        $id = sanitize($_GET['restore']);
        $db->query("SELECT * FROM products WHERE deleted = 1");
        $restored = ("UPDATE products SET deleted = 0 WHERE id = '$id'");
        $db->query($restored);
        $db->query = ("SELECT * FROM products WHERE featured = 0");
        $alive = ("UPDATE products SET featured = 1 WHERE deleted = 0");
        $db->query($alive);
        header('Location: archived.php');
    }
?>
<?php
$sql = "SELECT * FROM products WHERE deleted = 1";
$pResults = $db->query($sql);
if(isset($_GET['featured'])){
    $id = (int)$_GET['id'];
    $featured = (int)$_GET['featured'];
    $featuredSql = "UPDATE products SET featured = '$featured' WHERE id = '$id'";
    $db->query($featuredSql);
    header('Location: archived.php');
}
//if(isset($_GET['deleted']) && $_GET['deleted'] != 0){
//    $id = sanitize($_GET['delete']);
//    $featured = (int)$_GET['featured'];
//    $featuredSql = "UPDATE products SET featured = '' WHERE id = '$id'";
//    $db->query($featuredSql);
//    header('Location: archived.php');
//}
?>
<br><br>
<h2 class="text-center">Archived Products</h2>
    <div class="clearfix"></div>
    <hr>
<table class="table table-bordered table-condensed table-striped">
    <thead><th></th><th>Products</th><th>Price</th><th>Category</th><th>Sold</th></thead>
    <tbody>
    <?php while($product = mysqli_fetch_assoc($pResults)):
    $childID = $product['categories'];
    $catSql = "SELECT * FROM categories WHERE id = '$childID'";
    $result = $db->query($catSql);
    $child = mysqli_fetch_assoc($result);
    $parentID = $child['parent'];
    $pSql = "SELECT * FROM categories WHERE id = '$parentID'";
    $pResult = $db->query($pSql);
    $parent = mysqli_fetch_assoc($pResult);
    $category = $parent['category'].'-'.$child['category'];
    ?>
        <tr>
            <td><a href="archived.php?restore=<?= $product['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-refresh"></span></a></td>
            <td><?= $product['title']; ?></td>
            <td><?= money($product['price']); ?></td>
            <td><?= $category; ?></td>
            <td>0</td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
<?php
include 'includes/footer.php';