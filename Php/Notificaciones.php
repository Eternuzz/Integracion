
<?php

require_once("conexion.php");
session_start();

$id=$_SESSION["id"];

$sql= " SELECT * FROM sugerencias_citas  sc INNER JOIN preagendamiento p ON sc.id_preagendamiento=p.id_preagendamiento WHERE sc.id_usuario='$id' AND sc.estado='Reservado'";
$consulta = mysqli_query($conn,$sql);

if(mysqli_num_rows($consulta)>0){
    while($array_consulta=mysqli_fetch_assoc($consulta)){
        $id_sug = $array_consulta["id"];
        $fechas ="La cita solicitada para la fecha ".$array_consulta["fecha"]."y ".$array_consulta["fecha"]." No esta disponible"." Le fecha mas pronta dispoible es ".$array_consulta["fecha_sug"]." a las" . $array_consulta["hora_reservada"]."Desea Aceptarla ?";

?>

    <div class="card">

        <div class="titulo_card">Querido Usuario</div>
        <div class="mensaje_card"><?php $fechas ?></div>
        <div class="botones_card">
            <form action="" class="aceptar_sug">
                <input type="hidden" name="aceptar" value="<?php echo $id_sug ?>">
                <button type="submit">Aceptar</button>
            </form>
            <form action="" class="rechazar_sug">
            <input type="hidden" name="rechazar" value="<?php echo $id_sug ?>">
                <button type="submit">Rechazar</button>
            </form>

        </div>

    </div>

<?php
    }
}

?>

<script src="Notificaciones.php"></script>



