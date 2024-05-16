<?php
include('conexion.php');
session_start();


if(isset($_POST["aceptar"])) {

    $id=$_POST["aceptar"];

    $sql= " SELECT * FROM sugerencias_citas  sc INNER JOIN preagendamiento p ON sc.id_preagendamiento=p.id_preagendamiento WHERE sc.id='$id' ";
    $consulta = mysqli_query($conn,$sql);

    if(mysqli_num_rows($consulta)>0){
        $fila=mysqli_fetch_assoc($consulta);

        $idp=$fila["id_preagendamiento"];
        $ids=$fila["fecha_sug"];
        $idr=$fila["hora_reservada"];


        $sql1 = "INSERT citas_agendadas (id_preagendamiento,FechaAsignada,HoraAignada,id_DoctorAsignado,prioridad) VALUES ('$idp','$ids','$idr',1,null)";
        $resultado1 = mysqli_query($con, $sql1);
        if($resultado1){
            $sql2 = "UPDATE sugerencias_citas
            SET Estado = 'Aceptado'
            WHERE id = '$id'";
    
            
            $resultado2 = mysqli_query($con, $sql2);

            if($resultado2){
                include_once('Notificaciones.php');
            }
    
        }


    }




}

if(isset($_POST["rechazar"])) {

    $id=$_POST["rechazar"];

    $sql = "DELETE FROM sugerencias_citas WHERE id ='$id'";

    $resultado = mysqli_query($con, $sql);

    if($resultado){

        include_once('Notificaciones.php');
        
    }


}
?>