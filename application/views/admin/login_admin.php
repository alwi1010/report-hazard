<!DOCTYPE html>
<html lang="id">
	<head>
		<title>SIPAPERDONE - Bandara Internasional I GUSTI NGURAH RAI BALI</title>
		<meta charset="utf-8">
		<meta name="Description" content="LAPOR HAZARD">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	  <link rel="preload"  href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" as="style" onload="this.onload=null;this.rel='stylesheet'">
	  <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"></noscript>
	</head>
	<body>
		<div class="w3-bar w3-border-bottom w3-xlarge" style="background-color: rgba(0, 155, 224, 0.6);">
			<img src="<?php echo base_url() ?>asset/images/logo_jadi.webp" class="img-fluid d-block" width="275" height="50" alt="Responsive image">
		</div>

		<div class="container" style="width: 50%;">
			<div class="card" style="margin: 22.2% 0; background-color: #EDEDED;">
  			<div class="card-body">
  				<center style="margin-bottom: 25px;"><h5>SISTEM PELAPORAN HAZARD ONLINE</h5></center>
					<form class="needs-validation" novalidate method="post" name="myForm" action="<?php echo base_url(). 'employee2/report_hazard'; ?>" enctype="multipart/form-data">
					  <div class="form-group" style="margin-bottom: 25px;">
					    <label for="iea">Email address</label>
					    <input type="email" class="form-control" id="iea" placeholder="Silahkan Masukkan Email Anda" name="emailadmin" required="" accesskey="e">
				      <div class="invalid-feedback">
				      	Silahkan Masukkan Email Anda Terlebih Dahulu
				      </div>
					  </div>
					  <div class="form-group" style="margin-bottom: 25px;">
					    <label for="ipa">Password</label>
					    <input type="password" class="form-control" id="ipa" placeholder="Silahkan Masukkan Password Anda" name="passadmin" required="" accesskey="p">
				      <div class="invalid-feedback">
				      	Silahkan Masukkan Password Anda Terlebih Dahulu
				      </div>
					  </div>
					  <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
					</form>
				</div>
			</div>
		</div>

	  <div class="card-footer" style="background-color: green; color: white; text-align: center;">
	    &copy; 2019 All Rights Reserved.
	  </div>

 		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

		<script type="text/javascript">
			// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function() {
			  'use strict';
			  window.addEventListener('load', function() {
			    // Fetch all the forms we want to apply custom Bootstrap validation styles to
			    var forms = document.getElementsByClassName('needs-validation');
			    // Loop over them and prevent submission
			    var validation = Array.prototype.filter.call(forms, function(form) {
			      form.addEventListener('submit', function(event) {
			        if (form.checkValidity() === false) {
			          event.preventDefault();
			          event.stopPropagation();
			        }
			        form.classList.add('was-validated');
			      }, false);
			    });
			  }, false);
			})();
		</script>
	</body>
</html>