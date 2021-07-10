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
								<a href="<?php echo base_url('admin/') ?>" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>
							<li class="nav-item has-treeview menu-open">
								<a href="" class="nav-link active">
									<i class="nav-icon far fa-copy"></i>
									<p>
										Laporan
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?php echo base_url('admin-data-in') ?>" class="nav-link active">
											<i class="far fa-circle nav-icon"></i>
											<p>Laporan Masuk</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo base_url('admin-data-pending') ?>" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Laporan Tertunda</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo base_url('admin-progress-data') ?>" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Laporan Dikerjakan</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo base_url('admin-data-request') ?>" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Data Request</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo base_url('admin-data-complete') ?>" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Laporan Selesai</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo base_url('admin-history-data') ?>" class="nav-link">
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
				<!-- Content Header (Page header) -->
				<div class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1 class="m-0 text-dark">Admin : Data Hazard Masuk</h1>
							</div><!-- /.col -->
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Home</a></li>
									<li class="breadcrumb-item active">Data Hazard Masuk</li>
								</ol>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.container-fluid -->
				</div>
				<!-- /.content-header -->

				<!-- Main content -->
				<section class="content">
					Ini Tabel Untuk Data Laporan Hazard Yang Masuk
				</section>
				<!-- /.content -->
			</div>
			<!-- End Content Wrapper -->

			<?php $this->load->view("admin/_admin/footer.php") ?>
		</div>

		<?php $this->load->view("admin/_admin/js.php") ?>
	</body>
</html>