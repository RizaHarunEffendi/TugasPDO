<?php 
	
	include 'koneksi.php';
	if (isset($_POST['submit'])) {
		
		 $username = $_POST['username'];
		 $password = $_POST['password'];
		 $email = $_POST['email'];
		 $ttl = $_POST['ttl'];
		 $alamat = $_POST['alamat'];

		 $imgFile = $_FILES['foto']['name'];
		 $tmp_dir = $_FILES['foto']['tmp_name'];
		 $imgSize = $_FILES['foto']['size'];

		 $upload_dir = 'foto_user/';
		 $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
		 $valid_ext = array('jpg','jpeg','png','PNG');
		 $userpic  = rand(1000,1000000).".".$imgExt;

		 move_uploaded_file($tmp_dir, $upload_dir.$userpic);

		 $query = 'INSERT INTO user (username,password,email,ttl,alamat,foto) VALUES (:username,:password,:email,:ttl,:alamat,:foto)';
		 $statment = $koneksi->prepare($query);
		 $statment->bindParam(':username',$username);
		 $statment->bindParam(':password',$password);
		 $statment->bindParam(':email',$email);
		 $statment->bindParam(':ttl',$ttl);
		 $statment->bindParam(':alamat',$alamat);
		 $statment->bindParam(':foto',$userpic);

		 if ($statment->execute()) {
		 	
		 	echo "<script>alert('Sukses Insert');
		 	window.location.href='index.php';</script>";
		 }
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data User</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-5">
	<div class="card">
		<div class="card-body">
		<h2>Tambah Data User</h2>
		<form method="post" action="" enctype="multipart/form-data">
			<div class="form-row" >
				<div class="col-md-12"> 
					<label>Username</label>
					<input type="text" name="username" class="form-control" placeholder="Masukan Username" autocomplete="off">
				</div>
				<div class="col-md-12"> 
					<label>Password</label>
					<input type="password" name="password" class="form-control" placeholder="Masukan Password" autocomplete="off">
				</div>
				<div class="col-md-12"> 
					<label>Email</label>
					<input type="text" name="email" class="form-control" placeholder="Masukan Email" autocomplete="off">
				</div>
				<div class="col-md-12"> 
					<label>TTL</label>
					<input type="date" name="ttl" class="form-control" autocomplete="off">
				</div>
				<div class="col-md-12"> 
					<label>Alamat</label>
					<input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" autocomplete="off">
				</div>
				<div class="col-md-12"> 
					<label>Foto</label>
					<input type="file" name="foto" class="form-control-file" autocomplete="off">
				</div>
			</div>
			<button class="btn btn-success mt-3" name="submit">Simpan</button>
		</form>
	</div>
	</div>
	</div>
</body>
</html>