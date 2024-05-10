<?php 
require_once("conexion.php");

date_default_timezone_set('America/Bogota');
$sql_ordenar_citas = " SELECT * FROM preagendamiento ";
$consulta_orden = mysqli_query($conn,$sql_ordenar_citas);
$arreglo_alojar =array();
if(mysqli_num_rows($consulta_orden)>0){
    while($array_consulta=mysqli_fetch_array($consulta_orden)){
        //var_dump($array_consulta);
        array_push($arreglo_alojar,array($array_consulta[0],$array_consulta[1],$array_consulta[4],$array_consulta[7]));
    }
    
        //var_dump($arreglo_alojar);


        usort($arreglo_alojar, function($a, $b) {
            if($a[2] !== $b[2]){
                return $a[2] <=> $b[2];
            }
            
            return $a[3] <=> $b[3] ;
        });
        
        print_r($arreglo_alojar);
        for($i=0;$i<count($arreglo_alojar);$i++){
            
                $id=$arreglo_alojar[$i][0];
                $orden = $i+1;
                $sql_tem= mysqli_query($conn," UPDATE preagendamiento SET orden='$orden' WHERE id_preagendamiento='$id'");
                if($sql_tem){
                    echo "siuu";
                }
            
            
        }
        
    }
    $fechaHoraActual = date('Y-m-d H:i:s');


    
// Muestra la fecha y hora actuales
echo "La fecha y hora actuales son: $fechaHoraActual";
//$arreglo = array(array("persona3",3),array("persona1",1),array("persona2",2));
?>