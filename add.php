<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
	$jenis_kelamin = mysqli_real_escape_string($mysqli, $_POST['jenis_kelamin']);
	$agama = mysqli_real_escape_string($mysqli, $_POST['agama']);
		
	// checking empty fields
	if(empty($id) || empty($nama) || empty($alamat) || empty($jenis_kelamin)|| empty($agama)) {
				
		if(empty($id)) {
			echo "<font color='red'>id field is empty.</font><br/>";
		}
		
		if(empty($nama)) {
			echo "<font color='red'>nama field is empty.</font><br/>";
		}
		
		if(empty($alamat)) {
			echo "<font color='red'>alamat field is empty.</font><br/>";
		}
		if(empty($jenis_kelamin)) {
			echo "<font color='red'>jenis_kelamin field is empty.</font><br/>";
		}
		if(empty($agama)) {
			echo "<font color='red'>agama field is empty.</font><br/>";
		}
		//link to the previous pnim
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO `mhs` (`id`, `nama`, `alamat`, `jenis_kelamin`, `agama`) VALUES (NULL, '@nama', '@alamat', '@jenis_kelamin', '@agama');");
		
		//display success messnim
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
