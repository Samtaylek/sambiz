<?php
/**
 * Created by PhpStorm.
 * User: O-Temitayo
 * Date: 05/04/2018
 * Time: 21:51
 */
require_once 'core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/carousel.php';
include 'includes/headerfull.php';
include 'includes/leftbar.php';

$sql = "SELECT * FROM products";
$cat_id =(($_POST['cat'] != '')?sanitize($_POST['cat']):'');
if($cat_id == ''){
    $sql .= ' WHERE deleted = 0';
}else{
    $sql .= " WHERE categories = '{$cat_id}' AND deleted = 0";
}
$price_sort = (($_POST['price_sort'] != '')?sanitize($_POST['price_sort']):'');
$min_price = (($_POST['min_price'] != '')?sanitize($_POST['min_price']):'');
$max_price = (($_POST['max_price'] != '')?sanitize($_POST['max_price']):'');
$brand = (($_POST['brand'] != '')?sanitize($_POST['brand']):'');
if($min_price != ''){
    $sql .= " AND price >= '{$min_price}'";
}
if($max_price != ''){
    $sql .= " AND price <= '{$max_price}'";
}
if($brand != ''){
    $sql .= " AND brand = '{$brand}'";
}
if($price_sort == 'low'){
    $sql .= " ORDER BY price";
}
if($price_sort == 'high'){
    $sql .= " ORDER BY price DESC";
}
$productQ = $db->query($sql);
$category = get_category($cat_id);
?>
    <!-- Main Content -->
    <div class="col-md-8">
        <div class="row">
            <?php if($cat_id != ''): ?>
            <h2 class="text-center"><?= $category['parent']. ' ' . $category['child']; ?></h2>
            <?php else: ?>
                <h2 class="text-center">Majog Nigeria</h2>
            <?php endif;?>
            <?php while($product = mysqli_fetch_assoc($productQ)): ?>
                <div class="col-md-3 text-center">
                    <div class="thumbnail">
                        <h3><?= $product['title']; ?></h3>
                        <img onclick="detailsmodal(<?= $product['id']; ?>)" id="myImg" class="img-thumb" src="<?= $product['image']; ?>" alt="<?= $product['title']; ?>" style="height: 200px">
                        <p class="price">Our Price: $<?= $product['price']; ?></p>
                        <p class="list-price text-danger">List Price: <s>$<?= $product['list_price']; ?></s></p>
                        <button class="btn btn-lg btn-primary" type="button" onclick="detailsmodal(<?= $product['id']; ?>)" style="margin-bottom:14px;">Place Your Order</button>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

    </div>

<?php
include 'includes/Rightbar.php';
include 'includes/prettyfooter.php';
?>