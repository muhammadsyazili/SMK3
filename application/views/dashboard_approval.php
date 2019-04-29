<style type="text/css">
	.tambah{
		margin-bottom: 10px;
	}

	td a{
		margin-bottom: 5px;
	}
</style>
<div class="container-fluid">
	<h2 class="text-center text-uppercase">daftar pekerjaan</h2>
    <hr>
	<?php
		$msg = $this->session->flashdata('msg');
		if(isset($msg)){
			echo $msg;
		}
	?>

	<table class="table table-bordered">
		<thead class="text-uppercase">
			<th class="text-center">no</th>
			<th class="text-center">area</th>
			<th class="text-center">rayon</th>
			<th class="text-center">penyulang</th>
			<th class="text-center">deskripsi kerja</th>
			<th class="text-center">lokasi</th>
			<th class="text-center">aksi</th>
		</thead>
		<tbody>
			<?php $i=1; ?>
			<?php foreach($dt as $d): ?>
				<tr>
					<td><?= $i; ?></td>
					<td><?= $d->area; ?></td>
					<td><?= $d->nama_rayon; ?></td>
					<td><?= $d->nama_penyulang; ?></td>
					<td><?= $d->nama_pekerjaan; ?></td>
					<td><?= $d->lokasi; ?></td>
					<td class="text-center">
						<a href="<?= base_url('pekerjaan/ubah_pekerjaan/?id='.base64_encode($d->id_pekerjaan)); ?>" class="btn btn-primary btn-xs text-capitalize" style="margin-top: 10px;">
							<span class="glyphicon glyphicon-pencil"></span> ubah</a>
						<a href="<?= base_url('pekerjaan/detail/?id='.base64_encode($d->id_pekerjaan)); ?>" class="btn btn-warning btn-xs text-capitalize" style="margin-top: 10px;">
							<span class="glyphicon glyphicon-list-alt"> detail</a><br>
						<a href="<?= base_url('pekerjaan/selesai/?id='.base64_encode($d->id_pekerjaan)); ?>" class="btn btn-success btn-xs text-capitalize" style="margin-top: 10px;">
							<span class="glyphicon glyphicon-ok"> selesai</a>
						<a href="<?= base_url('pekerjaan/hapus/?id='.base64_encode($d->id_pekerjaan)); ?>" class="btn btn-danger btn-xs text-capitalize" onclick="javascript: return confirm('Anda yakin ingin menghapus ?')" style="margin-top: 10px;">
							<span class="glyphicon glyphicon-remove"> hapus</a>
					</td>
				</tr>
			<?php $i++; endforeach; ?>
		</tbody>
	</table>
</div>