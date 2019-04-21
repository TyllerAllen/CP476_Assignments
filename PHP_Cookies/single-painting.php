<?php
include 'functions.php';

//your code for connecting to database, etc. goese here
$con = getDB();
$id = $_GET['id'];

$str = "SELECT Paintings.PaintingID, Paintings.Title, Artists.FirstName, Artists.LastName, Paintings.ImageFileName, Paintings.Excerpt, Paintings.MSRP, Paintings.YearOfWork, Paintings.Medium, Paintings.Width, Paintings.Height, Galleries.GalleryName, Galleries.GalleryCity, Galleries.GalleryCountry, Genres.GenreName, Subjects.SubjectName FROM Paintings INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID INNER JOIN Galleries ON Galleries.GalleryID = Paintings.GalleryID INNER JOIN PaintingSubjects ON PaintingSubjects.PaintingID = Paintings.PaintingID INNER JOIN Subjects ON Subjects.SubjectID = PaintingSubjects.SubjectID INNER JOIN PaintingGenres ON PaintingGenres.PaintingID = Paintings.PaintingID INNER JOIN Genres ON Genres.GenreID = PaintingGenres.GenreID WHERE Paintings.PaintingID = $id";
	$result = runQuery($con, $str);
	$row = mysqli_fetch_assoc($result);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/assign1.css">
</head>

<body>
<div id="content">
	<?php include 'include/art-header.php';?>

	<div class="main">
		<!-- <script>
			document.querySelector(".main").style.height = ;
		</script> -->
		<div class="pageName">
			<h2><?php echo utf8_encode($row["Title"]);?></h2>
			<p>By <a href="pageOne.html"><?php echo utf8_encode($row['FirstName']) . " " . utf8_encode($row['LastName']);?></a></p>
		</div>

		<div class="pageBody">
			<div class="column left">
				<img src="images/medium/<?php echo utf8_encode($row['ImageFileName']);?>.jpg" alt=<?php echo utf8_encode($row["Title"]);?>>
			</div>

			<div class="column right">

				<p id="desc"><?php echo utf8_encode($row["Excerpt"]);?></p>
				<h4><?php echo "$" . number_format(utf8_encode($row["MSRP"]));?></h4>

				<div id="addBtnGroup">
					<a class="addBtn" href="addToWishList.php?PaintingID=<?php echo utf8_encode($row['PaintingID']) . '&ImageFileName=' . utf8_encode($row['ImageFileName']) . '&Title=' . urldecode($row['Title']); ?>">Add to Wish List</a>
					<button class="addBtn">Add to Shopping Cart</button>
				</div>

				<div id="details">
					<p>Product Details</p>
					<div class="line"></div>

					<table id="prodDetails">
					<tr>
						<th>Date:</th>
						<td><?php echo utf8_encode($row["YearOfWork"]);?></td>
					</tr>
					<tr>
						<th>Medium:</th>
						<td><?php echo utf8_encode($row["Medium"]);?></td>
					</tr>
					<tr>
						<th>Dimensions:</th>
						<td><?php echo utf8_encode($row['Width']) . "cm x " . utf8_encode($row['Height']) . "cm";?></td>
					</tr>
					<tr>
						<th>Home:</th>
						<td><a href="#"><?php echo utf8_encode($row["GalleryName"]) . ", " . utf8_encode($row['GalleryCity']) . ", " . utf8_encode($row['GalleryCountry']);?></a></td>
					</tr>
					<tr>
						<th>Genres:</th>
						<td><a href="#"><?php
							$str = "SELECT Paintings.Title, Artists.FirstName, Artists.LastName, Paintings.ImageFileName, Paintings.Excerpt, Paintings.MSRP, Paintings.YearOfWork, Paintings.Medium, Paintings.Width, Paintings.Height, Galleries.GalleryName, Galleries.GalleryCity, Galleries.GalleryCountry, Genres.GenreName, Subjects.SubjectName FROM Paintings INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID INNER JOIN Galleries ON Galleries.GalleryID = Paintings.GalleryID INNER JOIN PaintingSubjects ON PaintingSubjects.PaintingID = Paintings.PaintingID INNER JOIN Subjects ON Subjects.SubjectID = PaintingSubjects.SubjectID INNER JOIN PaintingGenres ON PaintingGenres.PaintingID = Paintings.PaintingID INNER JOIN Genres ON Genres.GenreID = PaintingGenres.GenreID WHERE Paintings.PaintingID = $id GROUP BY GenreName";
                            $result = runQuery($con, $str);
                            $row = mysqli_fetch_assoc($result);
                            echo utf8_encode($row["GenreName"]) . "</a>";
							while($row = mysqli_fetch_assoc($result)) {
								echo "<span>, </span><a href=\"#\">" . utf8_encode($row["GenreName"]) . "</a>";
							}
                            ?></td>
					</tr>
					<tr>
						<th>Subjects:</th>
						<td><a href="#"><?php 
							$str = "SELECT Paintings.Title, Artists.FirstName, Artists.LastName, Paintings.ImageFileName, Paintings.Excerpt, Paintings.MSRP, Paintings.YearOfWork, Paintings.Medium, Paintings.Width, Paintings.Height, Galleries.GalleryName, Galleries.GalleryCity, Galleries.GalleryCountry, Genres.GenreName, Subjects.SubjectName FROM Paintings INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID INNER JOIN Galleries ON Galleries.GalleryID = Paintings.GalleryID INNER JOIN PaintingSubjects ON PaintingSubjects.PaintingID = Paintings.PaintingID INNER JOIN Subjects ON Subjects.SubjectID = PaintingSubjects.SubjectID INNER JOIN PaintingGenres ON PaintingGenres.PaintingID = Paintings.PaintingID INNER JOIN Genres ON Genres.GenreID = PaintingGenres.GenreID WHERE Paintings.PaintingID = $id GROUP BY SubjectName";
							$result = runQuery($con, $str);
							$row = mysqli_fetch_assoc($result);
							echo utf8_encode($row["SubjectName"]) . "</a>";
							while($row = mysqli_fetch_assoc($result)) {
								echo "<span>, </span><a href=\"#\">" . utf8_encode($row["SubjectName"]) . "</a>";
							}
                            ?></td>
					</tr>
					</table>

				</div>
			</div>

		</div>
		<div id="similarProducts">
			<div id="similarTitle">
				<h3>Similar Products</h3>
				<div class="line"></div>
			</div>

			<div class="thumbs">
				<img class="thumbnail" src="images/medium/113010.jpg" alt="Self-portrait in a Straw Hat">
				<a href="#">Artist Holding a Thistle</a>
				<button class="similarBtn first">View</button>
				<button class="similarBtn next">Wish</button>
				<button class="similarBtn next">Cart</button>
			</div>
			<div class="thumbs">
				<img class="thumbnail" src="images/medium/120010.jpg" alt="Portrait of Eleanor of Toledo">
				<a href="#">Portrait of Eleanor of Toledo</a>
				<button class="similarBtn first">View</button>
				<button class="similarBtn next">Wish</button>
				<button class="similarBtn next">Cart</button>
			</div>
			<div class="thumbs">
				<img class="thumbnail" src="images/medium/116010.jpg" alt="Artist Holding a Thistle">
				<a href="#">Madame de Pompadour</a>
				<button class="similarBtn first">View</button>
				<button class="similarBtn next">Wish</button>
				<button class="similarBtn next">Cart</button>
			</div>
			<div class="thumbs">
				<img class="thumbnail" src="images/medium/106020.jpg" alt="Girl With a Pearl Earring">
				<a href="#">Girl With a Pearl Earring</a>
				<button class="similarBtn first">View</button>
				<button class="similarBtn next">Wish</button>
				<button class="similarBtn next">Cart</button>
			</div>
		</div>
	</div>

	<div class="footer"> 
		<p>All images are copyright to their owners. This is just a hypothetical site &#169; 2014 Copyright Art Store</p>
	</div>

</div>
</body>
</html>
