<?php

require_once("conexion.php");


session_start();
date_default_timezone_set('America/Bogota');
$id_user=$_SESSION['id'];
$edad=$_SESSION['edad'];

$fecha = $_POST['fecha_date'];
$hora_inicio = $_POST['hora_inicio'];
$hora_fin = $_POST['hora_fin'];
$id_tipo_cita= $_POST['tipocita'];

$sql="SELECT usuario.*, patologias.puntuacion AS puntuacion_patologia,
estado.puntuacion AS puntuacion_embarazo FROM usuario INNER JOIN historia_clinica ON historia_clinica.id_usuario= usuario.id_usuario INNER JOIN patologias ON patologias.id_patologia= historia_clinica.id_patologia INNER JOIN estado ON estado.id_estado=historia_clinica.id_estado WHERE usuario.id_usuario='$id_user'";
$consulta= mysqli_query($conn,$sql);
$sql2="SELECT * FROM edades_rango WHERE $edad  BETWEEN inicial AND final";
$consulta2= mysqli_query($conn,$sql2);

if(mysqli_num_rows($consulta)>0){
    $datos= mysqli_fetch_array($consulta);
    $point_patologia=$datos['puntuacion_patologia'];
    $point_embarazo=$datos['puntuacion_embarazo'];
    
}
if(mysqli_num_rows($consulta2)>0){
    $datos2= mysqli_fetch_array($consulta2);
    $point_edad= $datos2['id_puntaje'];
}
$suma = $point_patologia + $point_embarazo + $point_edad;
echo "patologia: ",$point_patologia, "embarazo: ",$point_embarazo,"EDad: ", $point_edad, "SUMA: ", $suma ;

$fechaHoraActual = date('Y-m-d H:i:s');
$ahora_mismo ="".$fechaHoraActual;
$sql_insertar_cita = " INSERT INTO preagendamiento (id_usuario,id_tipo_cita,fecha,hora_inicio,valoracion,hora_fin,orden,registro)  VALUES ('$id_user','$id_tipo_cita','$fecha','$hora_inicio','$suma','$hora_fin',0,'$ahora_mismo')";
$ejecutar_consulta = mysqli_query($conn,$sql_insertar_cita);
if($ejecutar_consulta){
    $sql_ordenar_citas = " SELECT * FROM preagendamiento";
    $consulta_orden = mysqli_query($conn,$sql_ordenar_citas);
    if(mysqli_num_rows($consulta_orden)>0){
        $array_consulta = mysqli_fetch_array($consulta_orden);
        
        var_dump($array_consulta);
        $a= count($array_consulta) ;
        echo $a;
        echo "<br><br>";
        }
}else{
    echo "no sirve";
}

?>