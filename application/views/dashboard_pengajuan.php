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

	.white{
		background-color: #fff;
		color: #000;
	}

	.green{
		background-color: rgba(46,204,113,0.5);
		color: #000;
		padding: 2px;
	}

	.yellow{
		background-color: rgba(241,196,15,1);
		color: #000;
		padding: 2px;
	}
</style>
<div class="container-fluid">
	<h2 class="text-center text-uppercase">daftar pengajuan</h2>
    <hr>
	<?php
		$msg = $this->session->flashdata('msg');
		if(isset($msg)){
			echo $msg;
		}

		$pengajuan = $this->session->flashdata('pengajuan');
		if(isset($pengajuan)){
			echo $pengajuan;
		}
	?>

	<a href="<?= base_url('pengajuan/tambah_pengajuan'); ?>" class="btn btn-primary btn-md text-capitalize tambah"><span class="glyphicon glyphicon-plus"></span> tambah-pengajuan</a>
	<br>
	<label class="text-capitalize">keterangan: </label>
	<label>|</label>
	<p class="green">pengajuan disetujui</p>
	<label>|</label>
	<p class="yellow">catatan pengajuan</p>

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
				<?php 	if ($d->status_p_a4 == '1') {$color = 'green';}
						else if($d->catatan_pengajuan != '0'){$color = 'yellow';}
						else{$color = 'white';}
				?>
				<tr class="<?= $color; ?>">
					<td><?= $i; ?></td>
					<td><?= $d->area; ?></td>
					<td><?= $d->nama_rayon; ?></td>
					<td><?= $d->nama_penyulang; ?></td>
					<td><?= $d->nama_pekerjaan; ?></td>
					<td><?= $d->lokasi; ?></td>
					<td class="text-center">
						<!-- ===================================================================================== -->
						<?php if ($d->status_pengajuan == '0'): ?>
						<a href="<?= base_url('pengajuan/ajukan_pengajuan/?id='.base64_encode($d->id_pengajuan)); ?>" class="btn btn-success btn-sm text-capitalize" onclick="javascript: return confirm('Anda yakin ingin ajukan ? Anda tidak akan bisa mengubah pengajuan lagi')" style="margin-top: 10px;">
							<span class="glyphicon glyphicon-ok"></span> ajukan-pengajuan</a><br>
						<?php endif; ?>
						<!-- ===================================================================================== -->
						<?php if ($d->status_pengajuan == '0' || $d->catatan_pengajuan != '0'): ?>
						<a href="<?= base_url('pengajuan/ubah_pengajuan/?id='.base64_encode($d->id_pengajuan)); ?>" class="btn btn-primary btn-sm text-capitalize" style="margin-top: 10px;">
							<span class="glyphicon glyphicon-pencil"></span> ubah-pengajuan</a><br>
						<?php endif; ?>
						<!-- ===================================================================================== -->
						<a href="<?= base_url('pengajuan/detail_pengajuan/?id='.base64_encode($d->id_pengajuan)); ?>" class="btn btn-warning btn-sm text-capitalize" style="margin-top: 10px;">
							<span class="glyphicon glyphicon-eye-open"> detail-pengajuan</a><br>
						<!-- ===================================================================================== -->
						<a href="<?= base_url('pengajuan/hapus_pengajuan/?id='.base64_encode($d->id_pengajuan)); ?>" class="btn btn-danger btn-sm text-capitalize" onclick="javascript: return confirm('Anda yakin ingin menghapus ?')" style="margin-top: 10px;">
							<span class="glyphicon glyphicon-remove"> hapus-pengajuan</a><br>
						<!-- ===================================================================================== -->
					</td>
				</tr>
			<?php $i++; endforeach; ?>
		</tbody>
	</table>
</div>