<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

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
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE mhs SET name='$name',alamat='$alamat',jenis_kelamin='$jenis_kelamin', agama='@agama' WHERE id=$id");
		
		//redirectig to the display pnim. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM mhs WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$alamat = $res['alamat'];
	$jenis_kelamin = $res['jenis_kelamin'];
	$agama = $res['agama'];

}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat;?>"></td>
			</tr>
			<tr> 
				<td>Jenis Kelamin</td>
				<td><input type="text" name="jenis_kelamin" value="<?php echo $jenis_kelamin;?>"></td>
			</tr>
			<tr> 
				<td>Agama</td>
				<td><input type="text" name="agama" value="<?php echo $agama;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
