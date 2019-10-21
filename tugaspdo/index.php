<?php 
	include 'koneksi.php';
	$query = "SELECT * FROM user";
	$statment = $koneksi->prepare($query);
	$statment->execute();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Data User</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-3">
	<a href="tambah.php"><button class="btn btn-primary">Tambah Data</button></a>
	<br>
	<br>
	<h3>Data User</h3>
	<table class="table table-bordered table-striped">
		<thead>
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Password</th>
			<th>Email</th>
			<th>TTL</th>
			<th>Alamat</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
		</thead>
		<tbody>
			<?php 
				$no = 1;
				while ($data = $statment->fetch(PDO::FETCH_OBJ)) { 
			?>
			<tr>
				<td><?php echo $no++?></td>
				<td><?php echo $data->username ?></td>
				<td><?php echo $data->password ?></td>
				<td><?php echo $data->email ?></td>
				<td><?php echo $data->ttl ?></td>
				<td><?php echo $data->alamat ?></td>
				<td>
					<img src="foto_user/<?php echo $data->foto ?>" width=100>
				</td>
				<td>
					<a href="edit.php?id=<?php echo$data->id ?>" class="btn btn-xs btn-info">Edit</a>
            		<a onclick="return confirm('Kamu yakin ingin di delete?')" href="delete.php?id=<?php echo$data->id ?>" class='btn btn-danger'>Delete</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	</div>
</body>
</html>