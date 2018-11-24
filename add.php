<!DOCTYPE html>
<html>
<head>
	<title>TAMBAH VIDEO</title>
</head>
<body>
<?php
//including the database connection file
include_once("config_stream.php");

if(isset($_POST['Submit'])) {	
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
			echo "<font color='red'>deskripsi field is empty.</font><br/>";
		}
		
		if(empty($sampul)) {
			echo "<font color='red'>Sampul field is empty.</font><br/>";
		}

		if(empty($url)) {
			echo "<font color='red'>URL field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query(
			$mysqli, "INSERT INTO streaming(judul,deskripsi,sampul,url) VALUES('$judul','$deskripsi','$sampul','$url')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='admin_list.php'>View Result</a>";
	}
}
?>

</body>
</html>