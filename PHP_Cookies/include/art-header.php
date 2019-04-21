<?php
session_start();

echo '<div class="header">
	<ul>
		<li><a href="#">Checkout</a></li>
		<li><a href="#">Shopping Cart</a></li>
		<li><a href="view-wish-list.php">Wish List <span style="color: red; font-weight: bold;"> '.count($_SESSION["wish-list"]) . '</span></a></li>
		<li><a href="#">My Account</a></li>
	</ul>
</div>

<div class="title"> 
	<p>Art Store</p>
</div>

<div class="nav">
	<ul>
		<li><a href="browse-paintings.php">Home</a></li>
		<li><a href="#">About Us</a></li>
		<li><a href="browse-paintings.php">Art Works</a></li>
		<li><a href="#">Artists</a></li>
	</ul>
</div>';
?>