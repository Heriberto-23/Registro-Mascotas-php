<?php
    // Cargar el código de la conexión a la BD
    include_once "conexion.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria con php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center alert alert-success">Veterinaria MascotaPlus</h1>
    <div class="container-fluid row">
        <form class="col-4 p-3" method="POST" enctype = "multipart/form-data">
            <h3 class="text-center alert alert-secondary">Registro de Animales</h3>
            <?php
            include "Conexion.php";
            include "registro_mascotas.php";
            ?>
            <div class="mb-2">
                <label for="nombremascota" class="form-label">Nombre de la Mascota</label>
                <input type="text" class="form-control" name="nombremascota" id="nombremascota">
            </div>
            <div class="mb-2">
                <label for="tipo" class="form-label">Tipo de Mascota</label>
                <input type="text" class="form-control" name="tipo" id="tipo">
            </div>
            <div class="mb-2">
                <label for="raza" class="form-label">Raza de la Mascota</label>
                <input type="text" class="form-control" name="raza" id="raza">
            </div>
            <div class="mb-2">
                <label for="edad" class="form-label">Edad</label>
                <input type="text" class="form-control" name="edad" id="edad">
            </div>
            <div class="mb-2">
                <label for="color" class="form-label">Color</label>
                <input type="text" class="form-control" name="color" id="color">
            </div>
            <div class="mb-2">
                <label for="fotomascota" class="form-label">Foto de la Mascota</label>
                <input type="file" class="form-control" name="fotomascota" id="fotomascota">
            </div>
            <div class="mb-2">
                <label for="nombrepropietario" class="form-label">Nombre del Propietario</label>
                <input type="text" class="form-control" name="nombrepropietario" id="nombrepropietario">
            </div>
            <div class="mb-2">
                <label for="fotopropietario" class="form-label">Foto del Propietario</label>
                <input type="file" class="form-control" name="fotopropietario" id="fotopropietario">
            </div>

            <button type="submit" class="btn btn-primary" name="btnregistrar">Registrar</button>
        </form>

        <div class="col-8 p-4">
            <table class="table table-info table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Raza</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Color</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Propietario</th>
                        <th scope="col">Foto</th>
                    </tr>
                </thead>
                <tbody class="table align-middle">
                <?php
                // Recuperar los productos de la BD
                $queryMascotas = "SELECT * FROM mascotas;";
                $resultadoMascotas = mysqli_query($conexion, $queryMascotas); // Ejecutar el query
                $totalMascotas = mysqli_num_rows($resultadoMascotas); // Contar el número de productos

                // Ciclo para imprimir los productos
                if ($totalMascotas > 0) { // Validar si existen productos en la BD
                    // Presentar los productos en cada fila de la tabla
                    while ($mascota = mysqli_fetch_array($resultadoMascotas)) {
                        echo "<tr>";
                        echo "<td>" . $mascota['nombre_mascota'] . "</td>";
                        echo "<td>" . $mascota['tipo'] . "</td>";
                        echo "<td>" . $mascota['raza'] . "</td>";
                        echo "<td>" . $mascota['edad'] . "</td>";
                        echo "<td>" . $mascota['color'] . "</td>";
                        echo "<td><img src='data:image/png;base64," . base64_encode($mascota['foto_mascota']) . "' alt='Imagen' style='width:100px; height:100px;'></td>";
                        echo "<td>" . $mascota['nombre_propietario'] . "</td>";
                        echo "<td><img src='data:image/png;base64," . base64_encode($mascota['foto_propietario']) . "' alt='Imagen' style='width:100px; height:100px;'></td>";
                        
                        echo "</tr>";
                    } // while $mascota
                } // if $totalMascotas
              ?>



                </tbody>
            </table>


        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>