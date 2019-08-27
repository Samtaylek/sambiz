<?php
define('BASEURL', $_SERVER['DOCUMENT_ROOT'].'/SamBiz/');
define('CART_COOKIE','SBw3Yu4W2q177W');
define('CART_COOKIE_EXPIRE',time() + (86400 * 30));
define('TAXRATE',0.087);

define('CURRENCY', 'ngn');
define('CHECKOUTMODE','TEST'); // change TEST to live when hosted

if(CHECKOUTMODE == 'TEST'){
    define('STRIPE_PRIVATE','sk_test_VWUHlEuNYiAwOikJHjWkGO23');
    define('STRIPE_PUBLIC','pk_test_sMOOPpC12kO5n345I7RgzRFt');
}

if(CHECKOUTMODE == 'LIVE'){
    define('STRIPE_PRIVATE','');
    define('STRIPE_PUBLIC','');
}

