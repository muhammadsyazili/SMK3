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

	.action{
		margin-bottom: 20px;
	}
</style>
<div class="container-fluid">
	<?php
		$msg = $this->session->flashdata('msg');
		if(isset($msg)){
			echo $msg;
		}
	?>

<!-- ========= formulir PERMIT ================================= -->
<?= form_open_multipart('pengajuan/tambah_pengajuan', 'onSubmit="return validate()"'); ?>
<h2 class="text-center text-uppercase">tambah pengajuan</h2>
<hr>

<div  class=" well">
	<div class="row">
		<div class="col-md-1">
			<label class="text-uppercase">tanggal</label>
		</div>
		<div class="col-md-11">
			<label class="text-uppercase">: <?= date('d m Y'); ?></label>
		</div>
		<div class="col-md-1">
			<label class="text-uppercase">vendor</label>
		</div>
		<div class="col-md-11">
			<label class="text-capitalize">: <?= $nama_vendor; ?></label>
		</div>
	</div>
</div>

<div class="well">
	<div class="row">
		<div class="col-md-2">
			<label class="text-uppercase">no dokumen</label>
		</div>
		<div class="col-md-10">
			<input type="text" class="form-control" name="no_dok" required>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<label class="text-uppercase">area</label>
		</div>
		<div class="col-md-10">
			<input type="text" class="form-control" name="area" required>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<label class="text-uppercase">rayon</label>
		</div>
		<div class="col-md-10">
			<select class="form-control selectpicker" data-live-search="true" name="rayon" required>
                <option disabled selected> -- Pilih Rayon -- </option>
                <?php foreach ($d_rayon as $d): ?>
                    <option value="<?= $d->id_rayon; ?>"><?= $d->nama_rayon; ?></option>
                <?php endforeach; ?>
            </select>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<label class="text-uppercase">penyulang</label>
		</div>
		<div class="col-md-10">
			<select class="form-control selectpicker" data-live-search="true" name="penyulang" required>
                <option disabled selected> -- Pilih Rayon -- </option>
                <?php foreach ($d_penyulang as $d): ?>
                    <option value="<?= $d->id_penyulang; ?>"><?= $d->nama_penyulang; ?></option>
                <?php endforeach; ?>
            </select>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<label class="text-uppercase">lokasi kerja</label>
		</div>
		<div class="col-md-10">
			<input type="text" class="form-control" name="lokasi" required>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-2">
			<label class="text-uppercase">deskripsi kerja</label>
		</div>
		<div class="col-md-10">
			<textarea class="form-control" rows="5" name="kerja" required></textarea>
		</div>
	</div>
</div>

<div class="well">
	<h3 class="text-uppercase text-center">aplikasi</h3><hr>
	<div class="row">
		<?php foreach ($d_aplikasi as $d): ?>
		<div class="col-md-3 text-capitalize">
			<div class="checkbox">
			<label><input type="checkbox" name="aplikasi[]" value="<?= $d->id_aplikasi; ?>"><?= $d->n_aplikasi; ?></label>
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
			<label><input type="checkbox" name="jPeralatan[]" value="<?= $d->id_jPeralatan; ?>"><?= $d->n_jPeralatan; ?></label>
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
			<label><input type="checkbox" name="bahaya[]" value="<?= $d->id_bahaya; ?>"><?= $d->n_bahaya; ?></label>
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
			<label><input type="checkbox" name="tPencegahan[]" value="<?= $d->id_tPencegahan; ?>"><?= $d->n_tPencegahan; ?></label>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>

<div class="well">
	<h3 class="text-uppercase text-center">tindakan keselamatan lain yang diperlukan</h3><hr>
  	<textarea class="form-control" rows="5" name="tindakan_keselamatan"></textarea>
</div>

<div class="well">

	<h3 class="text-uppercase text-center">alat perlindungan diri</h3><hr>
	<div class="row">
		<?php foreach ($d_apd as $d): ?>
		<div class="col-md-4 text-capitalize">
			<div class="checkbox">
			<label><input type="checkbox" name="apd[]" value="<?= $d->id_apd; ?>"><?= $d->n_apd; ?></label>
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
							<div class="input-group date form-group" data-date="" data-date-format="yyyy-mm-dd">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				                <input class="form-control" type="text" name="tgl_awal" readonly="readonly" required>
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
							<div class="input-group date form-group" data-date="" data-date-format="yyyy-mm-dd">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				                <input class="form-control" type="text" name="tgl_akhir" readonly="readonly" required>
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
			<p>(max 5MB, format JPG atau PNG)</p>
		</div>
		<div class="col-md-5">
			<input type="file" name="diagram" required />
		</div>
	</div>
</div> <!-- end well -->

<div class="well" >
	<h3 class="text-uppercase text-center">persetujuan penanggung jawab</h3><hr>

	<table>
	    <tbody>
	      <tr>
	        <td class="text-uppercase"><label class="text-uppercase">nama pengawas :</label></td>
	        <td><input class="form-control" type="text" name="pengawas[]" style="width: 300px;" required/></td>

	        <td class="text-uppercase"><label class="text-uppercase">nama kontraktor :</label></td>
	        <td><input class="form-control" type="text" name="kontraktor[]" style="width: 300px;" required/></td>
	      </tr>
	    </tbody>
	</table>
	  <p>
	  	<button type="button" class="btn btn-success text-capitalize add"><span class="glyphicon glyphicon-plus-sign"></span></button>
	  	<button type="button" class="btn btn-danger text-capitalize del"><span class="glyphicon glyphicon-minus-sign"></span></button>
	  </p>
</div>

<div class="well">
	<h3 class="text-uppercase text-center">petugas pelaksana</h3><hr>

	<table>
	    <tbody>
	      <tr>
	        <td class="text-uppercase"><label class="text-uppercase">nama petugas:</label></td>
	        <td><input class="form-control" type="text" name="pekerja[]" style="width: 500px;" required/></td>
	      </tr>
	    </tbody>
	</table>
	  <p>
	    <button type="button" class="btn btn-success text-capitalize add"><span class="glyphicon glyphicon-plus-sign"></span></button>
	  	<button type="button" class="btn btn-danger text-capitalize del"><span class="glyphicon glyphicon-minus-sign"></span></button>
	  </p>
</div> <!-- end well -->

<div class="well">
	<h3 class="text-uppercase text-center">peralatan yang perlu dibebaskan</h3><hr>

	<table>
	    <tbody>
	      <tr>
	        <td class="text-uppercase"><label class="text-uppercase">peralatan yang dibebaskan :</label></td>
	        <td>
	          <input class="form-control" type="text" name="peralatan[]" style="width: 300px;"/>
	        </td>
	        <td class="text-uppercase"><label class="text-uppercase">status :</label></td>
	        <td>
	          <input class="form-control" type="text" name="status[]" style="width: 300px;"/>
	        </td>
	      </tr>
	    </tbody>
  </table>
  <p>
    <button type="button" class="btn btn-success text-capitalize add"><span class="glyphicon glyphicon-plus-sign"></span></button>
	<button type="button" class="btn btn-danger text-capitalize del"><span class="glyphicon glyphicon-minus-sign"></span></button>
  </p>

	<div class="row">
		<div class="col-md-12">
			<label class=" control-label text-uppercase">catatan untuk peralatan yang perlu dibebaskan:</label>
  			<textarea class="form-control" rows="5" name="catatan"></textarea>
		</div>
	</div>
</div> <!-- end well -->
<!-- ========= END formulir PERMIT ================================= -->

<!-- ========= formulir JSA ================================= -->
	<h2 class="text-center text-uppercase">formulir job safety analysis (jsa)</h2>
	<hr>

	<div class="well">
		<h3 class="text-uppercase text-center">rincian pekerjaan</h3><hr>

		<table>
		    <tbody>
		      <tr>
		      	<td class="text-uppercase"><label class="text-uppercase">rincian pekerjaan :</label></td>
		        <td><input class="form-control" type="text" name="dPekerjaan[]" required style="width: 1000px;" required/></td>
		      </tr>
		    </tbody>
		</table>
		  <p>
		  	<button type="button" class="btn btn-success text-capitalize add"><span class="glyphicon glyphicon-plus-sign"></span></button>
	  		<button type="button" class="btn btn-danger text-capitalize del"><span class="glyphicon glyphicon-minus-sign"></span></button>
		  </p>

		<hr>
		<div class="row">
			<label class="text-uppercase">diperlukan pemadaman</label>
			<label class="radio-inline text-uppercase"><input type="radio" name="pemadaman" value="ya" required>ya</label>
			<label class="radio-inline text-uppercase"><input type="radio" name="pemadaman" value="tidak" required>tidak</label>
		</div>
	</div> <!-- end well -->

	<div class="well">
		<h3 class="text-uppercase text-center">peralatan kerja dan alat k2</h3><hr>

		<table>
		    <tbody>
		      <tr>
		      	<td class="text-uppercase"><label class="text-uppercase">peralatan kerja dan alat k2 :</label></td>
		        <td><input class="form-control" type="text" name="k2[]" required style="width: 950px;"/></td>
		      </tr>
		    </tbody>
		</table>
		  <p>
		  	<button type="button" class="btn btn-success text-capitalize add"><span class="glyphicon glyphicon-plus-sign"></span></button>
			<button type="button" class="btn btn-danger text-capitalize del"><span class="glyphicon glyphicon-minus-sign"></span></button>
		  </p>
	</div> <!-- end well -->

	<div class="well">
		<h3 class="text-uppercase text-center">langkah pengkerjaan</h3><hr>

		<table>
		    <tbody>
		      <tr>
		      	<td class="text-uppercase"><label class="text-uppercase">langkah kerja</label></td>
		        <td><input class="form-control" type="text" name="lKerja[]" required style="width: 300px;" /></td>
		        <td class="text-uppercase"><label class="text-uppercase">potensi bahaya</label></td>
	        	<td><input class="form-control" type="text" name="pBahaya[]" required style="width: 150px;"/></td>
	        	<td class="text-uppercase"><label class="text-uppercase">apd yang digunakan</label></td>
	        	<td><input class="form-control" type="text" name="apd_k[]" required style="width: 150px;"/></td>
	        	<td class="text-uppercase"><label class="text-uppercase">rekomendasi prosedur kerja</label></td>
	        	<td><input class="form-control" type="text" name="pRekomendasi[]" required style="width: 200px;"/></td>
		      </tr>
		    </tbody>
		</table>
		  <p>
		  	<button type="button" class="btn btn-success text-capitalize add"><span class="glyphicon glyphicon-plus-sign"></span></button>
	  		<button type="button" class="btn btn-danger text-capitalize del"><span class="glyphicon glyphicon-minus-sign"></span></button>
		  </p>
	</div> <!-- end well -->
<!-- ========= END formulir JSA ================================= -->
<div class="row action">
	<div class="col-md-6">
		<input type="submit" value="tambahkan" class="btn btn-primary btn-block text-uppercase btn-sub" name="tambah"></input>
	</div>
	<div class="col-md-6">
		<a class="btn btn-warning btn-block text-uppercase" href = "javascript:history.back()">Kembali</a>
	</div>
</div>
<?= form_close(); ?>

</div>

<!-- <script language="javascript">
	function validate()
	{
	var aplikasi = document.getElementsByName('aplikasi[]');
	var jPeralatan = document.getElementsByName('jPeralatan[]');
	var bahaya = document.getElementsByName('bahaya[]');
	var tPencegahan = document.getElementsByName('tPencegahan[]');
	var apd = document.getElementsByName('apd[]');

	var hasChecked = false;

	for (var i = 0; i < aplikasi.length; i++)
	{
		if (aplikasi[i].checked)
		{
		hasChecked = true;
		break;
		}
	}

	for (var i = 0; i < jPeralatan.length; i++)
	{
		if (jPeralatan[i].checked)
		{
		hasChecked = true;
		break;
		}
	}

	for (var i = 0; i < bahaya.length; i++)
	{
		if (bahaya[i].checked)
		{
		hasChecked = true;
		break;
		}
	}

	for (var i = 0; i < tPencegahan.length; i++)
	{
		if (tPencegahan[i].checked)
		{
		hasChecked = true;
		break;
		}
	}

	for (var i = 0; i < apd.length; i++)
	{
		if (apd[i].checked)
		{
		hasChecked = true;
		break;
		}
	}

	if (hasChecked == false)
		{
		alert("checkbox tidak boleh kosong!");
		return false;
		}

	}
</script> -->