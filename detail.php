<?php 
include_once("config_stream.php")	;
$result = mysqli_query($mysqli, "SELECT * FROM streaming ORDER BY id DESC");
 ?>

<!DOCTYPE html>
<html>
<head>
	    <title>DETAIL VIDEO</title>
	    <link href="css/bootstrap.min.css" rel="stylesheet">	
</head>
<body>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
    <script src="js/bootstrap.min.js"></script>

	<nav class="navbar navbar-default">	  		    		
		<h1 align="center"><a href="public_list.php">Streaming Video</a></h1>			
	</nav>



<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result_view = mysqli_query($mysqli, "SELECT * FROM streaming WHERE id=$id");

while($resv = mysqli_fetch_array($result_view))
{
	$judul = $resv['judul'];
	$deskripsi = $resv['deskripsi'];
	$sampul = $resv['sampul'];
	$url = $resv['url'];
}
?>

    <div class="container">
    	<div class="row">
    		<div class="col-md-8">
    			<?php 
    			echo '<iframe src="'.$url.'" width="100%" height="500px"></iframe>'; 
    			echo "<br>".$judul;
    			echo "<br>".$deskripsi;
    			 ?>
    		</div>
    		<div class="col-md-4">
				<?php 
				while($res = mysqli_fetch_array($result)) { 
				echo '
    			<div class="col-md-8">
    				<img src="'.$res["sampul"].'" width="100%" height="100%">
    			</div>
    			<div class="col-md-4">
    				'.$res["judul"].'<br>
    				<a href="detail.php?id='.$res["id"].'">Lihat Video</a>
    			</div>
				';
				}?>

    		</div>
    	</div>    	
    </div>




</body>
</html>