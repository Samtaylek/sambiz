<?php
/**
 * Created by PhpStorm.
 * User: AngelofPc
 * Date: 3/6/2018 
 * Time: 7:30 PM
 */
ob_start();
require_once 'core/init.php';
include "includes/head.php";
include "includes/nav.php";

$action = "search.php";
include "newsletter.php";

    if ($_POST) {

        $search = $_POST['search'];
        // gets value sent over search form
        $page_description1 = "You searched for - <b>".strtoupper($search). "</b>";
        $page_description2 = "Search >> ".strtoupper($search);
        include "includes/headerpartial.php";

        $min_length = 1;
        // you can set minimum length of the search if you want

        if (strlen($search) >= $min_length) { // if search length is more or equal minimum length then

            $search = htmlspecialchars($search);
// changes characters used in html to their equivalents, for example: < to &gt;

//$search = mysqli_real_escape_string($search,'0');
            // makes sure nobody uses SQL injection

            $limit = 6;
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            };
            $start_from = ($page - 1) * $limit;


            $sql = "SELECT * FROM products WHERE deleted = 0 AND  (`title` LIKE '%" . $search . "%') OR (`brand` LIKE '%" . $search . "%') 
            OR (`description` LIKE '%" . $search . "%') OR (`price` LIKE '%" . $search . "%')  OR (`categories` LIKE '%" . $search . "%') ORDER BY id ASC LIMIT $start_from, $limit ";

            $raw_results = $db->query($sql);
            // * means that it selects all fields, you can also write: `id`, `title`, `text`
            // articles is the name of our table

            // '%$search%' is what we're looking for, % means anything, for example if $search is Hello
            // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$search'
            // or if you want to match just full word so "gogohello" is out use '% $search %' ...OR ... '$search %' ... OR ... '% $search'
            if (mysqli_num_rows($raw_results) > 0) { // if one or more rows are returned do following

                //while($product = mysqli_fetch_assoc($raw_results)){
// $results = mysqli_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop

                //echo "<p><h3>".$results['title']."</h3>".$results['location']."</p>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])


                include "includes/searchResults.php";

                //  }

            } else { // if there is no matching rows do following
                echo "No results";
            }
        } else { // if search length is less than minimum
			$errors = array();
            $errors[] =  "Please search for a property as the minimum length is " . $min_length;
			echo "<div class='col-md-5'>";
			echo display_errors($errors);
			echo "</div><div class='clearfix'></div>";
			include "includes/footer.php";
			die();
        }
    }

$product = mysqli_num_rows($raw_results);
if ($product < 1) {

    echo '<h2 class="feat text-center">Empty</h2>';
}

    $sql = "SELECT COUNT(id) FROM products WHERE deleted = 0 AND  (`title` LIKE '%" . $search . "%') OR (`brand` LIKE '%" . $search . "%') 
            OR (`description` LIKE '%" . $search . "%') OR (`price` LIKE '%" . $search . "%')  OR (`categories` LIKE '%" . $search . "%') ORDER BY id ASC LIMIT $start_from, $limit ";
$rs_result = $db->query($sql);
$row = mysqli_fetch_row($rs_result);
$total_records = $row[0];
$total_pages = ceil($total_records / $limit);
$pagLink = '<nav aria-label="Pagination" class="text-center" ><ul class="pagination">';


for ($i=1; $i<=$total_pages; $i++) {

    $pagLink .= '<li class="page-item '.(($page > $total_pages)?'active':'').'"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
    //$pagLink .= "<a href='archive.php?page=".$i."'>".$i."</a>";

};
//$pagLink .=  '<li class="page-itm"><a class="page-link" href="archive.php?page='.$n.'">Next</a></li>';
echo $pagLink . "</ul></nav><br>";


include "includes/footer.php";
include "includes/footerScripts.php";
ob_end_flush();    ?>
