<?php
/**
 * Created by PhpStorm.
 * User: O-Temitayo
 * Date: 10/06/2018
 * Time: 01:50
 */
require '../vendor/autoload.php';

define('SITE_URL','http://localhost/SamBiz/app/');

$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AUivkpZQNcgGfpM6EE87HgxWtJHHD0IK9AZtbqUFHykKIKoy5aTfGMEO5icHZn9C91_tZS5VIFID4Vzv',
        'ED7SeUdkijeXju41EbeocTUrQ_Hf61hG2hvz6CCWXus5p5lFt2_O1y3CvSunvyuMwyORBLW7YXTZFqjN'
    )
);