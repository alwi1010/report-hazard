<!DOCTYPE html>
<html lang="id">
	<head>
		<title>SIPAPERDONE - Bandara Internasional I GUSTI NGURAH RAI BALI</title>
		<meta charset="utf-8">
		<meta name="Description" content="LAPOR HAZARD">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	  <link rel="preload"  href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" as="style" onload="this.onload=null;this.rel='stylesheet'">
	  <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"></noscript>

		<script type="text/javascript">
			function validateForm() {
				var x = document.forms["myForm"]["area"].value;
				var y = document.forms["myForm"]["lotproblem"].value;
				if (x==="") {
					alert("Area Belum Dipilih!!! Silahkan Memilih Area Terlebih Dahulu. Terima Kasih.");
					return false;
				}
				if (y==="") {
					alert("Lokasi Belum Dipilih!!! Silahkan Memilih Lokasi Terlebih Dahulu. Terima Kasih.");
					return false;
				}
			}
		</script>
	</head>
	<body>
		<div class="w3-bar w3-border-bottom w3-xlarge" style="background-color: rgba(0, 155, 224, 0.6);">
			<img src="<?php echo base_url() ?>asset/images/logo_jadi.webp" class="img-fluid d-block" width="275" height="50" alt="Responsive image">
		</div>

		<div class="container">
			<div class="card" style="margin: 37px 0; background-color: #EDEDED">
  			<div class="card-body">
  				<center style="margin-bottom: 20px;"><h5>SISTEM PELAPORAN HAZARD ONLINE</h5></center>
					<form class="needs-validation" novalidate method="post" name="myForm" action="<?php echo base_url(). 'report-hazard'; ?>" enctype="multipart/form-data">
					  <div class="form-row">
					    <div class="col-md-6 mb-3">
					      <label for="nreporter"><b>Nama Lengkap</b></label>
					      <input type="text" name="namereporter" class="form-control" id=" nreporter" placeholder="Silahkan Masukkan Nama Anda" accesskey="n">
					    </div>
					    <div class="col-md-6 mb-3">
					      <label for="ereporter"><b>Email <span style="color: #FF0000;">*</span></b></label>
					      <input type="email" class="form-control" id="ereporter" placeholder="Silahkan Masukkan Email Anda" name="emailpelapor" required="" accesskey="e">
					      <div class="invalid-feedback">
					      	Silahkan Isi Email Anda Terlebih Dahulu
					      </div>
					    </div>
					  </div>
					  <div class="form-row">
					    <div class="col-md-6 mb-3">
					      <label for="harea"><b>Area <span style="color: #FF0000;">*</span></b></label>
						    <select class="custom-select" name="hazardarea" required="" id="harea" accesskey="a" required="">
									<option disabled="" selected="" value="">- Pilih Area Hazard -</option>
									<?php
										foreach ($dropdown as $baris) {
											echo "<option value='".$baris->IdArea."'>".$baris->NamaArea."</option>";
										}
									?>
						    </select>
						    <div class="invalid-feedback">
						    	Silahkan Pilih Area Terjadinya Hazard Terlebih Dahulu
						    </div>
					    </div>
					    <div class="col-md-6 mb-3" id="location">
								<label for="hlocation"><b>Lokasi <span style="color: #FF0000;">*</span></b></label>
								<select required="" class="custom-select" name="hazardlocation" id="hlocation" accesskey="l" required="" disabled=""></select>
								<div class="invalid-feedback">
									Silahkan Pilih Lokasi Terjadinya Hazard Terlebih Dahulu
								</div>
					    </div>
					  </div>
					  <div class="form-row">
					    <div class="col-md-6 mb-3">
					      <label for="niu"><b>Nama Instansi / Unit <span style="color: #FF0000;">*</span></b></label>
					      <input type="text" class="form-control" id="niu" placeholder="Silahkan Masukkan Nama Instansi / Unit Anda" name="nameunit" required="" accesskey="u">
					      <div class="invalid-feedback">
					      	Silahkan Isi Nama Instansi / Unit Anda Terlebih Dahulu
					      </div>
					    </div>
					    <div class="col-md-6 mb-3">
					      <label for="nameins"><b>Foto Hazard <span style="color: #FF0000;">*</span></b></label>
					    	<div class="custom-file">
							    <input type="file" class="custom-file-input" name="photohazard" id="phazard" accept="image/jpeg,image/png" required="" accesskey="f">
							    <label class="custom-file-label" for="phazard">Pilih Foto Hazard...</label>
								  <div class="invalid-feedback">
								  	Silahkan Pilih Foto Dari Hazard Yang Anda Temukan Terlebih Dahulu
								  </div>
							  </div>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="dhazard"><b>Detail Hazard <span style="color: #FF0000;">*</span></b></label>
					    <textarea value="" class="form-control" id="dhazard" rows="5" placeholder="Silahkan Masukkan Detail Hazard Yang Anda Temukan" name="detailhazard" accesskey="d" required=""></textarea>
						  <div class="invalid-feedback">
						  	Silahkan Jabarkan Secara Detail Dari Hazard Yang Anda Temukan Terlebih Dahulu
						  </div>
					  </div>
					  <button type="submit" class="btn btn-danger btn-lg btn-block" accesskey="r">Laporkan Hazard</button>
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

			$(document).ready(function() {
				$('#harea').on('change', function() {
					var IdArea = $('#harea').val();
					$.ajax({
						type:'POST',
						url: '<?php echo base_url('show-data-dropdown') ?>',
						data: { 'id' : IdArea },
						success: function(data) {
							$("#hlocation").html(data);
							$("#hlocation").removeAttr('disabled');
						}
					})
				})
			});

			// Add the following code if you want the name of the file appear on select
			$(".custom-file-input").on("change", function() {
			  var fileName = $(this).val().split("\\").pop();
			  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
			});
		</script>
	</body>
</html>