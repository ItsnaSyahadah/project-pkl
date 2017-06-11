<?php
$aksi="module/jenis_peng/jenis_peng_aksi.php";
switch($_GET[aksi]){
default:
?>
<!----- ------------------------- MENAMPILKAN DATA MASTER jenis pengaduan ---------------------------->			
<h3 class="box-title margin text-center">Data Master Jenis Pengaduan</h3>
<br/>
<div class="row">
<div class="col-md-6">
	<div class="box box-solid box-warning">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="fa  fa-plus"></i>
		Tambah Data Jenis Pengaduan</h3>		 	
		</div>		
	<div class="box-body">
	<?php
$sql ="SELECT max(id_jenis_peng) as terakhir from jenis_peng";
  $hasil = mysql_query($sql);
  $data = mysql_fetch_array($hasil);
  $lastID = $data['terakhir'];
  $lastNoUrut = substr($lastID, 3, 9);
  $nextNoUrut = $lastNoUrut + 1;
  $nextID = "JEN".sprintf("%03s",$nextNoUrut);
?> 
	 <form class="form-horizontal" action="<?php echo $aksi?>?module=jenis_peng&aksi=tambah" role="form" method="post">             

  <div class="form-group">
    <label class="col-sm-4 control-label">ID Jenis Pengaduan</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" required="required" name="id_jenis_peng" value="<?php echo  $nextID; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Jenis Pengaduan</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" required="required" name="nm_jenis_peng" placeholder="Nama jenis_peng">
    </div>
  </div><div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-7">
	<hr/>
      <button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i><i> Reset</i></button> 
    </div>
  </div>
</form>
	</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
<div class="col-md-6">
	<div class="box box-solid box-danger">
		<div class="box-header">
		<h3 class="btn disabled box-title">
		<i class="fa fa-male"></i>
		Data Master Jenis Pengaduan</h3>	
		</div>		
	<div class="box-body">
	<table id="example2" class="table table-bordered table-striped">
<thead>
	<tr class="text-red">
		<th class="col-sm-1">No</th> 
		<th>Jenis Pengaduan</th> 
		<th class="col-sm-1">AKSI</th> 	
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM jenis_peng";
$tampil = mysql_query($sql);
$no=1;
while ($tampilkan = mysql_fetch_array($tampil)) { 
$Kode = $tampilkan['id_jenis_peng'];

?>

	<tr>
	<td><?php echo $no++; ?></td> 
	<td><?php echo $tampilkan['nm_jenis_peng']; ?></td> 
	<td align="center">
	<a class="btn btn-xs btn-info" href="?module=jenis_peng&aksi=edit&id_jenis_peng=<?php echo $tampilkan['id_jenis_peng'];?>" alt="Edit Data"><i class="glyphicon glyphicon-pencil"></i></a>
	<a class="btn btn-xs btn-danger"href="<?php echo $aksi ?>?module=jenis_peng&aksi=hapus&id_jenis_peng=<?php echo $tampilkan['id_jenis_peng'];?>"  alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA <?php echo $Kode; ?>	?')"> <i class="glyphicon glyphicon-trash"></i></a>
	</td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>
<!----- ------------------------- END TAMBAH DATA MASTER jenis_peng ------------------------- ----->
<?php	
break;
case "edit" :
$data=mysql_query("select * from jenis_peng where id_jenis_peng='$_GET[id_jenis_peng]'");
$edit=mysql_fetch_array($data);
?>

<!----- ------------------------- EDIT DATA MASTER jenis_peng ------------------------- ----->
<h3 class="box-title margin text-center">Edit Data Jenis Pengaduan "<?php echo $_GET['id_jenis_peng']; ?>"</h3>
<br/>
<form class="form-horizontal" action="<?php echo $aksi?>?module=jenis_peng&aksi=edit" role="form" method="post">             

  <div class="form-group">
    <label class="col-sm-4 control-label">ID Jenis Pengaduan </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" readonly name="id_jenis_peng" value="<?php echo $edit['id_jenis_peng']; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Jenis Pengaduan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nm_jenis_peng"value="<?php echo $edit['nm_jenis_peng']; ?>">
    </div>
  </div>
  
<div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-5">
	<hr/>
<button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<a href="?module=jenis_peng">
<button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> Batal</button></a>
    </div>
</div>

</form>
</div>
</div>
<!----- ------------------------- END EDIT DATA MASTER jenis_peng ------------------------- ----->
<?php
break;
}
?>