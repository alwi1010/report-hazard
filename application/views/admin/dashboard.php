<?php $idAdmin = $this->session->userdata('idadmin'); ?>
<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view("admin/_admin/head.php"); ?>
	<title><?php echo SITE_NAME .": ". ucfirst($this->uri->segment(1)) ." - Dashboard"?></title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<!-- Start Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Start Left Navbar Links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="nav-link" data-widget="pushmenu"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?php echo base_url('admin') ?>" class="nav-link"><i></i>Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block"></li>
			</ul>
			<!-- End Left Navbar Links -->

			<!-- Start Right Navbar Links -->
			<ul class="navbar-nav ml-auto">
				<!-- Start Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="">
						<i class="far fa-user-circle"></i>
						<?php echo $this->session->userdata('username'); ?>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="<?php echo base_url('profil-admin/') ?>" class="dropdown-item">
							<!-- Start Message -->
							<div class="media">
								<div class="media-body">
									<p class="text-sm" style="margin: 10px 0px;">Profil</p>
								</div>
							</div>
							<!-- End Message -->
						</a>
						<a href="<?php echo base_url('admin-help/') ?>" class="dropdown-item">
							<!-- Start Message -->
							<div class="media">
								<div class="media-body">
									<p class="text-sm" style="margin: 10px 0px;">Help</p>
								</div>
							</div>
							<!-- End Message -->
						</a>
						<a href="<?php echo base_url('admin-logout/') ?>" class="dropdown-item">
							<!-- Start Message -->
							<div class="media">
								<div class="media-body">
									<p class="text-sm" style="margin: 10px 0px;">Logout</p>
								</div>
							</div>
							<!-- End Message -->
						</a>
					</div>
				</li>
				<!-- End Dropdown Menu -->
			</ul>
			<!-- End Right Navbar Links -->
		</nav>
		<!-- End Navbar -->

		<!-- Start Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Start Brand Logo -->
			<a href="<?php echo base_url('admin/'); ?>" class="brand-link">
				<img src="<?php echo base_url('asset/images/logo.png') ?>" style="margin-left: 0px;" alt="Angkasa Pura 1" class="brand-image">
				<span class="brand-text font-weight-light">SIPAPERDONE</span>
			</a>
			<!-- End Brand Logo -->

			<!-- Start Sidebar -->
			<div class="sidebar">
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Start Add Icon To The Links Using The .nav-icon Class With font-awesome Or Any Other Icon Font Library -->
						<li class="nav-item">
							<a href="<?php echo base_url('admin/') ?>" class="nav-link active">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<li class="nav-item has-treeview">
							<a href="" class="nav-link">
								<i class="nav-icon far fa-copy"></i>
								<p>
									Laporan
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?php echo base_url('laporan-masuk-admin') ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Laporan Masuk</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url('laporan-tertunda-admin') ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Laporan Tertunda</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url('laporan-tertunda-admin') ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Laporan Dikerjakan</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url('laporan-tertunda-admin') ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Data Request</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url('laporan-tertunda-admin') ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Laporan Selesai</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url('laporan-tertunda-admin') ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Histori Laporan</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('data-lokasi') ?>" class="nav-link">
								<i class="nav-icon fas fa-map-marker-alt"></i>
								<p>
									Data Lokasi
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('data-unit-st') ?>" class="nav-link">
								<i class="nav-icon fas fa-user"></i>
								<p>
									Data Unit ST
								</p>
							</a>
						</li>
						<!-- End Add Icon To The Links Using The .nav-icon Class With font-awesome Or Any Other Icon Font Library -->
					</ul>
				</nav>
			</div>
			<!-- End Sidebar -->
		</aside>
		<!-- End Main Sidebar Container -->

		<!-- Start Content Wrapper -->
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<!-- NEW LINE CHART -->
					<div class="card card-info">
						<div class="card-header">
							<span class="card-title" style="font-size: 25px;">Line Chart</span>

							<div class="card-tools">
								<select class="form-control" id="periodedata">
									<option value="mingguini">Minggu Ini</option>
									<option value="minggulalu">Minggu Lalu</option>
									<option selected="" value="bulanini">Bulan Ini</option>
									<option value="bulanlalu">Bulan Lalu</option>
									<option value="tahunini">Tahun Ini</option>
								</select>
							</div>
						</div>
						<div class="card-body" id="mingguIni" style="display: none;">
							<div class="chart" id="chart">
								<canvas class='my-4 w-100' id='chartMingguIni' width='1100' height='380'></canvas>
							</div>
						</div>
						<div class="card-body" id="mingguLalu" style="display: none;">
							<div class="chart" id="chart">
								<canvas class='my-4 w-100' id='chartMingguLalu' width='1100' height='380'></canvas>
							</div>
						</div>
						<div class="card-body" id="bulanIni" style="display: block;">
							<div class="chart" id="chart">
								<canvas class='my-4 w-100' id='chartBulanIni' width='1100' height='380'></canvas>
							</div>
						</div>
						<div class="card-body" id="bulanLalu" style="display: none;">
							<div class="chart" id="chart">
								<canvas class='my-4 w-100' id='chartBulanLalu' width='1100' height='380'></canvas>
							</div>
						</div>
						<div class="card-body" id="tahunIni" style="display: none;">
							<div class="chart" id="chart">
								<canvas class='my-4 w-100' id='chartTahunIni' width='1100' height='380'></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- End Content Wrapper -->

		<?php $this->load->view("admin/_admin/footer.php") ?>
	</div>

	<?php $this->load->view("admin/_admin/js.php") ?>

	<!-- Change Chart -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#periodedata').on('change', function() {
				var idArea = $('#periodedata').val();
				if (idArea == "mingguini") {
					document.getElementById("mingguIni").style.display = "block";
					document.getElementById("mingguLalu").style.display = "none";
					document.getElementById("bulanIni").style.display = "none";
					document.getElementById("bulanLalu").style.display = "none";
					document.getElementById("tahunIni").style.display = "none";
					document.getElementById("periode").style.display = "block";
				} else if (idArea == "minggulalu") {
					document.getElementById("mingguIni").style.display = "none";
					document.getElementById("mingguLalu").style.display = "block";
					document.getElementById("bulanIni").style.display = "none";
					document.getElementById("bulanLalu").style.display = "none";
					document.getElementById("tahunIni").style.display = "none";
					document.getElementById("periode").style.display = "block";
				} else if (idArea == "bulanini") {
					document.getElementById("mingguIni").style.display = "none";
					document.getElementById("mingguLalu").style.display = "none";
					document.getElementById("bulanIni").style.display = "block";
					document.getElementById("bulanLalu").style.display = "none";
					document.getElementById("tahunIni").style.display = "none";
					document.getElementById("periode").style.display = "block";
				} else if (idArea == "bulanlalu") {
					document.getElementById("mingguIni").style.display = "none";
					document.getElementById("mingguLalu").style.display = "none";
					document.getElementById("bulanIni").style.display = "none";
					document.getElementById("bulanLalu").style.display = "block";
					document.getElementById("tahunIni").style.display = "none";
					document.getElementById("periode").style.display = "block";
				} else if (idArea == "tahunini") {
					document.getElementById("mingguIni").style.display = "none";
					document.getElementById("mingguLalu").style.display = "none";
					document.getElementById("bulanIni").style.display = "none";
					document.getElementById("bulanLalu").style.display = "none";
					document.getElementById("tahunIni").style.display = "block";
					document.getElementById("periode").style.display = "block";
				} else {

				}
			})
		});
	</script>
	<?php $this->load->view("admin/_admin/chart.php") ?>
	</body>
</html>