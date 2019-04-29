<style type="text/css">
	.bg-primary{
		margin-bottom: 10px;
	}

	table,
	tr,
	td{
	    padding: 10px;
	}

	.del{
	    display: none;
	}

	.notif{
		background-color: rgba(241,196,15,1);
		color: #fff;
		padding: 2px;
	}
</style>
<div class="container-fluid">
<!-- ========= formulir PERMIT ================================= -->
<h2 class="text-center text-uppercase">detail pengajuan</h2>
<hr>

<?php foreach ($dt_pengajuan as $dt): ?>

<div  class=" well">
	<div class="row">
		<div class="col-md-1">
			<label class="text-uppercase">vendor</label>
		</div>
		<div class="col-md-11">
			<label class="text-capitalize">: <?= $dt->nama_vendor; ?></label>
		</div>
	</div>
</div>

<?php if ($dt->catatan_pengajuan != '0') : ?>
	<div  class="notif">
		<div class="row">
			<div class="col-md-2">
				<label class="text-uppercase">catatan pengajuan</label>
			</div>
			<div class="col-md-10">
				<textarea class="form-control" rows="5" readonly><?= $dt->catatan_pengajuan; ?></textarea>
			</div>
		</div>
	</div>
	<hr>
<?php endif; ?>

<div class="well">
	<div class="row">
		<div class="col-md-2">
			<label class="text-uppercase">no dokumen</label>
		</div>
		<div class="col-md-10">
			<input type="text" class="form-control" value="<?= $dt->no_dok; ?>" readonly>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<label class="text-uppercase">area</label>
		</div>
		<div class="col-md-10">
			<input type="text" class="form-control" value="<?= $dt->area; ?>"  readonly>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<label class="text-uppercase">rayon</label>
		</div>
		<div class="col-md-10">
            <?php foreach ($d_rayon as $d): ?>
                <?php if ($dt->id_rayon == $d->id_rayon): ?>
                	<input type="text" class="form-control" value="<?= $d->nama_rayon;?>" readonly>
            	<?php endif; ?>
            <?php endforeach; ?>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<label class="text-uppercase">penyulang</label>
		</div>
		<div class="col-md-10">
            <?php foreach ($d_penyulang as $d): ?>
            	<?php if ($dt->id_penyulang == $d->id_penyulang): ?>
            		<input type="text" class="form-control" value="<?= $d->nama_penyulang;?>" readonly>
            	<?php endif; ?>
            <?php endforeach; ?>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<label class="text-uppercase">lokasi kerja</label>
		</div>
		<div class="col-md-10">
			<input type="text" class="form-control" value="<?= $dt->lokasi; ?>"  readonly>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<label class="text-uppercase">deskripsi kerja</label>
		</div>
		<div class="col-md-10">
			<textarea class="form-control" rows="5" readonly><?= $dt->nama_pekerjaan; ?></textarea>
		</div>
	</div>
</div>

<div class="well">
	<h3 class="text-uppercase text-center">aplikasi</h3><hr>
	<div class="row">
		<?php foreach ($d_aplikasi as $d): ?>
		<div class="col-md-3 text-capitalize">
			<div class="checkbox">
			<label><input type="checkbox" <?php if ( in_array($d->id_aplikasi, $d_a_aplikasi)) {echo 'checked="checked"';}?> disabled><?= $d->n_aplikasi; ?></label>
			</div>
		</div>
		<?php endforeach; ?>

	</div>
</div>
<!-- ========================================== -->
<div class="well">
	<h3 class="text-uppercase text-center">jenis peralatan</h3><hr>
	<div class="row">
		<?php foreach ($d_jPeralatan as $d): ?>
		<div class="col-md-4 text-capitalize">
			<div class="checkbox">
			<label><input type="checkbox" <?php if ( in_array($d->id_jPeralatan, $d_a_jPeralatan)) {echo 'checked="checked"';}?> disabled><?= $d->n_jPeralatan; ?></label>
			</div>
		</div>
		<?php endforeach; ?>

	</div>
</div>

<div class="well">

	<h3 class="text-uppercase text-center">bahaya yang mungkin terjadi</h3><hr>
	<div class="row">

		<?php foreach ($d_bahaya as $d): ?>
		<div class="col-md-4 text-capitalize">
			<div class="checkbox">
			<label><input type="checkbox" <?php if ( in_array($d->id_bahaya, $d_a_bahaya)) {echo 'checked="checked"';}?> disabled><?= $d->n_bahaya; ?></label>
			</div>
		</div>
		<?php endforeach; ?>

	</div>	
</div>

<div class="well">

	<h3 class="text-uppercase text-center">tindakan pencegahan yang dilakukan sebelum dan semasa kerja</h3><hr>
	<div class="row">

		<?php foreach ($d_tPencegahan as $d): ?>
		<div class="col-md-6 text-capitalize">
			<div class="checkbox">
			<label><input type="checkbox" <?php if ( in_array($d->id_tPencegahan, $d_a_tPencegahan)) {echo 'checked="checked"';}?> disabled><?= $d->n_tPencegahan; ?></label>
			</div>
		</div>
		<?php endforeach; ?>

	</div>
</div>

<div class="well">
	<h3 class="text-uppercase text-center">tindakan keselamatan lain yang diperlukan</h3><hr>
  	<textarea class="form-control" rows="5" readonly><?= $dt->tindakan_keselamatan; ?></textarea>
</div>

<div class="well">

	<h3 class="text-uppercase text-center">alat perlindungan diri</h3><hr>
	<div class="row">

		<?php foreach ($d_apd as $d): ?>
		<div class="col-md-4 text-capitalize">
			<div class="checkbox">
			<label><input type="checkbox" <?php if ( in_array($d->id_apd, $d_a_apd)) {echo 'checked="checked"';}?> disabled><?= $d->n_apd; ?></label>
			</div>
		</div>
		<?php endforeach; ?>
	
	</div>
</div>

<div class="well">

	<h3 class="text-uppercase text-center">pengeluaran surat izin</h3><hr>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<label class="col-md-3 control-label text-uppercase">izin diberikan selama</label>
				<div class="col-md-4">

					<div class="row">
						<div class="col-md-3">
							<label class="text-capitalize">mulai:</label>
						</div>
						<div class="col-md-9">
							<div>
				                <input class="form-control" type="text" readonly value="<?= $dt->tgl_mulai; ?>" >
				            </div>
						</div>
					</div>
					
				</div>

				<div class="col-md-4">

					<div class="row">
						<div class="col-md-4">
							<label class="text-capitalize">berakhir:</label>
						</div>
						<div class="col-md-8">
							<div>
				                <input class="form-control" type="text" readonly value="<?= $dt->tgl_berakhir; ?>" >
				            </div>
						</div>
					</div>
					
				</div>
			</div>	
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-3">
			<label class="text-uppercase">single line diagram:</label>
		</div>
		<div class="col-md-6">
			<img src="<?= base_url('single_line/'.$dt->single_line); ?>" class="img-rounded" alt="single line diagram" style="height:300px">
		</div>
	</div>
</div>

<div class="well" >
	<h3 class="text-uppercase text-center">persetujuan penanggung jawab</h3><hr>

	<table class="table table-bordered">
		<thead class="text-uppercase">
			<th class="text-center">no</th>
			<th class="text-center">nama pengawas</th>
			<th class="text-center">nama kontraktor</th>
		</thead>
		<tbody>
			<?php $i=1; ?>
			<?php foreach($d_a_pengawas as $d): ?>
			<tr>
				<td><?= $i; ?></td>
				<td><?= $d->nama_pengawas; ?></td>
				<td><?= $d->kontraktor; ?></td>
			</tr>
			<?php $i++; endforeach; ?>
		</tbody>
	</table>
</div>

<div class="well">
	<h3 class="text-uppercase text-center">petugas pelaksana</h3><hr>

	<table class="table table-bordered">
		<thead class="text-uppercase">
			<th class="text-center">no</th>
			<th class="text-center">nama pekerja</th>
		</thead>
		<tbody>
			<?php $i=1; ?>
			<?php foreach($d_a_pekerja as $d): ?>
			<tr>
				<td><?= $i; ?></td>
				<td><?= $d->nama_pekerja; ?></td>
			</tr>
			<?php $i++; endforeach; ?>
		</tbody>
	</table>
</div>

<div class="well">
	<h3 class="text-uppercase text-center">peralatan yang perlu dibebaskan</h3><hr>

	<table class="table table-bordered">
		<thead class="text-uppercase">
			<th class="text-center">no</th>
			<th class="text-center">peralatan yang dibebaskan</th>
			<th class="text-center">status</th>
		</thead>
		<tbody>
			<?php $i=1; ?>
			<?php foreach($d_a_peralatan as $d): ?>
			<tr>
				<td><?= $i; ?></td>
				<td><?= $d->nama_alat;?></td>
				<td><?= $d->status;?></td>
			</tr>
			<?php $i++; endforeach; ?>
		</tbody>
	</table>

	<div class="row">
		<div class="col-md-12">
			<label class=" control-label text-uppercase">catatan untuk peralatan yang perlu dibebaskan:</label>
  			<textarea class="form-control" rows="5" ><?= $dt->catatan_peralatan; ?></textarea>
		</div>
	</div>
</div>
<!-- ========= END formulir PERMIT ================================= -->

<!-- ========= formulir JSA ================================= -->
	<h2 class="text-center text-uppercase">formulir job safety analysis (jsa)</h2>
	<hr>

	<div class="well">
		<h3 class="text-uppercase text-center">rincian pekerjaan</h3><hr>

		<table class="table table-bordered">
			<thead class="text-uppercase">
				<th class="text-center">no</th>
				<th class="text-center">rincian pekerjaan</th>
			</thead>
			<tbody>
				<?php $i=1; ?>
				<?php foreach($d_a_dPekerjaan as $d): ?>
				<tr>
					<td><?= $i; ?></td>
					<td><?= $d->nama_pekerjaan;?></td>
				</tr>
				<?php $i++; endforeach; ?>
			</tbody>
		</table>
		<hr>
		<div class="row">
			<label class="text-uppercase">diperlukan pemadaman</label>
			<label class="radio-inline text-uppercase"><input type="radio" <?php if($dt->status_pemadaman == 'ya') {echo 'checked="checked"';}?> disabled>ya</label>
			<label class="radio-inline text-uppercase"><input type="radio" <?php if($dt->status_pemadaman == 'tidak') {echo 'checked="checked"';}?> disabled>tidak</label>
		</div>
	</div> <!-- end well -->

	<div class="well">
		<h3 class="text-uppercase text-center">peralatan kerja dan alat k2</h3><hr>

		<table class="table table-bordered">
			<thead class="text-uppercase">
				<th class="text-center">no</th>
				<th class="text-center">peralatan kerja dan alat k2</th>
			</thead>
			<tbody>
				<?php $i=1; ?>
				<?php foreach($d_a_k2 as $d): ?>
				<tr>
					<td><?= $i; ?></td>
					<td><?= $d->nama_peralatan; ?></td>
				</tr>
				<?php $i++; endforeach; ?>
			</tbody>
		</table>
	</div> <!-- end well -->

	<div class="well">
		<h3 class="text-uppercase text-center">langkah pengkerjaan</h3><hr>

		<table class="table table-bordered">
			<thead class="text-uppercase">
				<th class="text-center">no</th>
				<th class="text-center">langkah kerja</th>
				<th class="text-center">potensi bahaya</th>
				<th class="text-center">apd yang digunakan</th>
				<th class="text-center">rekomendasi prosedur kerja</th>
			</thead>
			<tbody>
				<?php $i=1; ?>
				<?php foreach($d_a_lPengerjaan as $d): ?>
				<tr>
					<td><?= $i; ?></td>
					<td><?= $d->lKerja; ?></td>
					<td><?= $d->pBahaya; ?></td>
					<td><?= $d->apd; ?></td>
					<td><?= $d->pRekomendasi; ?></td>
				</tr>
				<?php $i++; endforeach; ?>
			</tbody>
		</table>
	</div>
<?php endforeach; ?>
<!-- ========= END formulir JSA ================================= -->
</div>