<?php
	session_start();
	
	//función para verificar el nombre de usuario ingresado y la contraseña
	//retorna 1 si encuentra, 0 si no
	//el tercer parámetro que recibe lo llena con datos del usuario encontrado
	function verificarInicioSesion($usuario,$contrasena,&$result){
		include_once("includes/database.php");

		$query = "SELECT * FROM ejercicio_pag_mensajes.usuarios WHERE (nombre_usuario='$usuario') AND (contrasena='$contrasena')";
		$res = mysqli_query($cxn,$query);
		$conteo = 0;

		while ($row = mysqli_fetch_array($res)) {
			$conteo ++;
			$result = $row;
		}
		if($conteo == 1){
			return 1;
		}else{
			return 0;
		}

	}

	if(!isset($_SESSION['user_id'])){   //si no existe un usuario en la sesión
		if(isset($_POST['Ingresar'])){		//si se ha hecho clic en el boton de hacer inicio de sesión (el botón tiene nombre ingresar)
			if(verificarInicioSesion($_POST['usuario'],$_POST['contrasena'],$result)==1){		//se verifica datos de inicio de sesión, y si el usuario existe
				$_SESSION['id_iniciado'] = $result['id'];		//se asigna datos y se redirige al home
				$_SESSION['usuario'] = $result['nombre_usuario'];
				header("location:home.php");
			}else{
            	echo '<p>Su usuario o contrasena es incorrecto, intente de nuevo.</p>';		//de lo contrario feedback
        	}
		}
	

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Coment tube</title>
		
		<link rel="stylesheet" href="css/styles.css">
		<meta name="viewport" content="width=device-width">  <!-- para que el 100% del dispositivo sea el ancho visible real del dispositivo (ùtil para mòbiles)-->
	</head>
	<body> esot ponerlo mas centrado!!!, tanto título como form, ver cuaderno
	...faltan comentarios e indexar y lo que pide el proffe de los códigos, ver cuaderno!!!!
			<figure id="logo">
				<img src="images/logo.png" alt="">
			</figure>
			<div id="headerTitle">
				<h1>Coment tube</h1>
				<h2>un canal para comentar</h2>
			</div>
		</header>
		<section id="sectionIndex">
			<br /><br /><br />
			<!-- En este formulario al enviarse al oprimir el botón enviar, se envía por método POST a revisar_usuario.php para que allá se guarde el nuevo estudiante con los datos llenados  -->
			<form action="" method="POST"> <!-- action: el archivo al que se mandan los datos al hacer clic en submit -->
			 	<label></label><input type="text" name="usuario" autocomplete="on" placeholder="Nombre de usuario"><br />  
			 	<label></label><input type="password" name="contrasena" autocomplete="on" placeholder="Clave"><br />
			 	<input type="submit" name="Ingresar" value="Ingresar">
			</form> 
			<?php
				}else{
					echo 'Su usuario ha ingresado correctamente.';
					echo '<a href="includes/logout.php">LOGOUT</a>';
				}	

				echo "<br />";
				if(isset($_GET['Message'])){   //PARA LA CAPTURA DEL MENSAJE QUE PUEDE LLEGAR AL REALIZAR UN REGISTRO EXITOSO (desde registrar_usuario.php)
				    echo "<p style='color:green;'>".$_GET['Message']."</p>";
				}
			?>
			<br /><br /><br />
			<a href="registro.php">Registrarse</a>
		</section>
		<footer id="footerIndex">
			<p class="copyright">© Coment tube</p>
			<p><a href="#">Condiciones y polìticas</a></p>
		</footer>
		
	</body>
</html>