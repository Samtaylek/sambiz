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

if(isset($_GET['cat'])){
    $cat_id = sanitize($_GET['cat']);
}else{
    $cat_id = '';
}

$sql = "SELECT * FROM products WHERE categories = '$cat_id' AND featured = 1";
$productQ = $db->query($sql);
$category = get_category($cat_id);
?>
<!-- Main Content -->
    <div class="col-md-8">
        <div class="row">
            <h2 class="text-center"><?= $category['parent']. ' ' . $category['child']; ?></h2>
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