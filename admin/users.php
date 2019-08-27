<?php
/**
 * Created by PhpStorm.
 * User: O-Temitayo
 * Date: 03/04/2018
 * Time: 19:52
 */
    require_once '../core/init.php';
    if(!is_logged_in()){
        login_error_redirect();
    }
    if(!has_permission('admin')){
        permission_error_redirect('index.php');
    }
    include 'includes/head.php';
    include 'includes/navigation.php';
    echo '<br><br>';
    if(isset($_GET['delete'])){
        $delete_id = sanitize($_GET['delete']);
        $db->query("DELETE FROM users WHERE id = '$delete_id'");
        $_SESSION['success_flash'] = 'User has been deleted';
        header('Location: users.php');
    }
    // Edit User
if(isset($_GET['add']) || isset($_GET['edit'])) {
    $permitQuery = ("SELECT * FROM users ORDER BY permissions");
    $name = ((isset($_POST['full_name'])) ? sanitize($_POST['full_name']) : '');
    if(!preg_match("/^[a-zA-Z ]*$/",$name)){
        $errors[] = 'Only Letters and whitespaces are allowed';
    }
    $email = ((isset($_POST['email'])) ? sanitize($_POST['email']) : '');
    $password = ((isset($_POST['password'])) ? sanitize($_POST['password']) : '');
    $confirm = ((isset($_POST['confirm'])) ? sanitize($_POST['confirm']) : '');
    $permissions = ((isset($_POST['permissions'])) ? sanitize($_POST['permissions']) : '');
    $errors = array();


    if(isset($_GET['edit'])){
        $edit_id = (int)$_GET['edit'];
        $userResult = $db->query("SELECT * FROM users WHERE id = '$edit_id'");
        $users = mysqli_fetch_assoc($userResult);
        $name = (isset($_POST['full_name']) && $_POST['full_name'] != '')?sanitize($_POST['full_name']):$users['full_name'];
        if(!preg_match("/^[a-zA-Z ]*$/",$name)){
            $errors[] = 'Only Letters and whitespaces are allowed';
        }
        $email = (isset($_POST['email']) && $_POST['email'] != '')?sanitize($_POST['email']):$users['email'];
        $permitQ = $db->query("SELECT * FROM users WHERE id = '$permissions'");
        $userResults = mysqli_fetch_assoc($permitQ);
        $permissions =(isset($_POST['permissions']) && $_POST['permissions'] != '')?sanitize($_POST['permissions']):$users['permissions'];
    }
    if($_POST) {
        $emailQuery = $db->query("SELECT * FROM users WHERE email = '$email'");
        $emailCount = mysqli_num_rows($emailQuery);


        if (($emailCount != 0) && isset($_GET['add'])) {
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
            if (isset($_GET['add'])) {
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                $db->query("INSERT INTO users (full_name,email,password,permissions) VALUES ('$name','$email','$hashed','$permissions')");
                $_SESSION['success_flash'] = 'User has been added';
                header('Location: users.php');
            }
            if (isset($_GET['edit'])) {
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                $edit_id = (int)$_GET['edit'];
                $insertSql = "UPDATE users SET full_name = '$name', email = '$email', password = '$hashed', permissions = '$permissions' WHERE id = '$edit_id'";
                $_SESSION['success_flash'] = 'User has been edited';
                header('Location: users.php');
            }
            $db->query($insertSql);
        }
    }
        ?>
        <h2 class="text-center"><?= ((isset($_GET['edit']))?'Edit':'Add A New'); ?> User</h2><hr>
        <form action="users.php?<?= ((isset($_GET['edit']))?'edit='.$edit_id:'add=1'); ?>" method="post">
            <div class="form-group col-md-6">
                <label for="full_name">Full Name:</label>
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
            <div class="form-group col-md-6">
                <label for="permissions">Permissions:</label>
                <select class="form-control" name="permissions">
                    <option value=""<?=(($permissions == '')?'selected':'');?>></option>
                    <option value="editor"<?=(($permissions == 'editor')?'selected':'');?>>Editor</option>
                    <option value="admin,editor"<?=(($permissions == 'admin,editor')?'selected':'');?>>Admin</option>
                </select>
            </div>
            <div class="form-group col-md-6 text-right" style="margin-top:30px;">
                <a href="users.php" class="btn btn-default">Cancel</a>
                <input type="submit" value="<?= ((isset($_GET['edit']))?'Edit':'Add'); ?> User" class="btn btn-primary">
            </div>
        </form>
        <?php
    }else{
    $userQuery = $db->query("SELECT * FROM users ORDER BY full_name");

?>
<div class="clearfix"> </div>
<h2>Users</h2>
<a href="users.php?add=1" class="btn btn-success pull-right" id="add-product-btn">Add New User</a>
<hr>
<table class="table table-bordered table-striped table-condensed">
    <thead><th></th><th>Name</th><th>Email</th><th>Join Date</th><th>Last Login</th><th>Permissions</th></thead>
    <tbody>
    <?php while($user = mysqli_fetch_assoc($userQuery)):?>
        <tr>
            <td>
                <?php if($user['id'] != $user_data['id']): ?>
                    <a href="users.php?delete=<?= $user['id']; ?>" class="btn btn-xs btn-default">
                        <span class="glyphicon glyphicon-remove-sign"></span>
                    </a>
                    <a href="users.php?edit=<?= $user['id']; ?>" class="btn btn-xs btn-default">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                <?php endif; ?>
            </td>
            <td><?=$user['full_name']; ?></td>
            <td><?=$user['email']; ?></td>
            <td><?= pretty_date($user['join_date']); ?></td>
            <td><?=(($user['last_login'] == '0000-00-00 00:00:00')?'Never':pretty_date($user['last_login'])); ?></td>
            <td><?=$user['permissions']; ?></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

</div>
</div>
<?php }
include 'includes/footer.php';?>