<?php
/**
 * Created by PhpStorm.
 * User: O-Temitayo
 * Date: 03/04/2018
 * Time: 19:52
 */
require_once 'core/init.php';
if(is_signed_in()){
    signin_redirect();
}
include 'includes/head.php';
//include 'includes/navigation2.php';
echo '<br><br>';

$full_name = ((isset($_POST['full_name'])) ? sanitize($_POST['full_name']) : '');
if(!preg_match("/^[a-zA-Z ]*$/",$full_name)){
    $errors[] = 'Only Letters and whitespaces are allowed';
}
$email = ((isset($_POST['email']))?sanitize($_POST['email']):'');
$email = trim($email);
$password = ((isset($_POST['password']))?sanitize($_POST['password']):'');
$password = trim($password);
$confirm = ((isset($_POST['confirm']))?sanitize($_POST['confirm']):'');
$confirm = trim($confirm);
$errors = array();

?>
<style>
    body{
        background-image:url("/SamBiz/assets/img/ocean.jpg");
        background-size: 100vw 100vh;
        background-attachment: fixed;
    }
</style>
<div id="signup-form">
    <div>
<?php
    if($_POST) {
        $emailQuery = $db->query("SELECT * FROM signup WHERE email = '$email'");
        $seller = mysqli_fetch_assoc($emailQuery);
        $emailCount = mysqli_num_rows($emailQuery);


        if (($emailCount != 0)) {
            $errors[] = 'That email already exist in our database.';
        }


        $required = array('full_name', 'email', 'password', 'confirm');
        foreach ($required as $f) {
            if (empty($_POST[$f])) {
                $errors[] = 'You must fill out all fields.';
                break;
            }
        }
        if (strlen($password) < 6) {
            $errors[] = 'Your password must be at least 6 characters.';
        }

        if ($password != $confirm) {
            $errors[] = 'Your password do not match';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'You must enter a valid email';
        }
        if (!empty($errors)) {
            echo display_errors($errors);
        } else {
            //Add user to database
                $seller_id = $seller['id'];
                $_SESSION['SBSeller'] = $seller_id;
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                $db->query("INSERT INTO signup (full_name,email,password) VALUES('$full_name','$email','$hashed')");
                $_SESSION['success_flash'] = 'You have successfully signed in!';
                header('Location: sellers_login.php');
        }
    }
    ?>
    </div>
    <h2 class="text-center">Sign Up</h2><hr>
    <form action="signup.php" method="post">
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" name="full_name" id="full_name" class="form-control" value="<?= $full_name; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" value="<?= $email; ?>">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" value="<?= $password; ?>">
        </div>
        <div class="form-group">
            <label for="confirm">Confirm Password:</label>
            <input type="password" name="confirm" id="confirm" class="form-control" value="<?= $confirm; ?>">
        </div>
        <div class="form-group text-right">
            <a href="index.php" class="btn btn-default">Cancel</a>
            <input type="submit" value="Sign Up" class="btn btn-primary">
        </div>
    </form>
    Already Have An Account? <a href="sellers_login.php">Login Here!</a>
    <p class="text-right"><a href="/SamBiz/index.php" alt="home">Visit Site</a></p>
</div>

<div class="clearfix"></div>

<?php
include 'includes/prettyfooter.php';?>
