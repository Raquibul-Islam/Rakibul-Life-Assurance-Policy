<?php
	session_start();
	session_destroy();
	
	header("Location: index.php");

?>

<form action="logout.php" method="POST">
	<table>
		<tr>
			<td><input type="submit" value="Logout"/></td>
		</tr>
	</table>
	</form>