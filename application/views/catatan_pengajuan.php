<div class="container">
	<div class="">
		<h2 class="text-center text-uppercase">catatan pengajuan</h2>
    	<hr>

    	<?= form_open('approval/catatan_pengajuan'); ?>
    	<div class="form-group">
		  <label class="text-capitalize">catatan :</label>
		  <textarea class="form-control" rows="5" name="catatan" required></textarea>
		</div>

		<input type="hidden" name="id_pengajuan" value="<?= base64_encode($id_pengajuan); ?>">
		<input type="submit" value="simpan" class="btn btn-primary text-capitalize" name="simpan" style="margin-top: 20px;"></input>
		<?= form_close(); ?>
	</div>
</div>