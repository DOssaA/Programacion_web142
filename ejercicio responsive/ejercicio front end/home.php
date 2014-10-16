<?php
	session_start();
	// $_SESSION['id_iniciado'] = 1;

	// if(isset($_POST["id_iniciado"])){
	// 	$_SESSION['id_iniciado'] = $_POST["id_iniciado"];
	// }
	if(isset($_GET["id_iniciado"])){
		$_SESSION['id_iniciado'] = $_GET["id_iniciado"];
	}
	if(!(isset($_SESSION['id_iniciado']))){   //si no hay usuario iniciado
		header("Location: index.php");
	}
	
?>

<!DOCTYPE html>
<html lang="es">
  <head>
	<meta charset="UTF-8">
	<title>Coment tube</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	
	<link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
	<header id ="ElHeader">
		<figure id="logo">
			<img src="images/logo.png" alt="">
		</figure>
		<div id="headerTitle">
			<h1>Coment tube</h1>
			<h2>un canal para comentar</h2>
		</div>
	</header>
	<!-- div id="contenedor"-->
	<div class="container">
		<nav>
			<ul>
				<li><a class="selected" href="home.php">HOME</a></li>
				<li><a href="home.php?id_user_posts=<?php echo $_SESSION['id_iniciado']; ?>">PROFILE</a></li>
				<li><a href="includes/logout.php">LOGOUT</a></li>
			</ul>
		</nav>
		
		<div id="centrado"></div>
		<section>
			<?php
				include_once("includes/database.php");

				// $id_usuario_iniciado = 1;
				// if(isset($_POST["id"])){
				// 	$id_usuario_iniciado = $_POST["id"];
				// }
				

				$query = "SELECT * FROM ejercicio_pag_mensajes.mensajes AS m
							JOIN ejercicio_pag_mensajes.usuarios AS u ON u.id = m.id_usuario";   //php lee todo el quey antes de ejecutarlo, por lo que entiende las asignaciones que se le dan
																									// asì sea que se use antes o despues de definir a que se refiere (en el AS)
				if(isset($_GET['id_user_posts'])){
					$query .= " WHERE id_usuario='".$_GET['id_user_posts']."'";
				}

				$result = mysqli_query($cxn, $query);

				//print_r($result);

				//revisar los queries como irían******************************!!!!!!!!!!******************
				/*
				$id_mensaje_a_update =0;

				$estrella=0;
				if(row["estrella"]==1){$estrella=1;}else{$estrella=0;}
				$likes=0;
				$dislikes=0;
				$likes = row["likes"]+1;
				$likes = row["dislikes"]+1;

				$queryEstrella = "UPDATE ejercicio_pag_mensajes.mensajes SET estrella='".$estrella."' WHERE '".$id_mensaje_a_update."'";
				$queryLike = "UPDATE ejercicio_pag_mensajes.mensajes SET likes='".$likes."' WHERE '".$id_mensaje_a_update."'";
				$queryDislike = "UPDATE ejercicio_pag_mensajes.mensajes SET dislikes='".$dislikes."'  WHERE '".$id_mensaje_a_update."'";
	*/
				

				while ($row = mysqli_fetch_array($result)) {

					//print_r($row);

					//query pidiendo nùmero de likes existentes de todos
					$queryNumLikes = "SELECT count(*) AS numLikes FROM ejercicio_pag_mensajes.likes WHERE id_post='".$row["id_post"]."'";   //un query siempre devuelve un objeto Object, un registro, en este caso en el campo num
					$rNumLikes = mysqli_query($cxn, $queryNumLikes);

					$numLikes = 0;
					while($rowB = mysqli_fetch_array($rNumLikes)){
						$numLikes = $rowB["numLikes"];
					}

					//query pidiendo nùmero de favoritos existentes de todos
					$queryNumFavs = "SELECT count(*) AS numFavs FROM ejercicio_pag_mensajes.favoritos WHERE id_post='".$row["id_post"]."'";
					$rNumFavs = mysqli_query($cxn, $queryNumFavs);	

					$numFavs = 0;
					while($rowC = mysqli_fetch_array($rNumFavs)){
						$numFavs = $rowC["numFavs"];
					}

					//query pidiendo nùmero de dislikes existentes de todos
					$queryNumDislikes = "SELECT count(*) AS numDislikes FROM ejercicio_pag_mensajes.dislikes WHERE id_post='".$row["id_post"]."'";
					$rNumDislikes = mysqli_query($cxn, $queryNumDislikes);

					$numDislikes = 0;
					while($rowD = mysqli_fetch_array($rNumDislikes)){
						$numDislikes = $rowD["numDislikes"];
					}

					//query pidiendo nùmero de favs del post propios
					// $queryFavsIniciado = "SELECT count(*) AS numFavsIniciado FROM ejercicio_pag_mensajes.favoritos WHERE id_usuario=".$id_usuario_iniciado." AND id_post = '".$row["id_post"]."'";
					$queryFavsIniciado = "SELECT count(*) AS numFavsIniciado FROM ejercicio_pag_mensajes.favoritos WHERE id_usuario=".$_SESSION['id_iniciado']." AND id_post = '".$row["id_post"]."'";
					$rNumFavsIniciado = mysqli_query($cxn, $queryFavsIniciado);

					$numFavsIniciado = 0;
					while($rowE = mysqli_fetch_array($rNumFavsIniciado)){
						$numFavsIniciado = $rowE["numFavsIniciado"];
					}

					echo '<article class="row">';
						echo '<div class="diag_arriba"></div>';
						echo '<div class="diag_arriba_lado"></div>';
						echo '<div class="diag_estadisticas"> </div>';
						echo '<div class="estadisticas">
									<a href="includes/toggle_like.php?id_post='.$row["id_post"].'"><figure class="like"><img src="images/like3.png" /></figure></a>
									<p>'.$numLikes.'</p>
									<a href="includes/toggle_dislike.php?id_post='.$row["id_post"].'"><figure class="dislike"><img src="images/dislike3.png" /></figure></a>
									<p>'.$numDislikes.'</p>';
						if($numFavsIniciado == 0){
							echo '<a href="includes/toggle_fav.php?favs='.$numFavsIniciado.'&id_post='.$row["id_post"].'"><figure class="estrella"><img src="images/comenReciv2.png" /></figure></a>
							  </div>';
						}else{
							echo '<a href="includes/toggle_fav.php?favs='.$numFavsIniciado.'&id_post='.$row["id_post"].'"><figure class="estrella"><img src="images/comenReciv.png" /></figure></a>
							  </div>';
						}
						echo '<header class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									<figure>
										<img src="'.$row["imagen"].'" alt="">
									</figure>
							  </header>';
						echo '<div class="contenido col-lg-10 col-md-10 col-sm-10 col-xs-12">
									<h1><a href="home.php?id_user_posts='.$row["id_usuario"].'">'.$row["nombre_usuario"].'</a> dice:</h1>
									<p>'.$row["contenido"].'</p>
							  </div>';
						echo '<div class="diag_abajo"></div>';
						echo '<div class="diag_abajo_lado"></div>';
					echo '</article>';

				}
			?>
			<figure id="bajar">
				<a href="#"><img src="images/bajar.png" alt=""></a>
			</figure>
		</section>
		<br />
	</div>
	<footer>
		<p class="copyright">© Coment tube</p>
		<p><a href="#">Condiciones y polìticas</a></p>
	</footer>
	<!-- /container -->        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
	
  </body>
</html>