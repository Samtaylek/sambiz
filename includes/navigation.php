<?php
$sql = "SELECT * FROM categories WHERE parent = 0";
$pquery = $db->query($sql);
?>
<nav class="navbar navbar-fixed-top" style="background-color:#fbc5e3">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar1" id="bar1"><div style=" width: 35px; height:4px;  background-color: #3871ac; margin: 4px 0;"></div></span>
                <span class="icon-bar2" id="bar2"><div style=" width: 35px; height:4px;  background-color: #3871ac; margin: 4px 0;"></div></span>
                <span class="icon-bar3" id="bar3"><div style=" width: 35px; height:4px;  background-color: #3871ac; margin: 4px 0;"></div></span>
            </button>

            <h1 style=" font-family:'Lucida Fax'; margin-top: 10px; color:darkslateblue">MAJOG<i class="glyphicon glyphicon-shopping-cart"></i></h1>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav" id="menu">
            <li class="active" role="presentation"><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>

            <?php while($parent = mysqli_fetch_assoc($pquery)): ?>
                <?php
                $parent_id = $parent['id'];
                $sql2 = "SELECT * FROM categories WHERE parent = '$parent_id'";
                $cquery = $db->query($sql2);
                ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $parent['category']; ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" style="background-color:#fafafa">
                        <?php while($child = mysqli_fetch_assoc($cquery)): ?>
                            <li><a href="category.php?cat=<?= $child['id'] ;?>"><?php echo $child['category']; ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                </li>
                <li class="active" role="presentation"><a href="contact.php">Contact Us</a></li>
                <li class="active" role="presentation"><a href="about.php">About Us</a></li>
            <?php endwhile; ?>
            <li><a href="cart.php"><span class="fa fa-shopping-basket"></span> My Cart</a></li>
            <li class="active" role="presentation"><a href="help.php">Help</a></li>
        </ul>

            <form class="navbar-form navbar-left" style="margin-left:   0px;" action="searchResult.php" id="search" name="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" id="search" name="search">
                </div>
                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </form>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="sellers_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
    </div>
</nav>
<br><br>