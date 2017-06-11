<?php
$aksi="module/penyidik/penyidik_aksi.php";


switch($_GET[aksi]){
default:
?>
 <!-- MENAMPILKAN DATA MASTER penyidik  -->

<h3 class="box-title margin text-center">Data Master Data Penyidik</h3>
<center> <div class="batas"> </div></center>
<br/>
<div class="row">
<div class="col-md-12">
	<div class="box box-solid box-warning">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="fa  fa-plus"></i>
		Tambah Data Penyidik</h3>		 	
		</div>		
	<div class="box-body">
	<?php
$sql ="SELECT max(id_penyidik) as terakhir from penyidik";
  $hasil = mysql_query($sql);
  $data = mysql_fetch_array($hasil);
  $lastID = $data['terakhir'];
  $lastNoUrut = substr($lastID, 3, 9);
  $nextNoUrut = $lastNoUrut + 1;
  $nextID = "PENY".sprintf("%03s",$nextNoUrut);
?> 
	 <form class="form-horizontal" action="<?php echo $aksi?>?module=penyidik&aksi=tambah" role="form" method="post">             

  <div class="form-group">
    <label class="col-sm-4 control-label">ID Penyidik</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" required="required" name="id_penyidik" value="<?php echo  $nextID; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Penyidik</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" required="required" name="nm_penyidik" placeholder="Nama penyidik">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Alamat</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" required="required" name="alamat" placeholder="Alamat">
    </div>
    </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">No telepon</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" required="required" name="no_telp" placeholder="No Telepon">
    </div> 
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Jenis Kelamin</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" required="required" name="jenis_kelamin" placeholder="Jenis Kelamin">
    </div>
    </div>
    <div class="form-group">
    <label class="col-sm-4 control-label">Pendidikan</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" required="required" name="pendidikan" placeholder="Pendidikan">
    </div>
    </div>
    <div class="form-group">
    <label class="col-sm-4 control-label">Jabatan</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" required="required" name="jabatan" placeholder="Jabatan">
    </div>
    </div>
    
  <div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-7">
	<hr/>
      <button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i><i>Reset</i></button> 
    </div>
  </div>
</form>
	</div><!-- /.box-body -->
</div><!-- /.box -->
</div>  
<div class="col-md-12">
	<div class="box box-solid box-danger">
		<div class="box-header">
		<h3 class="btn disabled box-title">
		<i class="fa  fa-street-view"></i>
		Data Master Penyidik</h3>	
		</div>		
	<div class="box-body">
	<table id="example2" class="table table-bordered table-striped">
<thead>
	<tr class="text-red">
		<th class="col-sm-1">No</th> 
		<th>Penyidik</th> 
		<th>Alamat</th>
    <th>No Telepon</th>
    <th>Jenis Kelamin</th>
    <th>Pendidikan</th>
    <th>Jabatan</th> 
		<th class="col-sm-1">AKSI</th> 	
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM penyidik";
$tampil = mysql_query($sql);
$no=1;
while ($tampilkan = mysql_fetch_array($tampil)) { 
$Kode = $tampilkan['id_penyidik'];

?>

	<tr>
	<td><?php echo $no++; ?></td> 
	<td><?php echo $tampilkan['nm_penyidik']; ?></td> 
	<td><?php echo $tampilkan['alamat']; ?></td>
  <td><?php echo $tampilkan['no_telp']; ?></td>
  <td><?php echo $tampilkan['jenis_kelamin']; ?></td>
  <td><?php echo $tampilkan['pendidikan']; ?></td>
  <td><?php echo $tampilkan['jabatan']; ?></td>
	<td align="center">
	<a class="btn btn-xs btn-info" href="?module=penyidik&aksi=edit&id_penyidik=<?php echo $tampilkan['id_penyidik'];?>" alt="Edit Data"><i class="glyphicon glyphicon-pencil"></i></a>
	<a class="btn btn-xs btn-danger"href="<?php echo $aksi ?>?module=penyidik&aksi=hapus&id_penyidik=<?php echo $tampilkan['id_penyidik'];?>"  alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA <?php echo $Kode; ?>	?')"> <i class="glyphicon glyphicon-trash"></i></a>
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
<!----- ----------------------- END TAMBAH DATA MASTER penyidik ------------- ----->
<?php	
break;
case "edit" :
$data=mysql_query("select * from penyidik where id_penyidik='$_GET[id_penyidik]'");
$edit=mysql_fetch_array($data);
?>

<!----- EDIT DATA MASTER penyidik -------->
<h3 class="box-title margin text-center">Edit Data penyidik "<?php echo $_GET['id_penyidik']; ?>"</h3>
<br/>
<form class="form-horizontal" action="<?php echo $aksi?>?module=penyidik&aksi=edit" role="form" method="post">             

  <div class="form-group">
    <label class="col-sm-4 control-label">ID penyidik </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" readonly name="id_penyidik" value="<?php echo $edit['id_penyidik']; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">penyidik</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nm_penyidik"value="<?php echo $edit['nm_penyidik']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Alamat</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="alamat"value="<?php echo $edit['alamat']; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">No Telepon</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="no_telp"value="<?php echo $edit['no_telp']; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">Jenis Kelamin</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="jenis_kelamin"value="<?php echo $edit['jenis_kelamin']; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">Pendidikan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="pendidikan"value="<?php echo $edit['pendidikan']; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">Jabatan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="jabatan"value="<?php echo $edit['jabatan']; ?>">
    </div>
  </div>
  
  
<div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-5">
	<hr/>
<button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<a href="?module=penyidik">
<button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> Batal</button></a>
    </div>
</div>

</form>
</div>
</div>
<!--- END EDIT DATA MASTER penyidik ---->
<?php
break;
}
?>
