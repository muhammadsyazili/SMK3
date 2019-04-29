<style type="text/css">
	h3{
		font-family: arial black, arial;
	}
	.login{
		margin: 100px auto 0;
	}
	.login .login-header{
	}
	.login .login-content .login-field{
		padding-bottom: 10px;
	}
	.login .login-content h2{
		font-family: arial black, arial;
		font-size: 50px;
	}
</style>

<style type="text/css">
	body{
		background-image: url(<?= base_url('assets/img/bg_pln.jpg'); ?>);
		background-repeat: no-repeat;
		background-position: top center;
	}
</style>
<div class="container">
	<?php
		$msg = $this->session->flashdata('msg');
		if(isset($msg)){
			echo $msg;
		}
	?>
	<div class="login">
	<div class="row">
		<div class="col-md-6 login-content" style="background-color: rgba(0,0,0,0.5); border-radius: 10px;">
			<h2 class="text-capitalize" style="color: #FFF;"><span class="glyphicon glyphicon-log-in"></span> login</h2>
			<hr>

			<?= form_open('masuk'); ?>
			<div class="input-group login-field">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			    <input type="text" class="form-control" name="username" placeholder="Username">
			</div>
			<div class="input-group login-field">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			    <input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<input type="submit" value="login" class="btn btn-warning btn-block text-capitalize" name="masuk" style="margin-bottom: 20px; margin-top: 20px;"></input>
			<?= form_close();?>
		</div>
	</div>
	</div>
</div>