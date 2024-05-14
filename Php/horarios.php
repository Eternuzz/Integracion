<?php
require_once("conexion.php");
$rango1= $_POST['opcion_actual'];
echo "Primer rango id ", $rango1;

$sql="SELECT * FROM horarios WHERE EXTRACT(MINUTE FROM hora_inicio) IN (0, 30) AND  id_horario > '$rango1'";
$consul2= mysqli_query($conn,$sql);

   if($consul2){
       while($desplegar2= $consul2->fetch_assoc()){
           echo "<option value='".$desplegar2['id_horario']."'>".$desplegar2['hora_inicio']."</option>";
       }
   }
   ?>
