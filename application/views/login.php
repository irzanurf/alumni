<!doctype html>
<html lang="en">
  <head>
  	<title>Alumni Undip</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?= base_url('assets/login/css/style.css') ?>">

    <style>
        .form-control{
            color:black !important;
        }
        .form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: gray !important;
            opacity: 1; /* Firefox */
        }

        .form-control:-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: gray !important;
        }

        .form-control::-ms-input-placeholder { /* Microsoft Edge */
            color: gray !important;
        }

        
    </style>

	</head>
	<body class="img js-fullheight" style="background-image: url(<?= base_url('assets/login/images/bg.jpg') ?>);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
                    <img src="<?= base_url('assets/login/images/logo.png');?>" alt="logo"/>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
                    <form method="POST" action="<?php base_url('Welcome') ?>" >
                                 <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="username" placeholder="Username" style="background: white; color: black" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" name="password" class="form-control" style="background: white; color: black" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn submit px-3" style="background: #4055CC; color: white !important">Sign In</button>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?= base_url('assets/login/js/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/login/js/popper.js') ?>"></script>
  <script src="<?= base_url('assets/login/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/login/js/main.js') ?>"></script>

	</body>
</html>

