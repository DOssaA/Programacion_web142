<?php
	session_start();

	include_once("database.php");

	$usuario = $_SESSION["id_iniciado"];
	$id_post = $_GET["id_post"];
	$likes = 0;


	$queryA = "SELECT count(*) AS numLikes FROM ejercicio_pag_mensajes.likes WHERE id_post='$id_post' AND id_usuario='$usuario'"; 
	$rNumLikesUser = mysqli_query($cxn, $queryA);

	echo $likes;

	while($rowD = mysqli_fetch_array($rNumLikesUser)){
		$likes = $rowD["numLikes"];
	}

	echo $likes;

	if($likes == 0){
		$queryCambiarLike = "INSERT INTO ejercicio_pag_mensajes.likes(`id`, `id_post`, `id_usuario`) VALUES ('','$id_post','$usuario')";
	}else{
		$queryCambiarLike = "DELETE FROM ejercicio_pag_mensajes.likes WHERE id_usuario='$usuario' AND id_post = '$id_post'";
	}

	// $queryNumFavs = "SELECT count(*) AS numFavs FROM ejercicio_pag_mensajes.likes WHERE id_post='".$row["id_post"]."'";   //un query siempre devuelve un objeto Object, un registro, en este caso en el campo num
	$rNumLikes = mysqli_query($cxn, $queryCambiarLike);

	header("Location: ../home.php");
?>