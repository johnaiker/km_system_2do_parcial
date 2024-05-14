
<?php

//Incluir un archivo de PHP (archivo de base de datos); 
include 'conection_db.php';
// $servername = "localhost";
// $username = "root";
// $password = "246678";

$ruta = ''; // Ruta de ida 
$rutaRet = ''; // Ruta de ida 
$oneway = true; // Variable que se usa para saber si es solo ida o ida y vuelta

// Concatenar la ruta de ida con la ruta de destino, para comprobar si hay vuelos en esa ruta
if(!empty($_GET['ruta_ida']) && !empty($_GET['ruta_ret'])) {
    $ruta = $_GET['ruta_ida'] . $_GET['ruta_ret'];
    $rutaRet = $_GET['ruta_ret'] . $_GET['ruta_ida'] ;
}

// Conectar con la Base de Datos
$conn = new mysqli("localhost","root","246678","km_airlines");
$sql = "SELECT * FROM itinerario_vuelos WHERE ruta='". $ruta ."'"; // Query de Consulta donde se trae data cuando la ruta coincide

$result = $conn->query($sql);
// $destinos = [];

//Ver si el viaje es ida y vuelta
if(!empty($_GET['flight_type'])) { 
    if ($_GET['flight_type'] == "fullway") { 
        $oneway = false;
        
        $sql = "SELECT * FROM itinerario_vuelos WHERE ruta='". $rutaRet ."'"; // Query de Consulta donde se trae data cuando la ruta coincide

        // echo $sql;
        $resultRet = $conn->query($sql);

        // $row;

    }
   }

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "Clase: " . $row["clase"]. " - dias de vuelo: " . $row["fecha"]."<br>";
//     // print_r(explode(',',$row['destinos']));
//   }
// } else {
//   echo "0 results";
// }

// // Create connection
// $conn = new mysqli($servername, $username, $password);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
  
    <!-- Debajo incluimos los plugins de jQuery -->
    <link href= 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script> 
    <script src= "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
    <script src= "https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"> </script> 
    <script src= "https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"> </script> 
</head>
<body style="margin: 0 auto; padding: 0; background-color: #e1e1e1;">
<?php

    if (!empty($_GET['flight_type']) && !empty($_GET['ruta_ida']) && !empty($_GET['ruta_ret']) && !empty($_GET['fecha_ida']) && !empty($_GET['fecha_ret'])) { 
        $flighttype = $_GET['flight_type'];
        $ruta_ida = $_GET['ruta_ida'];
        $ruta_ret = $_GET['ruta_ret'];
        $fecha_ida = $_GET['fecha_ida'];
        $fecha_ret = $_GET['fecha_ret'];
    }
?>
    <nav class="navbar bg-primary" data-bs-theme="dark">
        <div class="container">
            <h4 class="h1 my-2 text-uppercase" style="color: white; font-weight: bold; margin-left: 5rem"><i class="bi bi-airplane-engines-fill"></i> Km airlines</h4>
        </div>
    </nav>
    <div class="container py-5">
    <h4 class="h4 text-uppercase text-center mb-3">Seleccionar vuelo</h4>
        <div class="card py-4 mt-6 mx-auto text-center" >
            <form action="index.php" method="POST">
                <div class="card-body ">
                    <h3 class="h3 text-left" style="color: black"> <span style="font-size: 1.2rem; font-weight: light!important;"><?= $fecha_ida ?></span> / Vuelos de Ida:</h3>
                    <div class="row">
                        <?php if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                        ?> 
                        
                        <div class="col">
                            <div class="card mx-auto" style="cursor: pointer; padding: 1rem!important;">
                                <?php if($row['fecha'] != $_GET['fecha_ida'] ) {
                                ?>
                                    <div class="" style="font-weight: bold; color: red">Fuera de la fecha seleccionada</div>
                                <?php } ?>
                                <div class="card-body">
                                <h3 class="h3" style="color: green">CLASE <?= $row['clase']; ?></h3>
                                <h3 class="h6">FECHA: <?= $row['fecha']; ?></h3>
                                <h3 class="h6">Hora: <?= $row['hora']; ?></h3>
                                <h3 class="h3">$<?= $row['precio']; ?></h3>
                                <p>Asientos disponibles: <?= $row['asientos']; ?></p>
                                </div>
                            </div>
                        </div>
                            <?php
                                }
                                } else { ?>
                            <div class="card mx-auto">
                                <div class="card-body">
                                    <h4 class="h4" style="color: tomato">NO HAY VUELOS DISPONIBLES PARA LA FECHA SELECCIONADA</h4>
                                </div>
                            </div>
                            <?php } ?>
                    </div>

                    <?php if(!$oneway) {
                    ?>
                            
                            <div class="mt-6">_</div>
                    <h3 class="h3 text-left" style="color: black"><span style="font-size: 1.2rem; font-weight: light!important;"><?= $fecha_ret ?></span> / Vuelos de Retorno:</h3>

                    <?php if ($resultRet->num_rows > 0) { ?>
                        <?php
                            while ($row = $resultRet->fetch_assoc()) {

                        ?> <div class="card d-inline-block mx-auto" style="cursor: pointer; padding: 1rem!important;">
                            <?php if($row['fecha'] != $_GET['fecha_ret'] ) {

                            ?>
                                <div class="" style="font-weight: bold; color: red">Fuera de la fecha seleccionada</div>
                            <?php } ?>
                            <div class="card-body">
                            <h3 class="h3" style="color: green">CLASE <?= $row['clase']; ?></h3>
                            <h3 class="h6">FECHA: <?= $row['fecha']; ?></h3>
                            <h3 class="h6">Hora: <?= $row['hora']; ?></h3>
                            <h3 class="h3">$<?= $row['precio']; ?></h3>
                            <p>Asientos disponibles: <?= $row['asientos']; ?></p>
                            </div>
                        </div>
                        <?php
                            }
                            } else { ?>
                        <div class="card mx-auto">
                            <div class="card-body">
                                <h4 class="h4" style="color: tomato">NO HAY VUELOS DISPONIBLES PARA LA FECHA SELECCIONADA</h4>
                            </div>
                        </div>
                        <?php } } ?>
                    <div class="col">
                        <button type="submit"  class="btn btn-primary mt-4 btn-lg"><i class="bi bi-arrow-left"></i> Volver</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>