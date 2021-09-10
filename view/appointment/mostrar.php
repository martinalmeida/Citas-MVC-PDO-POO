<?php
// Se prendio esta mrd :v
session_start();

// Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1) {
	/*
      Para redireccionar en php se utiliza header,
      pero al ser datos enviados por cabereza debe ejecutarse
      antes de mostrar cualquier informacion en el DOM es por eso que inserto este
      codigo antes de la estructura del html, espero haber sido claro
    */
	header('location: ../login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Citas médicas</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['../assets/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>

<body>

	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">

				<a href="../view/admin/admin.php" class="logo">
					<h2 class="text-white navbar-brand">Andrea Palencia</h2>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

				<div class="container-fluid">

					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../assets/img/mujer.png" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../assets/img/mujer.png" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?php echo ucfirst($_SESSION['nombre']); ?></h4>
												<p class="text-muted">Administradora</p>
											</div>
										</div>
									</li>
									<li>
										<a class="dropdown-item" href="../controller/cerrarSesion.php">CERRAR SESIÓN</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">

					<ul class="nav nav-primary">
						<li class="nav-item">

							<a href="../view/admin/admin.php" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Inicio</p>
							</a>

						</li>
						<li class="nav-item active">
							<a href="../folder/appointment.php">
								<i class="fas fa-layer-group"></i>
								<p>Citas</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="../folder/customers.php">
								<i class="fas fa-male"></i>
								<p>Pacientes</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="../folder/doctor.php">
								<i class="fas fa-user-md"></i>
								<p>Médicos</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="specialty.php">
								<i class="fas fa-table"></i>
								<p>Áreas médicas</p>
							</a>
						</li>


					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Citas</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="../view/admin/admin.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>


							<li class="nav-item">
								<a href="#">Mostrar</a>
							</li>
						</ul>
					</div>
					<div class="row">

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Mostrar</h4>

										<a href="#addRowModal" class="btn btn-primary btn-round ml-auto" data-toggle="modal">Nuevo</a>
										<?php include('AgregarModal.php'); ?>
									</div>
									<div class="card-body">


										<div class="table-responsive">
											<table id="add-row" class="display table table-striped table-hover">
												<thead>
													<tr>
														<th>#</th>
														<th>Fecha</th>
														<th>Hora</th>
														<th>Paciente</th>
														<th>Médico</th>
														<th>Consultorio</th>
														<th>Estado</th>

														<th style="width: 2%">Acción</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>#</th>
														<th>Fecha</th>
														<th>Hora</th>
														<th>Paciente</th>
														<th>Médico</th>
														<th>Consultorio</th>
														<th>Estado</th>
														<th>Acción</th>
													</tr>
												</tfoot>


												<tbody>
													<?php
													foreach ($dato as $key => $value) {
														foreach ($value as $va) { ?>
															<tr>
																<td><?php echo $va['codcit']; ?></td>
																<td><?php echo $va['dates']; ?></td>
																<td><?php echo $va['hour']; ?></td>
																<td><?php echo $va['nombrep']; ?></td>
																<td><?php echo $va['nomdoc']; ?></td>
																<td><?php echo $va['nombrees']; ?></td>


																<td>
																	<?php if ($va['estado'] == 1) { ?>
																		<form method="get" action="javascript:activo('<?php echo $va['codcit']; ?>')">
																			<button type="submit" class="btn btn-success">Atendido</button>
																		</form>
																	<?php  } else { ?>

																		<form method="get" action="javascript:inactivo('<?php echo $va['codcit']; ?>')">
																			<button type="submit" class="btn btn-danger btn-xs">Pendiente</button>
																		</form>
																	<?php  } ?>
																</td>




																<td>
																	<div class="form-button-action">


																		<button href="#deleteRowModal=<?php echo $va['codcit']; ?>" class="btn btn-link btn-danger btn-lg" data-toggle="modal" title="" data-original-title="Delete Task" data-target="#deleteRowModal<?php echo $va['codcit']; ?>">
																			<i class="fa fa-trash"></i>

																		</button>

																	</div>
																</td>

																<?php include('editar.php'); ?>

															</tr>
													<?php
														}
													}
													?>
												</tbody>



											</table>
										</div>


									</div>
								</div>


							</div>
						</div>
					</div>

				</div>
			</div>

		</div>

	</div>
	<!--   Core JS Files   -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="../assets/js/functions4.js"></script>
	<script src="../assets/js/functions5.js"></script>
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo2.js"></script>
	<script>
		$(document).ready(function() {
			$('#basic-datatables').DataTable({});

			$('#multi-filter-select').DataTable({
				"pageLength": 5,
				initComplete: function() {
					this.api().columns().every(function() {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
							.appendTo($(column.footer()).empty())
							.on('change', function() {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);

								column
									.search(val ? '^' + val + '$' : '', true, false)
									.draw();
							});

						column.data().unique().sort().each(function(d, j) {
							select.append('<option value="' + d + '">' + d + '</option>')
						});
					});
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
				]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>

	<script>
		function activo(codcit) {
			var id = codcit;
			$.ajax({
				type: "GET",
				url: "../assets/ajax/editar_estado_activo_cita.php?id=" + id,
			}).done(function(data) {
				window.location.href = '../folder/appointment.php';
			})

		}

		// Editar estado inactivo
		function inactivo(codcit) {
			var id = codcit;
			$.ajax({
				type: "GET",
				url: "../assets/ajax/editar_estado_inactivo_cita.php?id=" + id,
			}).done(function(data) {
				window.location.href = '../folder/appointment.php';
			})
		}
	</script>
</body>

</html>