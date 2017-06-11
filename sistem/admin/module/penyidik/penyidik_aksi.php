<?php
include "../../koneksi.php";

$module=$_GET['module'];
$aksi=$_GET['aksi'];

$id = $_POST['id_penyidik'];
$penyidik = $_POST['nm_penyidik'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$pendidikan = $_POST['pendidikan'];
$jabatan = $_POST['jabatan'];
// HAPUS
if($module=='penyidik' AND $aksi=='hapus' ){ 
$mySql = "DELETE FROM penyidik WHERE id_penyidik='".$_GET['id_penyidik']."'";
$myQry = mysql_query($mySql);
header('location:../../index.php?module='.$module);
}
else if($module=='penyidik' AND $aksi=='edit' ){ 
$sql = "UPDATE penyidik SET 
nm_penyidik='$penyidik',
alamat='$alamat',
no_telp='$no_telp',
jenis_kelamin='$jenis_kelamin',
pendidikan='$pendidikan',
jabatan='$jabatan' WHERE id_penyidik = '$id'";
$edit = mysql_query($sql);
header('location:../../index.php?module='.$module);
}
//Tambah
else if($module=='penyidik' AND $aksi=='tambah' ){ 
	header('location:../../index.php?module='.$module);
$sql = "INSERT INTO penyidik (id_penyidik, nm_penyidik, alamat, no_telp, jenis_kelamin, pendidikan, jabatan) VALUES ('$id', '$penyidik', '$alamat', '$no_telp', '$jenis_kelamin', '$pendidikan', '$jabatan')";
$simpan = mysql_query($sql);
}

?>