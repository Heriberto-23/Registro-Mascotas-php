<?php

if (isset($_POST['btnregistrar'])) {
    $nombremascota = mysqli_real_escape_string($conexion, $_POST['nombremascota']);
    $tipo = mysqli_real_escape_string($conexion, $_POST['tipo']);
    $raza = mysqli_real_escape_string($conexion, $_POST['raza']);
    $edad = mysqli_real_escape_string($conexion, $_POST['edad']);
    $color = mysqli_real_escape_string($conexion, $_POST['color']);

    $imgfotomascota = file_get_contents($_FILES['fotomascota']['tmp_name']);
    $fotomascota = mysqli_real_escape_string($conexion, $imgfotomascota);


    $nombrepropietario = $_POST["nombrepropietario"];


    $imgfotopropietario = file_get_contents($_FILES['fotopropietario']['tmp_name']);
    $fotopropietario = mysqli_real_escape_string($conexion, $imgfotopropietario);


    // Mover la imagen fotomascota a la carpeta img
    $carpeta_destino = "img/";

    $nombreFotoMascota = $_FILES['fotomascota']['name'];
    $ruta_final = $carpeta_destino . $nombreFotoMascota;
    move_uploaded_file($_FILES['fotomascota']['tmp_name'], $ruta_final);

    $nombreFotoPropietario = $_FILES['fotopropietario']['name'];
    $ruta_final_propietario = $carpeta_destino . $nombreFotoPropietario;
    move_uploaded_file($_FILES['fotopropietario']['tmp_name'], $ruta_final_propietario);


    $queryGuardar = "INSERT INTO mascotas(nombre_mascota, tipo, raza, edad, color, foto_mascota, nombre_propietario, foto_propietario) VALUES ('$nombremascota', '$tipo', '$raza', '$edad',' $color','$fotomascota','$nombrepropietario','$fotopropietario')";
    // echo $queryGuardar;
    // Ejecutar query
    if(mysqli_query($conexion, $queryGuardar)){
    echo '<div class="alert alert-primary mt-3" role="alert">';
    echo 'Registro Efectuado Correctamente!!!';
    echo '</div>';
    }else{
    echo '<div class="alert alert-danger mt-3" role="alert">';
    echo '¡¡¡Erro Registro No Ejecutado Correctamente!!!';
    echo '</div>';
    }
    
    // $sql=$conexion->query("INSERT INTO mascotas(nombre_mascota, tipo, raza, edad, color, foto_mascota, nombre_propietario, foto_propietario) VALUES ('$nombremascota', '$tipo', '$raza', '$edad',' $color','$fotomascota','$nombrepropietario',' $fotopropietario') ");
    // if($sql==1){
    //     echo '<div class="alert alert-success" role="alert">Mascota Registrado Correctamente</div>';
    // } else {
    //     echo '<div class="alert alert-danger" role="alert">Mascota Registrado Correctamente</div>';
    // }
}//else{
//     echo '<div class="alert alert-warning" role="alert">Obligatoriamente Necesita Llenar los Campos</div>';
// }

?>
