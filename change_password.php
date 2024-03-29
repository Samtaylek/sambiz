<?php
/**
 * Created by PhpStorm.
 * User: O-Temitayo
 * Date: 03/04/2018
 * Time: 10:38
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/SamBiz/core/init.php';
if(!is_sellers_logged_in()){
    sellers_login_error_redirect();
}
include 'includes/head.php';

$hashed = $seller_data['password'];
$old_password = ((isset($_POST['old_password']))?sanitize($_POST['old_password']):'');
$old_password = trim($old_password);
$password = ((isset($_POST['password']))?sanitize($_POST['password']):'');
$password = trim($password);
$confirm = ((isset($_POST['confirm']))?sanitize($_POST['confirm']):'');
$confirm = trim($confirm);
$new_hashed = password_hash($password, PASSWORD_DEFAULT);
$seller_id = $seller_data['id'];
$errors = array();
$success = array();
?>

    <div id="login-form">
        <div>

            <?php
            if($_POST){
                //form validation
                if(empty($_POST['old_password']) || empty($_POST['password']) || empty($_POST['confirm'])){
                    $errors[] = 'You must fill out all fields.';
                }

                // password is more than 6 characters
                if(strlen($password) < 6 ){
                    $errors[] = 'Password must be at least 6 characters.';
                }

                //if new password matches confirm
                if($password != $confirm){
                    $errors[] = 'The new password and confirm new password does not match';
                }

                if(!password_verify($old_password, $hashed)){
                    $errors[] = 'Your old password does not match our records.';
                }

                //check for errors
                if(!empty($errors)){
                    echo display_errors($errors);
                }else{
                    //change password
                    $db->query("UPDATE signup SET password = '$new_hashed' WHERE id = '$seller_id'");
                    $success[] = 'Your Password Has Been Successfully Updated';
                    if(empty($errors)){
                        echo display_success($success);
                    }
                    header('Location: products.php');
                }
            }

            ?>


        </div>
        <h2 class="text-center">Change Password</h2><hr>
        <form action="change_password.php" method="post">
            <div class="form-group">
                <label for="old_password">Old Password:</label>
                <input type="password" name="old_password" id="old_password" class="form-control" value="<?= $old_password; ?>">
            </div>
            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" name="password" id="password" class="form-control" value="<?= $password; ?>">
            </div>
            <div class="form-group">
                <label for="confirm">Confirm New Password:</label>
                <input type="password" name="confirm" id="confirm" class="form-control" value="<?= $confirm; ?>">
            </div>
            <div class="form-group">
                <a href="index.php" class="btn btn-default">Cancel</a>
                <input type="submit" value="Login" class="btn btn-success">
            </div>
        </form>
        <p class="text-right"><a href="/SamBiz/index.php" alt="home">Visit Site</a></p>
    </div>
<?php include 'includes/Prettyfooter.php';