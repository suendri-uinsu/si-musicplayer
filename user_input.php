<h2>TAMBAH USER</h2>

<form method="POST" action="user_proses.php">
	<table>
		<tr>
			<td>USERNAME</td>
			<td><input type="text" name="user_name" required></td>
		</tr>
		<tr>
			<td>PASSWORD</td>
			<td><input type="password" name="user_password" required></td>
		</tr>
		<tr>
			<td>EMAIL</td>
			<td><input type="text" name="user_email" required></td>
		</tr>
		<tr>
			<td>NAMA LENGKAP</td>
			<td><input type="text" name="user_nama_lengkap" required></td>
		</tr>
		<tr>
			<td>ROLE</td>
			<td>
				<select name="user_role">
					<option value="1">Administrator</option>
					<option value="2">Operator</option>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btn-simpan" value="SIMPAN"></td>
		</tr>
	</table>
</form>