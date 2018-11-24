<?php
// including the database connection file
include_once("config_stream.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$judul = mysqli_real_escape_string($mysqli, $_POST['judul']);
	$deskripsi = mysqli_real_escape_string($mysqli, $_POST['deskripsi']);
	$sampul = mysqli_real_escape_string($mysqli, $_POST['sampul']);	
	$url = mysqli_real_escape_string($mysqli, $_POST['url']);	
	
	// checking empty fields
	if(empty($judul) || empty($deskripsi) || empty($sampul) || empty($url)) {	
			
		if(empty($judul)) {
			echo "<font color='red'>Judul field is empty.</font><br/>";
		}
		
		if(empty($deskripsi)) {
			echo "<font color='red'>Deskripsi field is empty.</font><br/>";
		}
		
		if(empty($sampul)) {
			echo "<font color='red'>Sampul field is empty.</font><br/>";
		}		

		if(empty($url)) {
			echo "<font color='red'>URL field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE streaming SET judul='$judul',deskripsi='$deskripsi',sampul='$sampul',url='$url' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: admin_list.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM streaming WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$judul = $res['judul'];
	$deskripsi = $res['deskripsi'];
	$sampul = $res['sampul'];
	$url = $res['url'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>EDIT VIDEO</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="admin_list.php">Streaming Video</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="add.html">List Video</a></li>
	      <li><a href="#">Tambah Video</a></li>	      
	    </ul>
	  </div>
	</nav>


	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Judul</td>
				<td><input type="text" name="judul" value="<?php echo $judul;?>"></td>
			</tr>
			<tr> 
				<td>Deskripsi</td>
				<td><input type="text" name="deskripsi" value="<?php echo $deskripsi;?>"></td>
			</tr>
			<tr> 
				<td>Sampul</td>
				<td><input type="text" name="sampul" value="<?php echo $sampul;?>"></td>
			</tr>
			<tr> 
				<td>URL</td>
				<td><input type="text" name="url" value="<?php echo $url;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>

</body>
</html>