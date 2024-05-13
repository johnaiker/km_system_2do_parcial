
<?php
include 'conection_db.php';
// $servername = "localhost";
// $username = "root";
// $password = "246678";

$ruta = '';

if(!empty($_GET['ruta_ida']) && !empty($_GET['ruta_ret'])) {
 $ruta = $_GET['ruta_ida'] . $_GET['ruta_ret'];
}


$conn = new mysqli("localhost","root","246678","km_airlines");

$sql = "SELECT * FROM itinerario_vuelos WHERE ruta='". $ruta ."'";

echo $sql;
$result = $conn->query($sql);
$destinos = [];

$row;

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
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script> 
    <script src= "https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"> </script> 
    <script src= "https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"> </script> 
</head>
<body style="margin: 0 auto; padding: 0; background-color: #e1e1e1;">
<?php


$rutas = ["CCS", "MCB", "BRM", "BAR"];

// $rutasDisponibles = array(
//     array("fecha" => "01/05/2024", "ruta" => "CCS", "asientos" => 4),
//     array("fecha" => "01/05/2024", "ruta" => "BRM", "asientos" => 0),
//     array("fecha" => "01/05/2024", "ruta" => "BAR", "asientos" => 3),
//     array("fecha" => "01/05/2024", "ruta" => "MCB", "asientos" => 6),
//     array("fecha" => "15/04/2024", "ruta" => "CCS", "asientos" => 5),
//     array("fecha" => "11/04/2024", "ruta" => "BRM", "asientos" => 7),
//     array("fecha" => "16/04/2024", "ruta" => "BAR", "asientos" => 7),
// );

$disponibles = 12;
function buscarVuelosDisp($rutaIda, $rutaVuelta, $tipoVuelo, $fechaIda, $fechaVuelta) {

    $rutasDisponibles = array(
        array("fecha" => "01/05/2024", "ruta" => "CCS", "asientos" => 4),
        array("fecha" => "01/05/2024", "ruta" => "BRM", "asientos" => 0),
        array("fecha" => "01/05/2024", "ruta" => "BAR", "asientos" => 3),
        array("fecha" => "01/05/2024", "ruta" => "MCB", "asientos" => 6),
        array("fecha" => "15/04/2024", "ruta" => "CCS", "asientos" => 5),
        array("fecha" => "11/04/2024", "ruta" => "BRM", "asientos" => 7),
        array("fecha" => "16/04/2024", "ruta" => "BAR", "asientos" => 7),
    );
    
    if($tipoVuelo == "fullway") {
        foreach ($rutasDisponibles as $ruta) {
            echo"EL pepe".$ruta["fecha"];
            # code...
        }
    } else {
        // foreach ($rutasDisponibles as list($a, $b)) {
        //     # code...
        // }
    }
    // if (filter_var($entrada, FILTER_VALIDATE_INT) !== false) {
    //     echo "Ha ingresado un valor de tipo Int\n";
    // } elseif (filter_var($entrada, FILTER_VALIDATE_BOOLEAN) !== false) {
    //     echo "Ha ingresado un valor de tipo Bool\n";
    // } else {
    //     echo "Ha ingresado un valor de tipo String\n";
    // }
}

if (!empty($_GET['flight_type']) && !empty($_GET['ruta_ida']) && !empty($_GET['ruta_ret']) && !empty($_GET['fecha_ida']) && !empty($_GET['fecha_ret'])) { 
    $flighttype = $_GET['flight_type'];
    $ruta_ida = $_GET['ruta_ida'];
    $ruta_ret = $_GET['ruta_ret'];
    $fecha_ida = $_GET['fecha_ida'];
    $fecha_ret = $_GET['fecha_ret'];
    buscarVuelosDisp($flighttype, $ruta_ida, $ruta_ret, $fecha_ida, $fecha_ret);
}
?>
    <nav class="navbar bg-primary" data-bs-theme="dark">
        <div class="container">
            <h4 class="h1 my-2 text-uppercase" style="color: white; font-weight: bold; margin-left: 5rem"><i class="bi bi-airplane-engines-fill"></i> Km airlines</h4>
        </div>
    </nav>
    <div class="container py-5">
        <div class="card py-4 mt-6 mx-auto text-center" >
            <h4 class="h4 text-uppercase">Seleccionar vuelo</h4>
            <form action="index.php" method="POST">
                <div class="card-body ">
                    <?php if ($result->num_rows > 0) { ?>

                        

                    <?php
                        while ($row = $result->fetch_assoc()) {

                     ?> <div class="card d-inline-block mx-auto" style="cursor: pointer; padding: 1rem!important;">
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
                    <?php
                        }
                        } else { ?>
                    <div class="card mx-auto">
                        <div class="card-body">
                            <h4 class="h4">NO HAY VUELOS DISPONIBLES PARA HOY</h4>
                        </div>
                    </div>
                    <?php } ?>
                <!-- <div class="form-check">
                </div> -->
                
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