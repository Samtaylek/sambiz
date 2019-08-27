<?php
///**
// * Created by PhpStorm.
// * User: O-Temitayo
// * Date: 27/04/2018
// * Time: 20:16
// */
//require_once $_SERVER['DOCUMENT_ROOT'].'/SamBiz/core/init.php';
//include 'includes/head.php';
//echo "<br><br>";
////session_start();
//$full_name = "";
//$email = "";
//$password = "";
//$confirm = "";
//$errors = array();
//
////Register User
//if(isset($_POST['signup'])) {
//    $full_name = ((isset($_POST['full_name'])) ? sanitize($_POST['full_name']) : '');
//    if (!preg_match("/^[a-zA-Z ]*$/", $full_name)) {
//        $errors[] = 'Only Letters and whitespaces are allowed';
//    }
//    $email = ((isset($_POST['email'])) ? sanitize($_POST['email']) : '');
//    $password = ((isset($_POST['password'])) ? sanitize($_POST['password']) : '');
//    $confirm = ((isset($_POST['confirm'])) ? sanitize($_POST['confirm']) : '');
//
//    if ($_POST) {
//        $emailQuery = $db->query("SELECT * FROM signup WHERE email = '$email'");
//        $emailCount = mysqli_num_rows($emailQuery);
//
//
//        if (($emailCount != 0) && isset($_POST['signup'])) {
//            $errors[] = 'That email already exist in our database.';
//        }
//
//
//        $required = array('full_name', 'email', 'password', 'confirm');
//        foreach ($required as $f) {
//            if (empty($_POST[$f])) {
//                $errors[] = 'You must fill out all fields.';
//                break;
//            }
//        }
//        if (strlen($password) < 6) {
//            $errors[] = 'Your password must be at least 6 characters.';
//        }
//
//        if ($password != $confirm) {
//            $errors[] = 'Your password do not match';
//        }
//        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//            $errors[] = 'You must enter a valid email';
//        }
//        if (!empty($errors)) {
//            echo display_errors($errors);
//        } else {
//            if (isset($_POST['signup'])) {
//                $hashed = password_hash($password, PASSWORD_DEFAULT);
//                $query = "INSERT INTO signup (full_name,email,passsword) VALUES('$full_name','$email','$hashed')";
//                mysqli_query($db, $query);
//                $_SESSION['success_flash'] = "You have successfully signed up";
//                header('Location: ../admin/index.php');
//            }
//        }
//    }
//}
//
////    $user_check_query = "SELECT * FROM signup WHERE email = '$email' LIMIT 1";
////    $result = mysqli_query($db, $user_check_query);
////    $user = mysqli_fetch_assoc($result);
////    if ($user) {
////        if ($user['email'] === $email) {
////            array_push($errors, "Email Already Exist");
////        }
////    }
////    if (count($errors) == 0) {
////        $hashed = password_hash($password, PASSWORD_DEFAULT);
////        $query = "INSERT INTO signup (full_name,email,passsword) VALUES('$full_name','$email','$hashed')";
////        mysqli_query($db, $query);
////        $_SESSION['success_flash'] = $full_name;
////        $_SESSION['success_flash'] = "You have successfully signed up";
////        header('Location: signup.php');
////    }
////}
//?>
<!--    <style>-->
<!--        body{-->
<!--            background-image:url("/SamBiz/assets/img/ocean.jpg");-->
<!--            background-size: 100vw 100vh;-->
<!--            background-attachment: fixed;-->
<!--        }-->
<!--    </style>-->
<!--    <div id="login-form">-->
<!--<h2 class="text-center">Sign Up</h2><hr>-->
<!--    <form action="signup.php" method="post">-->
<!--        <div class="form-group">-->
<!--            <label for="full-name">Full Name:</label>-->
<!--            <input type="text" name="full_name" id="full_name" class="form-control" value="--><?//= $full_name; ?><!--">-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <label for="email">Email:</label>-->
<!--            <input type="text" name="email" id="email" class="form-control" value="--><?//= $email; ?><!--">-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <label for="password">Password:</label>-->
<!--            <input type="password" name="password" id="password" class="form-control" value="--><?//= $password; ?><!--">-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <label for="password">Confirm Password:</label>-->
<!--            <input type="password" name="confirm" id="confirm" class="form-control" value="--><?//= $confirm; ?><!--">-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <input type="submit" name="signup" value="Sign Up" class="btn btn-success">-->
<!--        </div>-->
<!--    </form>-->
<!--<!--        -->--><?php ////} ?>
<!--    </div>-->
<?php //include 'includes/footer.php'; ?>
<?php
/**
 * Created by PhpStorm.
 * User: O-Temitayo
 * Date: 03/04/2018
 * Time: 19:52
 */
require_once '../core/init.php';
//if(!is_logged_in()){
//    login_error_redirect();
//}
if(!has_permission('admin')){
    permission_error_redirect('index.php');
}
include 'includes/head.php';
include 'includes/navigation.php';
echo '<br><br>';

    $permitQuery = ("SELECT * FROM signup ORDER BY permissions");
    $name = ((isset($_POST['full_name'])) ? sanitize($_POST['full_name']) : '');
    if(!preg_match("/^[a-zA-Z ]*$/",$name)){
        $errors[] = 'Only Letters and whitespaces are allowed';
    }
    $email = ((isset($_POST['email'])) ? sanitize($_POST['email']) : '');
    $password = ((isset($_POST['password'])) ? sanitize($_POST['password']) : '');
    $confirm = ((isset($_POST['confirm'])) ? sanitize($_POST['confirm']) : '');
    $permissions = ((isset($_POST['permissions'])) ? sanitize($_POST['permissions']) : '');
    $errors = array();


    if($_POST) {
        $emailQuery = $db->query("SELECT * FROM signup WHERE email = '$email'");
        $emailCount = mysqli_num_rows($emailQuery);


        if (($emailCount != 0)) {
            $errors[] = 'That email already exist in our database.';
        }


        $required = array('full_name', 'email', 'password', 'confirm', 'permissions');
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

                $hashed = password_hash($password, PASSWORD_DEFAULT);
                $db->query("INSERT INTO signup (full_name,email,password,permissions) VALUES ('$name','$email','$hashed','$permissions')");
                $_SESSION['success_flash'] = 'Welcome';
//                header('Location: products.php');

        }
    }
    ?>
    <h2 class="text-center">Sign Up</h2><hr>
    <form action="products.php" method="post">
        <div class="form-group col-md-6">
            <label for="name">Full Name:</label>
            <input type="text" name="full_name" id="full_name" class="form-control" value="<?= $name; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" value="<?= $email; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" value="<?= $password; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="confirm">Confirm Password:</label>
            <input type="password" name="confirm" id="confirm" class="form-control" value="<?= $confirm; ?>">
        </div>
<!--        <div class="form-group col-md-6">-->
<!--            <label for="permissions">Permissions:</label>-->
<!--            <select class="form-control" name="permissions">-->
<!--                <option value=""--><?//=(($permissions == '')?'selected':'');?><!--></option>
<!--                <option value="editor"--><?//=(($permissions == 'editor')?'selected':'');?><!--></option>
<!--                <option value="admin,editor"--><?//=(($permissions == 'admin,editor')?'selected':'');?><!--></option>
<!--            </select>-->
<!--        </div>-->
        <div class="form-group col-md-6 text-right" style="margin-top:30px;">
            <a href="index.php" class="btn btn-default">Cancel</a>
            <input type="submit" name="signup" value="Sign Up" class="btn btn-primary">
        </div>
    </form>



    </div>
    </div>
<?php
include 'includes/footer.php';?>
