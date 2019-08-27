<?php
/**
 * Created by PhpStorm.
 * User: O-Temitayo
 * Date: 22/04/2018
 * Time: 19:41
 */
$sql = "SELECT * FROM products WHERE deleted = 0 AND  (`title` LIKE '%" . $search . "%') OR (`brand` LIKE '%" . $search . "%')
OR (`description` LIKE '%" . $search . "%') OR (`price` LIKE '%" . $search . "%')  OR (`categories` LIKE '%" . $search . "%') ORDER BY id";
$raw_results = $db->query($sql);
?>
<div class="col-md-8">
    <div class="row">
        <h2 class="text-center">Search Results</h2>
        <?php while($product = mysqli_fetch_assoc($raw_results)):
            if(isset($_GET['deleted']) && $_GET['deleted'] == 1){
                $sql2 = "UPDATE products SET featured = 0";
            }
            ?>

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
