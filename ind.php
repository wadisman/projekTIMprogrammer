<?php
include"koneksi.php";
$sql=mysql_query("SELECT * FROM tbl_dosen where kd_dosen='$_GET[id]' ORDER BY kd_dosen ASC");
$row = mysql_fetch_array($sql);
?>	
<h2>Form dosen</h2>
<form method="POST" action="" enctype="multipart/form-data">
<table width="100%" border="1">
<tr><td>Kode Dosen</td> <td>: <input type="text" name="kd_dosen1" value="<?php echo $row['kd_dosen'] ?>" size="20" disabled>
	<input type="hidden" name="kd_dosen" value="<?php echo $row['kd_dosen'] ?>" size="20"></td></tr>
<tr><td>Nama Dosen</td> <td>: <input type="text" name="nama_dosen" value="<?php echo $row['nama_dosen'] ?>" size="50"></td></tr>
<tr><td>Jenis Kelamin</td> <td>: 
					<select name="jenis_kelamin">
					<option value="Laki-Laki" <?php if($row['jenis_kelamin']=='Laki-Laki'){ echo "selected"; } ?>>Laki-Laki</option>
					<option value="Perempuan" <?php if($row['jenis_kelamin']=='Perempuan'){ echo "selected"; } ?>>Perempuan</option>
					</select>
					</td></tr>

<tr><td>Aktif</td> <td>: 
					<select name="aktif">
					<option value="Y" <?php if($row['aktif']=='Y'){ echo "selected"; } ?>>Y</option>
					<option value="N" <?php if($row['aktif']=='N'){ echo "selected"; } ?>>N</option>
					</select>
					</td></tr>
<tr><td>&nbsp;</td> <td><button type="submit">Edit</button></td></tr>					
</table>
</form>

<?php
include"koneksi.php";

if(!empty($_POST['kd_dosen'])){
$sql = mysql_query("update tbl_dosen set nama_dosen='$_POST[nama_dosen]',
jenis_kelamin='$_POST[jenis_kelamin]',
aktif='$_POST[aktif]' where kd_dosen='$_POST[kd_dosen]'");
if($sql){
echo"<script>
alert('Data Sukses Disimpan');
window.location.href='../view/view-dosen.php';
</script>";	
}
}
?>
