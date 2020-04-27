<?php
	session_start();
	if ($_SESSION['usu']=="")
	{
		header("Location: acessonegado.php");
	}
?>