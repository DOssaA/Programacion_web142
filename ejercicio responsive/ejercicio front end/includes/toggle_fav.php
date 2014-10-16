<?php
	session_start();

	include_once("database.php");

	$usuario = $_SESSION["id_iniciado"];
	$id_post = $_GET["id_post"];
	$favs = $_GET["favs"];

	if($favs == 0){
		$queryCambiarFav = "INSERT INTO ejercicio_pag_mensajes.favoritos(`id`, `id_usuario`, `id_post`) VALUES ('','$usuario','$id_post')";
	}else{
		$queryCambiarFav = "DELETE FROM ejercicio_pag_mensajes.favoritos WHERE id_usuario='$usuario' AND id_post = '$id_post'";
	}

	// $queryNumFavs = "SELECT count(*) AS numFavs FROM ejercicio_pag_mensajes.likes WHERE id_post='".$row["id_post"]."'";   //un query siempre devuelve un objeto Object, un registro, en este caso en el campo num
	$rNumLikes = mysqli_query($cxn, $queryCambiarFav);

	header("Location: ../home.php");
?>