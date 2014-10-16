<?php
	session_start();
	session_destroy();

	header("location: ../index.php"); //uso url relativa, pues qunque en algunas fuentes aparentemente es incorrecto, según esta por demanda popular es correcto: http://en.wikipedia.org/wiki/HTTP_location
?>