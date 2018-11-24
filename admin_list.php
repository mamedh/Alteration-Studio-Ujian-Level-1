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
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Streaming Video</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="admin_list.php">List Video</a></li>
	      <li><a href="add.html">Tambah Video</a></li>	      
	    </ul>
	  </div>
	</nav>

	<table width='100%' border=0>

		<tr bgcolor='#CCCCCC'>
			<td>Judul</td>
			<td>Deskripsi</td>
			<td>Sampul</td>
			<td>Url</td>
			<td>Update</td>			
		</tr>
		<?php 
		//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
		while($res = mysqli_fetch_array($result)) { 		
			echo "<tr>";
			echo "<td>".$res['judul']."</td>";
			echo "<td>".$res['deskripsi']."</td>";
			echo "<td>".$res['sampul']."</td>";
			echo "<td>".$res['url']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
	</table>


</body>
</html>