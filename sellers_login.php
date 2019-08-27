<?php
/**
 * Created by PhpStorm.
 * User: O-Temitayo
 * Date: 03/04/2018
 * Time: 10:38
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/SamBiz/core/init.php';
include 'includes/head.php';

$email = ((isset($_POST['email']))?sanitize($_POST['email']):'');
$email = trim($email);
$password = ((isset($_POST['password']))?sanitize($_POST['password']):'');
$password = trim($password);
$errors = array();
?>
    <style>
        body{
            background-image:url("/SamBiz/assets/img/ocean.jpg");
            background-size: 100vw 100vh;
            background-attachment: fixed;
        }
    </style>
    <div id="login-form">
        <div>

            <?php
            if($_POST){
                //form validation
                if(empty($_POST['email']) || empty($_POST['password'])){
                    $errors[] = 'You must provide email and password.';
                }

                // validate email
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $errors[] = 'You must enter a valid email';
                }

                // password is more than 6 characters
                if(strlen($password) < 6 ){
                    $errors[] = 'Password must be at least 6 characters.';
                }

                // check if email exists in the database
                $query = $db->query("SELECT * FROM signup WHERE email = '$email'");
                $seller = mysqli_fetch_assoc($query);
                $sellerCount = mysqli_num_rows($query);
                if($sellerCount < 1){
                    $errors[] = 'That email doesn\'t exist in our database';
                }

                if(!password_verify($password, $seller['password'])){
                    $errors[] = 'The password does not match our records. Please try again.';
                }

                //check for errors
                if(!empty($errors)){
                    echo display_errors($errors);
                }else{
                    // log user in
                    $seller_id = $seller['id'];
                    sellers_login($seller_id);
                }
            }

            ?>


        </div>
        <h2 class="text-center">Login</h2><hr>
        <form action="sellers_login.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" class="form-control" value="<?= $email; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="email" class="form-control" value="<?= $password; ?>">
            </div>
            <div class="form-group">
                <input type="submit" value="Login" class="btn btn-success">
            </div>
        </form>
        Don't Have An Account? <a href="signup.php">Sign Up Here!</a>
        <p class="text-right"><a href="/SamBiz/index.php" alt="home">Visit Site</a></p>
    </div>
<?php include 'includes/Prettyfooter.php';
