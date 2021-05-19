<?php
	$mysqli = new mysqli('localhost','root','root','show')or die($mysqli_error($mysqli));

	$update = false;
	$id = 0;
	$title = '';
	$about = '';

	if(isset($_POST['add'])){
		$title = $_POST['title'];
		$about = $_POST['about'];
		$mysqli->query(" INSERT INTO podcasts (title,about) VALUES('$title','$about') ")or die($mysqli->error);

		header('location: ../index.php');
	}

	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$title=$_POST['title'];
		$about=$_POST['about'];
		$mysqli->query(" UPDATE podcasts SET title='$title',about='$about' WHERE id=$id ")or die($mysqli->error);

		header('location: ../index.php');
	}

	if(isset($_GET['edit'])){
		$update = true;
		$id = $_GET['edit'];
		$result = $mysqli->query(" SELECT * FROM podcasts WHERE id=$id ")or die($mysqli->error);
		if(count($result)==1){
			$row = $result->fetch_assoc();
			$title = $row['title'];
			$about = $row['about'];
		}
	}

	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$mysqli->query(" DELETE FROM podcasts WHERE id=$id ")or diew($msyqli->error);

		header('location: ../index.php');
	}


?>