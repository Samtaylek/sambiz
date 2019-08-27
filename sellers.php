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

$sql = "SELECT * FROM custom_goods WHERE featured = 1 && deleted = 0";
$productQ = $db->query($sql);
$category = get_category($cat_id);
?>
    <!-- Main Content -->
    <div class="col-md-8">
        <div class="row">
            <h2 class="text-center">Featured Products</h2>
            <?php while($product = mysqli_fetch_assoc($productQ)): ?>
                <div class="col-md-3 text-center">
                        <div class="thumbnail">
                            <h3><?= $product['title']; ?></h3>
                            <img  id="myImg" class="img-thumb" src="<?= $product['image']; ?>" alt="<?= $product['title']; ?>" style="height: 200px">
                            <p class="price">Our Price: $<?= $product['price']; ?></p>
                            <div class="btn-group">
                                <a href="mailto:<?=$product['email'];?>" type="button" class="btn btn-primary">Chat</a><button data-toggle="tooltip" data-placement="bottom" title="<?=$product['phone_number'];?>" type="button" class="btn btn-primary">Phone Number</button>
                            </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

    </div>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<?php
include 'includes/Rightbar.php';
include 'includes/prettyfooter.php';
?>