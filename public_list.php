<?php 
include_once("config_stream.php")	;
$result = mysqli_query($mysqli, "SELECT * FROM streaming ORDER BY id DESC");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>LIST VIDEO</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<nav class="navbar navbar-default">	  		    		
		<h1 align="center"><a href="public_list.php">Streaming Video</a></h1>			
	</nav>

	
	<?php 
	while($res = mysqli_fetch_array($result)) { 
	echo '
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img src="'.$res["sampul"].'" width="100%" height="100%">
			</div>
			<div class="col-md-8">
				<table>
					<tr>
						<td>'.$res["judul"].'</td>
					</tr>
					<tr>
						<td>'.$res["deskripsi"].'</td>
					</tr>
					<tr>
						<td><a href="detail.php?id='.$res["id"].'">Lihat Video</a></td>
					</tr>
				</table>
			</div>			
		</div>		
	</div>
	';	

	} ?>
	




</body>
</html>