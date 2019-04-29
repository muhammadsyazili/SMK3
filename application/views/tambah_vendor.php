<div class="container">

	<h2 class="text-center text-uppercase">input nama vendor</h2>
	<hr>
	<?= form_open('vendor'); ?>
		<div class="row">
			<div class="col-md-2">
				<p class="text-capitalize text-right">nama vendor:</p>
			</div>
			<div class="col-md-10">
				<input class="form-control" type="text" name="nama_vendor" required>
			</div>
		</div>
		
		<input type="submit" value="simpan" class="btn btn-primary text-capitalize" name="simpan" style="margin-top: 20px;"></input>
	<?= form_close(); ?>
</div>