<!DOCTYPE html>
<html lang="en">
<head>
	<title>Wish List</title>
    <link href="css/assign1.css" rel="stylesheet">
	<meta charset="utf-8">
</head>
<body>

<div id="content">
	<?php include 'include/art-header.php';?>

	<div class="main" style="overflow:auto;">
            <h1>Wish-List Items</h1>
            <table id="wishList">
            	<tr>
                	<th>Image</th>
                	<th>Title</th>
                	<th>Action</th>
                </tr>

                <?php 
                $wish = $_SESSION["wish-list"];
                for($i = 0; $i < count($wish); $i++){
			    ?>

                <tr>
                	<td><img src="images/square-medium/<?php echo $wish[$i][1];?>.jpg?>"></td>
                	<td><a href="single-painting.php?id=<?php echo $wish[$i][0];?>"><?php echo $wish[$i][2] ?></a></td>
                	<td><a class="removeLinkStyle" href="remove-wish-list.php?index=<?php echo $i;?>">Remove</a></td>
                </tr>

                <?php
			    } 
			    ?>
			    <tr></tr>
			    <tr>
                	<td><a class="removeLinkStyle" href="remove-wish-list.php?index=-1">Remove All</a></td>
                </tr>
            </table>
    </div>

	<div class="footer"> 
		<p>All images are copyright to their owners. This is just a hypothetical site &#169; 2014 Copyright Art Store</p>
	</div>

</div>
</body>
</html>