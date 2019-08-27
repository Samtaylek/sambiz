<nav class="navbar navbar-fixed-top" style="background-color:#fbc5e3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/SamBiz/admin/index.php" class="navbar-brand" id="name"><img src="../assets/img/majog5.jpg" style="margin-top: -40px; height:90px; width:70px;"></a>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
<!--        <div class="navbar-brand">-->
<!--        </div>-->
        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav" id="menu" style="width:900px;">
                <li class="active" role="presentation"><a href="index.php">My Dashboard</a></li>
                <li class="active" role="presentation"><a href="brands.php">Brands</a></li>
                <li class="active" role="presentation"><a href="categories.php">Categories</a></li>
                <li class="active" role="presentation"><a href="products.php">Products</a></li>
                <li class="active" role="presentation"><a href="archived.php">Archived</a></li>
                <?php if(has_permission('admin')): ?>
                <li class="active" role="presentation"><a href="users.php">Users</a></li>
                <?php endif; ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello <?=$user_data['first'];?>!
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="change_password.php">Change Password</a></li>
                        <li><a href="logout.php">Log Out </a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="users.php?add=1"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<br><br>