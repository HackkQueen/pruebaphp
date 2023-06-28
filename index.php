<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/main.js" async></script>
	<script src="uploads/app.php" defer type="module"></script>
	<title>AdminSite</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i> Hospital</a>
		<ul class="side-menu">
			<li><a href="#" class="active"><i class='bx bxs-dashboard icon' ></i> Eps</a></li>
			<li><a data-value="my-staff"><i class='bx bxs-chart icon' ></i> Ciudad</a></li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
			<form action="#"></form>
				<span class="divider"></span>
				<div class="profile">
					<img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
					<ul class="profile-link">
						<li><a href="#"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
						<li><a href="#"><i class='bx bxs-cog' ></i> Settings</a></li>
						<li><a href="#"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
					</ul>
				</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Eps</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Eps</a></li>
			</ul>
			
			<div class="data">
				<div id="vista" class="content-data">
					<div class="container-fluid row">
						<form>
							<h3 class="text-center text-secondary">Registro Eps</h3>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">IdEps</label>
								<input type="text" class="form-control" name="ideps">
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Nombre de la Eps</label>
								<input type="text" class="form-control" name="nomEps">
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Direccion de la Eps</label>
								<input type="text" class="form-control" name="dirEps">
							</div>
							<button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Guardar</button>
						</form>
						<div class="col-8 p-4">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">IdEps</th>
										<th scope="col">Nombre Eps</th>
										<th scope="col">Direccion Eps</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
									<?php
										include "scripts/db/connect.php";
										$sql = $connect->query("SELECT * FROM eps");
										while ($datos = $sql->fetch_object()) {
									?>
										<tr>
											<th scope="row"><?php echo $datos->IdEps; ?></th>
											<td><?php echo $datos->NombreEps; ?></td>
											<td><?php echo $datos->DireccionEps; ?></td>
											<td>
												<a href="" class="btn btn-swall btn-warning">editar</a>
												<a href="" class="btn btn-swall btn-danger">eliminar</a>
											</td>
										</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->
</body>
</html>