<h2>LOGIN SISTEM</h2>

<?php

// Kalau login error tampilkan notifikasi
if (isset($_SESSION['login_error'])) {
	echo '<p style="color:red">' . $_SESSION['login_error'] . '</p>';
	unset($_SESSION['login_error']);
}

?>

<form action="index_proses.php" method="POST">
	<table>
		<tr>
			<td>Username</td>
			<td><input type="text" name="user_name" required autocomplete="off"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="user_password" required autocomplete="off"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btn-login" value="LOGIN"></td>
		</tr>
	</table>
</form>