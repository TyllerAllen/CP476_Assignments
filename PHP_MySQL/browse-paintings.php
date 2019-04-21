<?php
include 'functions.php';

//your code for connecting to database, etc. goese here
$con = getDB();

$find = "";
if(!empty($_GET)){
    $artist = $_GET['artist'];
    $museum = $_GET['museum'];
    $shape = $_GET['shape'];

    if($artist == 0){
        if($museum == 0){
            if($shape == 0){
                $find = "";
            }
            else{
                $find = " WHERE Shapes.ShapeID = '" . $shape . "'";
            }
        }
        else{
            $find = " WHERE Galleries.GalleryID = '" . $museum . "'";
            if($shape != 0){
                $find = $find . " AND Shapes.ShapeID = '" . $shape . "'";
            }
        }
    }
    else{
        $find = " WHERE Artists.ArtistID = '" . $artist . "'";
        if($museum != 0){
            $find = $find . " AND Galleries.GalleryID = '" . $museum . "'";
        }
        if($shape != 0){
            $find = $find . " AND Shapes.ShapeID = '" . $shape . "'";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assignment 1 - Page 1</title>

        <link href="css/reset.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">



    </head>
    <body>
        <a href="https://hopper.wlu.ca/~alle5940/CP476A4/browse-paintings.php"></a>
        <main style="overflow:auto;">

            <section class="leftsection" style="width=600px;  margin-right:100px;">
                <form class="ui form" method="get" action="browse-paintings.php">
                    <h3>Filters</h3>

                    <div >
                        <label style=" padding-right:22px;">Artist</label>
                        <select name="artist">
                            <option value='0'>Select Artist</option>  
                            <?php  
                            // retrieve the names of the artist from database and use
			    			// them as the values for <option> elements
			    			$str = "SELECT ArtistID, FirstName, LastName FROM Artists";
			    			$result = runQuery($con, $str);
							while($row = mysqli_fetch_assoc($result)) {
								echo "<option value=" . utf8_encode($row["ArtistID"]) . ">" . utf8_encode($row["FirstName"]) . " " . utf8_encode($row["LastName"]) . "</option>";
							}
                            ?>
                        </select>
                    </div>  
                    <div >
                        <label>Museum</label>
                        <select  name="museum">
                            <option value='0'>Select Museum</option>  
                            <?php  
                            // retrieve the list of galleries name  from database and use
			    			// them as the values for <option> elements
			    			$str = "SELECT GalleryID, GalleryName FROM Galleries";
			    			$result = runQuery($con, $str);
							while($row = mysqli_fetch_assoc($result)) {
								echo "<option value=" . utf8_encode($row["GalleryID"]) . ">" . utf8_encode($row["GalleryName"]) . "</option>";
							}
                            ?>
                        </select>
                    </div>   
                    <div >
                        <label style="padding-right:14px;">Shape</label>
                        <select  name="shape">
                            <option value='0'>Select Shape</option>  

                            <?php
                            // retrieve the different shapes from database and use
			    			// them as the values for <option> elements
			    			$str = "SELECT ShapeID, ShapeName FROM Shapes";
                            $result = runQuery($con, $str);
							while($row = mysqli_fetch_assoc($result)) {
								echo "<option value=" . utf8_encode($row["ShapeID"]) . ">" . utf8_encode($row["ShapeName"]) . "</option>";
							}
                            ?>

                        </select>
                    </div>   
                    <p> &nbsp; &nbsp;  &nbsp;   &nbsp; </p>
                    <button type="submit" id="buttons"> Filter  </button>    

                </form>    </section>


            <section class="rightsection" >
                <h1>Paintings</h1>
                <h3>All Paintings [Top 20]</h3>
                <ul id="paintingsList">

                    <?php  

			    	// you need to have a while loop here that goes over the result of a query
					//depending on the question you are working on
                    $str = "SELECT Paintings.PaintingID, Paintings.Title, Paintings.ImageFileName, Artists.FirstName, Artists.LastName, Paintings.Excerpt, Paintings.MSRP FROM Artists INNER JOIN Paintings ON Artists.ArtistID = Paintings.ArtistID INNER JOIN Galleries ON Galleries.GalleryID = Paintings.GalleryID INNER JOIN Shapes ON Shapes.ShapeID = Paintings.ShapeID" . $find . " LIMIT 20";
                    $result = runQuery($con, $str);
                    while($row = mysqli_fetch_assoc($result)) {
				    ?>

                    <li class="item">

                        <div class="figure">

                            <a href="single-painting.php?id=<?php echo utf8_encode($row['PaintingID']);/* you need the 'PaintingID' here */ ?>">
                                <img src="images/square-medium/<?php echo utf8_encode($row['ImageFileName']);/* you need the 'ImageFileName' here */ ?>.jpg">
                            </a>
                        </div>
                        <div class="itemright">
                            <a href="single-painting.php?id=<?php echo utf8_encode($row['PaintingID']);/* you need the 'PaintingID' here */ ?>">
                                <?php echo utf8_encode($row['Title']);/* Title  */ ?></a>

                            <div><span><?php echo utf8_encode($row["FirstName"]) . " " . utf8_encode($row["LastName"]);/* FirstName and LastName */ ?></span></div>        


                            <div class="description">
                                <p><?php echo utf8_encode($row["Excerpt"]);/* Excerpt */ ?></p>
                            </div>

                            <div class="meta">     
                                <strong><?php echo "$" . number_format(utf8_encode($row["MSRP"]));/*  MSRP */ ?></strong>        
                            </div>        

                            <div class="extra" >
                                <a class="favorites" href="cart.php?id=<?php echo utf8_encode($row['PaintingID']);/* PaintingID */ ?>">Add to Shopping Cart</a>
                                <span> &nbsp; &nbsp; &nbsp;    </span>
                                <a  class="favorites"   href="favorites.php?id=<?php echo utf8_encode($row['PaintingID']);/* PaintingID  */ ?>">	Add to Wish List</i>
                                </a>         
                                <p>&nbsp;</p>
                            </div>       

                        </div>      
                    </li>

                    <?php
				    } 
				    ?>

                </ul>
            </section>

        </main>
    </body>
</html>
