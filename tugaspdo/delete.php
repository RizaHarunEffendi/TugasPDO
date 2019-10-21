<?php 
	
	include 'koneksi.php';

	$id = $_GET['id'];
	$query = "SELECT * FROM user WHERE id = :id";
	$statment_select = $koneksi->prepare($query);
	$statment_select->execute(array(':id'=>$id));
	$data = $statment_select->fetch(PDO::FETCH_OBJ);
	unlink("foto_user/".$data->foto);
	$delete = "DELETE FROM user WHERE id = :id";
	$statment_delete = $koneksi->prepare($delete);
	$statment_delete->bindParam(':id',$id);
	if ($statment_delete->execute()) 
	{
		echo "<script>alert('Sukses Delete');
		 	window.location.href='index.php';</script>";
	}

 ?>