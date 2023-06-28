<?php

    function guardar() {
            $data = [
				"idCamper" => $_POST['idCamper'],
                "nomCamper" => $_POST['nomCamper'],
                "apCamper"=> $_POST['apCamper'],
                "fechaNac"=> $_POST['fechaNac'],
				"idReg"=> $_POST['idReg']
            ];
        $credenciales["http"]["method"] = "POST";
        $credenciales["http"]["header"] = "Content-type: application/json";
        $data = json_encode($data);
        $credenciales["http"]["content"] = $data;
        $config = stream_context_create($credenciales);
        $_DATA = file_get_contents("index.php", false, $config);

    }

    function eliminarDatos() {
        if (!isset($_POST['idCamper'])) {
            echo "No se ha ingresado una cedula";
            return;
        }
        $cedula = $_POST['idCamper'];
        $data = file_get_contents('index.php');
        $data = json_decode($data, true);
        $id = null;
        foreach ($data as $key => $value) {
            if ($value['idCamper'] == $idCamper) {
                $id = $value['id'];
                break;
            }
        }
        $credenciales["http"]["method"] = "DELETE";
        $credenciales["http"]["header"] = "Content-type: application/json";
        $config = stream_context_create($credenciales);
        $url = "index.php/$id";
        $resultado = file_get_contents($url, false, $config);
    }

    function editarDatos(){
        $dataC = [
            "idCamper" => $_POST['idCamper'],
            "nomCamper" => $_POST['nomCamper'],
            "apCamper"=> $_POST['apCamper'],
            "fechaNac"=> $_POST['fechaNac'],
			"idReg"=> $_POST['idReg']
        ];
        $idCamper = $_POST['idCamper'];
        $data = json_encode($data);
        $data = file_get_contents('uploads/app.php');
        $data = json_decode($data, true);
        $id = null;
        foreach ($data as $key => $value) {
            if ($value['idCamper'] == $idCamper) {
                $id = $value['id'];
                break;
            }
        }
        $dataC = json_encode($dataC);
        $credenciales["http"]["method"] = "PUT";
        $credenciales["http"]["header"] = "Content-type: application/json";
        $credenciales["http"]["content"] = $dataC;
        $config = stream_context_create($credenciales);
        $url = "index.php/$id";
        $resultado = file_get_contents($url, false, $config);
    }

    session_start();
    if (isset($_POST['enviar'])) {
        guardar();
        session_unset();
        header("Location: index.php");
        exit();
    } elseif (isset($_POST['editar'])) {
        editarDatos();
        session_unset();
        header("Location: index.php");
        exit();
    } elseif (isset($_POST['eliminar'])) {
        eliminarDatos();
        session_unset();
        header("Location: index.php");
        exit();
    }

    global $dataCookie;
    $dataCookie = [
		"idCamper" => isset($_SESSION['idCamper']) ? $_SESSION['idCamper'] : '',
        "nomCamper" => isset($_SESSION['nomCamper']) ? $_SESSION['nomCamper'] : '',
        "apCamper"=> isset($_SESSION['apCamper']) ? $_SESSION['apCamper'] : '',
        "fechaNac"=> isset($_SESSION['fechaNac']) ? $_SESSION['fechaNac'] : '',
        "idRegion"=> isset($_SESSION['idRegion']) ? $_SESSION['idRegion'] : ''
    ];

?>


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
	<title>CampusLands</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i> CampusLands</a>
		<ul class="side-menu">
			<li><a href="#" class="active"><i class='bx bxs-dashboard icon' ></i> Campers</a></li>
			<li><a data-value="my-staff"><i class='bx bxs-chart icon' ></i>Departamento </a></li>
			<li><a data-value="my-staff"><i class='bx bxs-chart icon' ></i>Pais </a></li>
			<li><a data-value="my-staff"><i class='bx bxs-chart icon' ></i>Region </a></li>
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
						<li><a href="#"><i class='bx bxs-user-circle icon'></i> Profile</a></li>
						<li><a href="#"><i class='bx bxs-cog'></i> Settings</a></li>
						<li><a href="#"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
					</ul>
				</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Campers</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Camper</a></li>
			</ul>
			
			<div class="data">
				<div id="vista" class="content-data">
					<div class="container-fluid row">
						<form class="col d-flex flex-wrap" action="uploads/app.php" method="post">
							<h3 class="text-center text-secondary">Registro de los Campers</h3>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Id Camper</label>
								<input type="number" class="form-control" name="idCamper">
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Nombre del Camper</label>
								<input type="text" class="form-control" name="nomCamper">
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Apellido del Camper</label>
								<input type="text" class="form-control" name="apCamper">
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Fecha de Nacimiento</label>
								<input type="data" class="form-control" name="fechaNac">
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Id de la Region donde vive</label>
								<input type="number" class="form-control" name="idRegion">
							</div>
							<button type="submit" class="btn btn-primary" name="guardar" value="guardar">Guardar</button>
						</form>
						<div class="col-8 p-4">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">Id Camper</th>
										<th scope="col">Nombre Camper</th>
										<th scope="col">Apellido Camper</th>
										<th scope="col">Fecha de Nacimiento</th>
										<th scope="col">Id Region</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>maria</td>
										<td>cubides</td>
										<td>2003-04-11</td>
										<td>1</td>
										<td>
											<a href="" class="btn btn-swall btn-warning">editar</a>
											<a href="" class="btn btn-swall btn-danger">eliminar</a>
										</td>
											
									</tr>
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