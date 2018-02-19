<legend><?php echo $title;?></legend>
<?php echo validation_errors();?>
<?php echo $message;?>

<form class="form-horizontal" action="" method="post" enctype="multypart/form-data">
	<div class="form-group">
		<label class="col-lg-2 control-label">Username</label>
		<div class="col-lg-5">
			<input type="text" name="user" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Password</label>
		<div class="col-lg-5">
			<input type="password" name="password" class="form-control">
		</div>
	</div>
	<div class="form-group well">
		<button class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i>Simpan</button>
		<a href="<?php echo site_url('dashboard/petugas');?>" class="btn btn-default">Kembali</a>
	</div>

</form>