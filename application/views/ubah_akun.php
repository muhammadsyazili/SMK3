<style type="text/css">
	.action{
		margin-top: 10px;
	}
</style>
<div class="container">
	<?php
		$msg = $this->session->flashdata('msg');
		if(isset($msg)){
			echo $msg;
		}
	?>

	<h2 class="text-center text-uppercase">ubah akun</h2>
    <hr>
	<?= form_open('admin/ubah_akun'); ?>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				  	<label for="username" class="text-capitalize">usermane</label>
		  			<input type="text" class="form-control" id="username" onkeyup="cek_username(this.value);" name="username" value="<?= $dt_akun->username; ?>" required>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
				  	<label for="password" class="text-capitalize">password</label>
		  			<input type="text" class="form-control" id="password" name="password" required>
				</div>
			</div>

			<div class="col-md-12">
				<label class="text-capitalize">role</label><br>
			    <label class="radio-inline text-uppercase"><input type="radio" name="role" value="vendor" <?php if($dt_akun->role == 'vendor') {echo 'checked="checked"';}?>>vendor</label>
				<label class="radio-inline text-uppercase"><input type="radio" name="role" value="admin" <?php if($dt_akun->role == 'admin') {echo 'checked="checked"';}?>>admin</label>
				<label class="radio-inline text-uppercase"><input type="radio" name="role" value="approval1" <?php if($dt_akun->role == 'approval1') {echo 'checked="checked"';}?>>pengawas k3</label>
				<label class="radio-inline text-uppercase"><input type="radio" name="role" value="approval2" <?php if($dt_akun->role == 'approval2') {echo 'checked="checked"';}?>>supervisor operasi</label>
				<label class="radio-inline text-uppercase"><input type="radio" name="role" value="approval3" <?php if($dt_akun->role == 'approval3') {echo 'checked="checked"';}?>>manager rayon</label>
				<label class="radio-inline text-uppercase"><input type="radio" name="role" value="approval4" <?php if($dt_akun->role == 'approval4') {echo 'checked="checked"';}?>>asman jaringan</label>
			</div>
		</div>

		<input type="hidden" name="id_akun" value="<?= $dt_akun->id_akun;?>">
		<input type="submit" value="ubah" class="btn btn-primary btn-block text-capitalize action" name="ubah"></input>
	<?= form_close();?>
</div>

<script type="text/javascript">
	function cek_username(username){
		var cari = username.search(" ");
		if (cari >= 0) {
			alert('tidak boleh menggunakan spasi');
            return false;
		}
		console.log(username);
		console.log(cari);
		return true;
	}
</script>