<style type="text/css">
	.tambah{
		margin-bottom: 10px;
	}

	td a{
		margin-bottom: 5px;
	}

	.yellow{
		background-color: #f1c40f;
		color: #fff;
	}
	.white{
		background-color: #fff;
		color: #000;
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

		$pekerjaan = $this->session->flashdata('pekerjaan');
		if(isset($pekerjaan)){
			echo $pekerjaan;
		}
	?>

	<a href="<?= base_url('pekerjaan/tambah_pekerjaan'); ?>" class="btn btn-primary btn-md text-capitalize tambah"><span class="glyphicon glyphicon-plus"></span> tambah pekerjaan</a>

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
				<?php if ($d->status_pekerjaan == '0') {$color = 'yellow';} else{$color = 'white';} ?>
				<tr class="<?= $color; ?>">
					<td><?= $i; ?></td>
					<td><?= $d->area; ?></td>
					<td><?= $d->nama_rayon; ?></td>
					<td><?= $d->nama_penyulang; ?></td>
					<td><?= $d->nama_pekerjaan; ?></td>
					<td><?= $d->lokasi; ?></td>
					<td class="text-center" colspan="2">
						<a href="<?= base_url('pekerjaan/ubah_pekerjaan/?id='.base64_encode($d->id_pekerjaan)); ?>" class="btn btn-primary btn-xs text-capitalize" style="margin-top: 10px;">
							<span class="glyphicon glyphicon-pencil"></span> ubah</a>
						<a href="<?= base_url('pekerjaan/detail/?id='.base64_encode($d->id_pekerjaan)); ?>" class="btn btn-warning btn-xs text-capitalize" style="margin-top: 10px;">
							<span class="glyphicon glyphicon-list-alt"> detail</a><br>
						<?php if ($d->status_pekerjaan == '0'){$label = 'selesai';}else{$label = 'belum selesai';}?>
						<a href="<?= base_url('pekerjaan/status/?id='.base64_encode($d->id_pekerjaan).'/'.$d->status_pekerjaan); ?>" class="btn btn-success btn-xs text-capitalize" style="margin-top: 10px;">
							<span class="glyphicon glyphicon-ok"> <?= $label; ?></a>
						<a href="<?= base_url('pekerjaan/hapus/?id='.base64_encode($d->id_pekerjaan)); ?>" class="btn btn-danger btn-xs text-capitalize" onclick="javascript: return confirm('Anda yakin ingin menghapus ?')" style="margin-top: 10px;">
							<span class="glyphicon glyphicon-remove"> hapus</a>
					</td>
				</tr>
			<?php $i++; endforeach; ?>
		</tbody>
	</table>
</div>