<!DOCTYPE HTML>
<html>
<head>
	<title>Fibt</title>
</head>
<body>
	<table border="1">
	<?php foreach ($fib as $key => $value) :?>
		<tr>
			<td><?php echo $key; ?></td>
			<td><?php echo $value; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
</body>
</html>