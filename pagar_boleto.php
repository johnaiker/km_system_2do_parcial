<?php 

include 'includes/header.php'; // Incluir Archivo de PHP

session_start();
?>



<body style="margin: 0 auto; padding: 0; background-color: #e1e1e1;">
    <nav class="navbar bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <h4 class="h1 my-2 text-uppercase" style="color: white; font-weight: bold; margin-left: 5rem"><i class="bi bi-airplane-engines-fill"></i> Km airlines</h4>
        </div>
    </nav>
<!-- <table class="table table-striped container"> -->
    <?php 

    // foreach ($_POST as $key => $value) {
    //     echo "<tr>";
    //     echo "<td>";
    //     echo $key;
    //     echo "</td>";
    //     echo "<td>";
    //     echo $value;
    //     echo "</td>";
    //     echo "</tr>";
    // }

    ?>
<!-- </table> -->

    <div class="container-fluid py-5">
        <div class="row justify-content-center g-3">
            <div class="col-md-8">
                <div class="card py-4 mt-6 mx-auto text-center" >
                    <h4 class="fs-3 text-uppercase text-center mb-3 d-flex align-items-center justify-content-center"> <div class="fs-1 material-symbols-outlined me-2">credit_card</div> Datos de Pago</h4>
                    <hr class="my-4">
                    <form class="p-3" action="pagar_boleto.php" method="post" >
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <div class="mb-3 form-floating">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="tarjeta"
                                            id="tarjeta"
                                            placeholder="XXXX-XXXX-XXXX-XXXX"
                                        />
                                        <label for="tarjeta" class="form-label">Tarjeta</label>
                                        <small id="desc_tarjeta" class="form-text text-muted">Ingresa tu tarjeta de credito</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <div class="mb-3 form-floating">
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="cvc"
                                            id="cvc"
                                            data-mask="00000"
                                            aria-describedby="desc_cvc"
                                            maxlength="5"
                                        />
                                        <label for="cvc" class="form-label">Fecha</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <div class="mb-3 form-floating">
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="tarjeta"
                                            id="tarjeta"
                                            data-mask="000"
                                            maxlength="3"
                                        />
                                        <label for="tarjeta" class="form-label">CVC</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-center mt-5"> 
                            <button class="btn btn-outline-secondary d-block btn-lg me-3" onclick="location = './index.php'">  Volver </button>
                            <button type="submit" class="btn btn-primary d-block btn-lg"> Pagar </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="flex: auto">
                    <div class="container pt-2">
                        <h4 class="fs-3 text-center d-flex align-items-center justify-content-center"><span class="material-symbols-outlined me-2 fs-1">airplane_ticket</span> Resumen</h4>

                        <hr class="my-2">
                        <div>
                            <table class="table table-striped">
                                <thead>
                                    <tr class="fw-bold fs-5">
                                        <th scope="col">
                                            <div class="d-flex align-items-center"><span class="material-symbols-outlined me-2"> event </span>Fecha</div>
                                        </th>
                                        <th scope="col">
                                            <div class="d-flex align-items-center"><span class="material-symbols-outlined me-2"> flight_class </span>Clase</div>
                                        </th>
                                        <th scope="col">
                                            <div class="d-flex align-items-center"><span class="material-symbols-outlined me-2"> connecting_airports </span>Tipo</div>
                                        </th>
                                        <th scope="col">
                                            <div class="d-flex align-items-center"><span class="material-symbols-outlined me-2"> flight </span>Ruta</div>
                                        </th>
                                        <th scope="col">
                                            <div class="d-flex align-items-center"><span class="material-symbols-outlined me-2"> attach_money </span>Precio</div>
                                        </th>
                                    </tr>
                                </thead>
                                
                                <tbody class="table-group-divider text-center">
                                    <tr>
                                        <td class="fw-bold"><?= $_SESSION["vuelo_info"]["fecha"]// $_POST["fecha"] ?></td>
                                        <td class="text-primary fw-bold fs-5"><?= $_SESSION["vuelo_info"]["clase"]// $_POST["clase"] ?></td>
                                        <td class="text-uppercase fw-bold">Sin retorno</td>
                                        <td><?=$_SESSION["vuelo_info"]["ruta_orig"]?>-PMV</td>
                                        <td class="fw-bold text-success">$ <?= $_SESSION["vuelo_info"]["precio"]// $_POST["precio"] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <hr class="my-3">
                        <div class>
                            
                            <h4 class="fs-3 text-center d-flex align-items-center justify-content-center"><span class="material-symbols-outlined me-2 fs-1">perm_contact_calendar</span> Datos del pasajero</h4>

                            <hr class="my-2">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="fw-bold fs-5">
                                        <th scope="col">
                                            <div class="d-flex align-items-center"><span class="material-symbols-outlined me-2"> person </span>Nombre</div>
                                        </th>
                                        <th scope="col">
                                            <div class="d-flex align-items-center"><span class="material-symbols-outlined me-2"> badge </span>Cedula</div>
                                        </th>
                                        <th scope="col">
                                            <div class="d-flex align-items-center"><span class="material-symbols-outlined me-2"> email </span>Email</div>
                                        </th>
                                        <th scope="col">
                                            <div class="d-flex align-items-center"><span class="material-symbols-outlined me-2"> flight </span>Fecha de Nacimiento</div>
                                        </th>
                                        <!-- <th scope="col">
                                            <div class="d-flex align-items-center"><span class="material-symbols-outlined me-2"> attach_money </span>Precio</div>
                                        </th> -->
                                    </tr>
                                </thead>
                                
                                <tbody class="table-group-divider text-center">
                                    <tr class="fs-6">
                                        <td style="font-size: 12px;" class="fw-thin"><?=  $_POST["nombre"]." ".$_POST["apellido"] ?></td>
                                        <td style="font-size: 12px;" class="text-primary fw-bold"><?= $_POST["cedula"] ?></td>
                                        <td style="font-size: 12px;" class="text-uppercase fw-bold"><?= $_POST["correo"] ?></td>
                                        <td class="text-uppercase fw-light"><?= $_POST["fecha_n"] ?></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<script>
    
</script>