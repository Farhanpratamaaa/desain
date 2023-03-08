<!DOCTYPE html>
<html lang="en">
<style>
	
      .container {text-align: center;
		position: absolute;
  top: 29%;
  width: 50%;
  left: 250px;
  font-size: 18px;
}

img { 
  width: 104%;
  height: 640px;
  opacity: 0.5;
  left: 400px;
}
.login h1 {text-align: center;
  height: 1000%;
  width: 300%;
  left: 110px;
  font-size: 50px;
}
	  
      
   </style>
<head>
	<?php $this->load->view('backend/_partials/header'); ?>
</head>

<body>
	
	<div class="img">
		<img src="<?= base_url ('assets/img/motor55.jpeg')?>" width="1000" height="300">
		<!-- <h1 class="login">Login</h1> -->
		<div class="container" class="">
		<!-- <p>Masuk ke Dashboard Admin/Petugas</p> -->

		<?php if($this->session->flashdata('message_login_error')): ?>
			<div class="invalid-feedback">
					<?= $this->session->flashdata('message_login_error') ?>
			</div>
		<?php endif ?>

		<form class="container btn btn-outline-secondary"  action="" method="post" style="max-width: 300px; ">
			<div>
				<h1>Login</h1>
				<label for="name">Email/Username</label>
				<input type="text" name="username" class="<?= form_error('username') ? 'invalid' : '' ?>"
					placeholder="Your username or email" value="<?= set_value('username') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('username') ?>
				</div>
			</div>
			<div>
				<label for="password">Password</label>
				<input type="password" name="password" class="<?= form_error('password') ? 'invalid' : '' ?>"
					placeholder="Enter your password" value="<?= set_value('password') ?>" required />
				<div class="invalid-feedback">
					<?= form_error('password') ?>
				</div>
			</div>

			<div>
				<input type="submit" class="button button-primary" value="Login">
			</div>
		</form>
	</div>
	<?php $this->load->view('backend/_partials/footer'); ?>
</div>
</body>

</html>