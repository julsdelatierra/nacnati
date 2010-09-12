<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<title>Untitled</title>
	<script type="text/javascript" src="./js/jquery.js"></script>
	<script type="application/x-javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script type="text/javascript" src="./js/action.js"></script>
</head>
<body>
	<form action="guardarOpinion.php" method="post">
	<table>
		<tr>
			<td>Nombre</td>
			<td><input name="nombre" type="text" value="Julian" /></td>
		</tr>
		<tr>
			<td>Correo</td>
			<td><input name="correo" type="text" value="email@gmail.com" /></td>
		</tr>
		<tr>
			<td>Pa&iacute;s</td>
			<td><input name="pais" type="text" value="Mexico" /></td>
		</tr>
		<tr id="state">
			<td>Estado</td>
			<td><input name="estado" type="text" value="Yucatan" /></td>
		</tr>
		<tr>
			<td>Comentario</td>
			<td><textarea name="comentario" cols="30" rows="10">Comentario vacio</textarea></td>
		</tr>
		<tr>
			<td>Captcha</td>
			<td>
			<?php
			require_once('lib/recaptchalib.php');
			$publickey = '6LemkLwSAAAAAJ-8XySLab82Zm5z0343p7GInLex';
			echo recaptcha_get_html($publickey);
			?>
			</td>
		</tr>
	</table>
	<input id="send" type="submit" value="Enviar" />
	</form>
</body>
</html>