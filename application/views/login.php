<style type="text/css">
	.wrapper{
		margin-top: 120px;
	}
	.part-left{
		font-family: arial;
	}
	.part-left img{
		height: 150px;
	}
	.part-left h1{
		font-size: 25px;
		font-weight: bold;
	}
	.part-right h2{
		font-weight: bold;
	}
	.part-right .login-field{
		margin-bottom: 10px;
	}
</style>
<div class="container">
	<?php
		$msg = $this->session->flashdata('msg');
		if(isset($msg)){
			echo $msg;
		}
	?>
	<div class="wrapper">
		<div class="row">
			<div class="col-md-6 text-uppercase text-center part-left">
				<center><img src="<?= base_url('assets/img/smk3.jpg'); ?>" class="img-responsive"></center>
				<h1>sistem informasi manajemen k3</h1>
				<p>PT.PLN (persero) WS2JB Area Palembang</p>
			</div>
			<div class="col-md-6 part-right">
				<h2 class="text-capitalize"><span class="glyphicon glyphicon-log-in"></span> login</h2>
				<hr>

				<?= form_open('login'); ?>
				<div class="input-group login-field">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				    <input type="text" class="form-control" name="username" placeholder="Username" required>
				</div>
				<div class="input-group login-field">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				    <input type="password" class="form-control" name="password" placeholder="Password" required>
				</div>
				<input type="submit" value="login" class="btn btn-warning btn-block text-capitalize login-button" name="login_btn"></input>
				<?= form_close();?>
			</div>
		</div>
	</div>
</div>