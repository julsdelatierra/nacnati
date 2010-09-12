<!DOCTYPE html>
<html>
<head>
	<!-- Tiene que ir -->
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<!-- fin -->
	<title>Untitled</title>
	<!-- Tiene que ir -->
	<script type="text/javascript" src="./js/jquery.js"></script>
	<script type="application/x-javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script type="text/javascript" src="./js/action.js"></script>
	<script type="text/javascript" src="./l12n/es.js"></script>
	<!-- fin -->
</head>
<body>
	<!-- Esto debe ir en un div -->
	<h1><script>document.write(comment_input_message);</script></h1>
	<table>
		<tr>
			<td><script>document.write(name);</script></td>
			<td><input id="nombre" name="nombre" type="text" /></td>
		</tr>
		<tr>
			<td><script>document.write(email);</script></td>
			<td><input id="correo" name="correo" type="text" /></td>
		</tr>
		<tr>
			<td><script>document.write(country);</script></td>
			<td><input id="pais" name="pais" type="text" /></td>
		</tr>
		<tr id="file_estado">
			<td><script>document.write(state);</script></td>
			<td><input id="estado" name="estado" type="text" /></td>
		</tr>
		<tr>
			<td><script>document.write(comment);</script></td>
			<td><textarea id="comentario" name="comentario" cols="30" rows="10"></textarea></td>
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
	<!-- fin -->
</body>
</html>