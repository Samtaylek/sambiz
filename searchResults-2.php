<?php
/**
 * Created by PhpStorm.
 * User: AngelofPc
 * Date: 3/6/2018
 * Time: 10:22 PM
 */ 

?>

<br>
<h2 class="text-center feat">Search Results</h2>
<hr>
<div class="clearfix"></div>
</div>
<div class="foot">
    <div class="card-row">
        <?php while ($product = mysqli_fetch_assoc($raw_results)) : ?>
    <div class="card-column">
        <div class="card">

            <h3 class="text-center"><?=$product['title']; ?></h3><p>&nbsp;</p>
 <?php $photos = explode(',',$product['image']); ?>
                <img  src="<?=$photos[0]; ?>" alt="<?=$product['title']; ?>" onclick="detailsmodal(<?=$product['id']; ?>)"   class="img-rounded img-thumb hover-shadow img-responsive  img-thumbnail"/>
            <div class="card-container">

                <h2 class="card-title"><?=$product['seller_info']; ?></h2>
                <p class=" card-title"> ₦<?=$product['price']; ?></p>
                <p class="des"><?=$product['description']; ?></p>
                <p class="loc"><?=$product['location']; ?></p><p>&nbsp;</p>
                <div class="col-md-5"><button type="button" class="btn btn-primary btn-block" onclick="detailsmodal(<?=$product['id']; ?>)" > Buy Now </button></div>
                <div class="col-md-2">&nbsp;</div>

                <div class="col-md-5"><button type="button" class="btn btn-success btn-block" onclick="detailsmodal(<?=$product['id']; ?>)" >Add to Cart </button></div>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
<?php endwhile; ?>



</div>

</div>
<div class="clearfix"></div>
