<?php
function display_errors($errors){
    $display = '<ul class="bg-danger" style="border-radius: 10px;">';
    foreach($errors as $error){
        $display .= '<li class="text-danger">'.$error.'</li>';
    }
    $display .= '</ul>';
    return $display;
}
function display_success($success){
    $displays = '<ul class="bg-danger" style="border-radius: 10px;">';
    foreach($success as $successe){
        $displays .= '<li class="text-danger">'.$successe.'</li>';
    }
    $displays .= '</ul>';
    return $displays;
}
function sanitize($dirty){
    return htmlentities($dirty, ENT_QUOTES, "UTF-8");
}

function money($number){
    return '$'.number_format($number,2);
}

function signup($seller_id){
    $_SESSION['SBSeller'] = $seller_id;
    $_SESSION['success_flash'] = 'You have successfully signed in!';
    header('Location: products.php');
}

function is_signed_in(){
    if(isset($_SESSION['SBSeller']) && $_SESSION['SBSeller'] > 0){
        return true;
    }
    return false;
}

function signin_redirect($url = 'products.php'){
    $_SESSION['success_flash'] = 'You have successfully signed in';
    header('Location: '.$url);
}

function signin_error_redirect($url = 'signup.php'){
    $_SESSION['error_flash'] = 'You must be logged in to access that page';
    header('Location: '.$url);
}

function login($user_id){
    $_SESSION['SBUser'] = $user_id;
    global $db;
    $date = date("Y-m-d H:i:s");
    $db->query("UPDATE users SET last_login = '$date' WHERE id = '$user_id'");
    $_SESSION['success_flash'] = 'You are now logged in!';
    header('Location: index.php');
}

function is_logged_in(){
    if(isset($_SESSION['SBUser']) && $_SESSION['SBUser'] > 0){
        return true;
    }
    return false;
}

function login_error_redirect($url = 'login.php'){
    $_SESSION['error_flash'] = 'You must be logged in to access that page';
    header('Location: '.$url);
}

function permission_error_redirect($url = 'login.php'){
    $_SESSION['error_flash'] = 'You do not have permission to access that page';
    header('Location: '.$url);
}


function sellers_login($seller_id){
    $_SESSION['SBSeller'] = $seller_id;
    global $db;
    $date = date("Y-m-d H:i:s");
    $db->query("UPDATE signup SET last_login = '$date' WHERE id = '$seller_id'");
    $_SESSION['success_flash'] = 'You are now logged in!';
    header('Location: products.php');
}

function is_sellers_logged_in(){
    if(isset($_SESSION['SBSeller']) && $_SESSION['SBSeller'] > 0){
        return true;
    }
    return false;
}

function sellers_login_error_redirect($url = 'sellers_login.php'){
    $_SESSION['error_flash'] = 'You must be logged in to access that page';
    header('Location: '.$url);
}

function has_permission($permission = 'admin'){
    global $user_data;
    $permissions = explode(',', $user_data['permissions']);
    if(in_array($permission,$permissions,true)){
        return true;
    }
    return false;
}

function pretty_date($date){
    return date("M d, Y h:i: A",strtotime($date));
}

function get_category($child_id){
    global $db;
    $id = sanitize($child_id);
    $sql = "SELECT p.id AS 'pid', p.category AS 'parent', c.id AS 'cid', c.category AS 'child'
            FROM categories c
            INNER JOIN categories p
            ON c.parent = p.id
            WHERE c.id = '$id'";
    $query = $db->query($sql);
    $category = mysqli_fetch_assoc($query);
    return $category;
}

function sizesToArray($string){
    $sizesArray = explode(',',$string);
    $returnArray = array();
    foreach($sizesArray as $size){
        $s = explode(':',$size);
        $returnArray[] = array('size' => $s[0], 'quantity' => $s[1], 'threshold' => $s[2]);
    }
    return $returnArray;
}

function sizesToString($sizes){
    $sizeString = '';
    foreach($sizes as $size){
        $sizeString .= $size['size'].':'.$size['quantity'].':'.$size['threshold'].',';
    }
    $trimmed = rtrim($sizeString, ',');
    return $trimmed;
}