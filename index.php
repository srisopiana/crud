<?php
include_once("config.php");
if (mysqli_connect_errno());
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
exit(); // **this is missing**
}
$result = mysqli_query($mysqli, "SELECT * FROM mhs ORDER BY id DESC");
?>
<html>
<head>	
	<title>Responsi SI</title>
</head>
<body>
	<a href="add.html">Tambah Data</a><br/><br/>
	<table width='50%' border=1>

		<tr>
			<td width='50%'>Nama</td>
			<td width='20%'>Alamat</td>
			<td width='20%'>Jenis Kelamin</td>
			<td width='20%'>Agama</td>
			<td width='10%'></td>
		</tr>
		<?php 
		while($res = mysqli_fetch_array($result)) { 		
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['alamat']."</td>";
			echo "<td>".$res['jenis_kelamin']."</td>";	
			echo "<td>".$res['agama']."</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" 
			onClick=\"return confirm('Hapus data?')\">Delete</a></td>";		
		}
		?>
	</table>
</body>
</html>
