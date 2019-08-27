<?php
/**
 * Created by PhpStorm.
 * User: O-Temitayo
 * Date: 27/04/2018
 * Time: 20:28
 */?>
</div><div class="clearfix"></div>
<link rel="stylesheet" href="../assets/css/Pretty-Footer.css">
<footer>
    <div  class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 footer-navigation">
                <h3><a href="#">Majog</a></h3>
                <p class="links">
                    <a href="#">About Us</a>
                    <strong> - </strong>
                    <a href="#">Contact Us</a>
                    <strong> - </strong>
                    <a href="#">Featured Product</a>
                    <strong> </strong>
                </p>
                <p class="company-name">Majog &copy; Copyright 2018</p>
            </div>
            <div class="col-md-4 col-sm-6 footer-contacts">
                <div>
                    <span class="fa fa-map-marker footer-contacts-icon"></span>
                    <p>
                        <span class="new-line-span">Block 3 Fajuyi Hall</span>
                        O.A.U, Ile-ife
                    </p>
                </div>
                <div>
                    <i class="fa fa-phone footer-contacts-icon"></i>
                    <p class="footer-center-info email text-left">+2349056932322</p>
                </div>
                <div>
                    <i class="fa fa-envelope footer-contacts-icon"></i>
                    <p>
                        <a href="mailto:Samtaylek@gmail.com" target="blank">Samtaylek@gmail.com</a>
                    </p>
                </div>
            </div>
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-4 footer-about">
                <h4>About Sambiz</h4>
                <p>Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.</p>
                <div class="social-links social-icons">
                    <a href="#"><span class="fa fa-facebook"></span></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="../assets/js/jquery.min.js"></script>

<script src="../assets/js/jquery-2.1.4.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>

<script>
    function updateSizes(){
        var sizeString = '';
        for (var i=1;i<=12;i++){
            if (jQuery('#size'+i).val() !== ''){
                sizeString += jQuery('#size'+i).val()+':'+jQuery('#qty'+i).val()+':'+jQuery('#threshold'+i).val()+',';
            }
        }
        jQuery('#sizes').val(sizeString);
    }
</script>
<script>
    function detailsmodal(id){
        var data = {"id" : id};
        jQuery.ajax({
            url : '/SamBiz/includes/detailsmodal.php',
            method : "post",
            data : data,
            success : function(data){
                jQuery('body').append(data);
                jQuery('#details-modal').modal('toggle');
            },
            error : function(){
                alert("Oops! Something Went Wrong");
            }
        });
    }

    function update_cart(mode,edit_id,edit_size){
        var data = {"mode" : mode, "edit_id" : edit_id, "edit_size" : edit_size};
        jQuery.ajax({
            url : '/SamBiz/admin/parsers/update_cart.php',
            method : "post",
            data : data,
            success : function(){location.reload();},
            error : function(){alert("Something went wrong.");},
        });
    }


    function add_to_cart() {
        jQuery('#modal_errors').html("");
        var size = jQuery('#size').val();
        var quantity = jQuery('#quantity').val();
        var available = jQuery('#available').val();
        var error = '';
        var data = jQuery('#add_product_form').serialize();
        if (size == '' || quantity == '' || quantity == 0) {
            error += '<p class="text-danger text-center">You must choose a size and quantity.</p>';
            jQuery('#modal_errors').html(error);
            return;

        } else if (quantity > available) {
            error += '<p class="text-danger text-center">There are only ' + available + ' available.</p>';
            jQuery('#modal_errors').html(error);
            return;
        }else{
            jQuery.ajax({
                url : '/SamBiz/admin/parsers/add_cart.php',
                method : 'post',
                data : data,
                success : function(){
                    location.reload();
                },
                error : function(){alert("oops! Something went wrong!");}
            });
        }
    }
</script>