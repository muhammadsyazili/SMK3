<style type="text/css">
	.tambah{
		margin-bottom: 10px;
	}

	td a{
		margin-bottom: 5px;
	}

	p{
		display: inline;
	}
</style>
<div class="container">
	<?php
		$msg = $this->session->flashdata('msg');
		if(isset($msg)){
			echo $msg;
		}
	?>

	<h2 class="text-center text-uppercase">daftar akun</h2>
    <hr>
	<a href="<?= base_url('admin/tambah_akun'); ?>" class="btn btn-primary btn-md text-capitalize tambah"><span class="glyphicon glyphicon-plus"></span> tambah akun</a><br>
	
	<label class="text-capitalize">keterangan role: </label>
	<label>|</label>
	<p>admin (admin)</p>
	<label>|</label>
	<p>vendor (vendor)</p>
	<label>|</label>
	<p>approvel1 (pengawas k3)</p>
	<label>|</label>
	<p>approval2 (supervisor operasi)</p>
	<label>|</label>
	<p>approval3 (manager rayon)</p>
	<label>|</label>
	<p>approval4 (asman jaringan)</p>

	<table class="table table-bordered">
		<thead class="text-uppercase">
			<th class="text-center">no</th>
			<th class="text-center">username</th>
			<th class="text-center">password (enkripsi)</th>
			<th class="text-center">role</th>
			<th class="text-center">aksi</th>
		</thead>
		<tbody>
			<?php $i=1; ?>
			<?php foreach($dt_akun as $d): ?>
			<tr>
				<td class="text-center"><?= $i; ?></td>
				<td class="text-center"><?= $d->username; ?></td>
				<td class="text-center"><?= $d->password; ?></td>
				<td class="text-center"><?= $d->role; ?></td>
				<td class="text-center">
					<a href="<?= base_url('admin/ubah_akun/?id='.base64_encode($d->id_akun)); ?>" class="btn btn-primary btn-xs text-capitalize"><span class="glyphicon glyphicon-pencil"></span> ubah</a>
					<a href="<?= base_url('admin/hapus_akun/?id='.base64_encode($d->id_akun)); ?>" class="btn btn-danger btn-xs text-capitalize" onclick="javascript: return confirm('Anda yakin ingin menghapus ?')"><span class="glyphicon glyphicon-remove"> hapus</a>
				</td>
			</tr>
			<?php $i++; endforeach; ?>
		</tbody>
	</table>
</div>