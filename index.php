<?php
    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/navigation.php';
    include 'includes/carousel.php';
    include 'includes/Welcome.php';
    include 'includes/headerfull.php';
    include 'includes/leftbar.php';

        $sql = "SELECT * FROM products WHERE featured = 1";
        $featured = $db->query($sql);

if(isset($_GET['delete'])){
    $id = sanitize($_GET['delete']);
    $restored = ("UPDATE products SET deleted = 1 WHERE id = '$id'");
    $db->query($restored);
    header('Location: products.php');
//    $db->query("SELECT * FROM products WHERE deleted = 1");
}
?>

    <div class="col-md-8">
        <div class="row">
            <h2 class="text-center">Featured Products</h2>
            <?php while($product = mysqli_fetch_assoc($featured)):
                if(isset($_GET['deleted']) && $_GET['deleted'] == 1){
                    $sql2 = "UPDATE products SET featured = 0";
                }
                ?>
        <!--<div class="col-md-3">
            <div class="card" style="background-color:white">
                <h3 class="text-center"><?= $product['title']; ?></h3>
                            <img onclick="detailsmodal(<?= $product['id']; ?>)" id="myImg" class="img-thumb" src="<?= $product['image']; ?>" alt="<?= $product['title']; ?>" style="height: 200px; width:100%;">
                <div class="text-center" style="background-color:white;">
                    <p class="price">Our Price: $<?= $product['price']; ?></p>
                                <p class="list-price text-danger">List Price: <s>$<?= $product['list_price']; ?></s></p>
                                <button class="btn btn-md btn-primary" type="button" onclick="detailsmodal(<?= $product['id']; ?>)" style="border-radius:10px; margin-bottom:14px;">Place Your Order</button>
                </div>
            </div>
        </div>-->


                <div class="col-md-3 text-center">
                        <h3><?= $product['title']; ?></h3>
                            <img onclick="detailsmodal(<?= $product['id']; ?>)" id="myImg" class="img-thumb" src="<?= $product['image']; ?>" alt="<?= $product['title']; ?>" style="height: 200px; width:200px;">
                                <p class="price">Our Price: $<?= $product['price']; ?></p>
                                <p class="list-price text-danger">List Price: <s>$<?= $product['list_price']; ?></s></p>
                                <button class="btn btn-md btn-primary" type="button" onclick="detailsmodal(<?= $product['id']; ?>)" style="border-radius:10px; margin-bottom:14px;">Place Your Order</button>
                </div>

            <?php endwhile; ?>
            </div>

        </div>

<?php
include 'includes/Rightbar.php';
include 'includes/prettyfooter.php';
?>
