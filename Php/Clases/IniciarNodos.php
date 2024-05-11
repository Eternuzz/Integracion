<?php
include_once "../conexion.php";
include_once "Grafo.php";
include_once "Consultas.php";
include_once "ActualizarBD.php";
include_once "InsertBD.php";


$grafo = new Grafo($conn);
$consultar = new Consultas($conn);
$actualizar = new UpdateBD($conn);
$insertar = new InsertarBD($conn);

$sql = " SELECT * FROM preagendamiento ";
$ejecutar_consulta = mysqli_query($conn,$sql);

if(mysqli_num_rows($ejecutar_consulta)>0){
    while($array_consulta=mysqli_fetch_array($ejecutar_consulta)){
     
        // array_push($arreglo_alojar,array($array_consulta[0],$array_consulta[1],$array_consulta[4],$array_consulta[7]));
        $nodo = new Nodo($array_consulta['id_preagendamiento'],array("idUsuario"=>$array_consulta['id_usuario'], "HoraInicio"=>$array_consulta['hora_inicio'],"HoraFin"=>$array_consulta['hora_fin'],"Valoracion"=>$array_consulta['valoracion'],"Registro"=>$array_consulta['registro'],"FechaSolicitada"=>$array_consulta['fecha'],"IdTipoCita"=>$array_consulta['id_tipo_cita'],"HoraAsignada"=>null,"MedicoAsignado"=>null),$array_consulta['orden']);
        $grafo->AgregarNodo($nodo);

    }
}


echo "NODOS CON HORA ASIGNADA<br><br>";
$nodosOrdenados = $grafo->AsginarHora();

foreach ($nodosOrdenados as $nodo) {
    echo "Nodo ID: {$nodo->id},\n Peso(Prioridad): {$nodo->peso}\n Fecha Solicitada = {$nodo->datos['FechaSolicitada']}  HoraAsignada = {$nodo->datos['HoraAsignada']}      MedicoAsignadoo = {$nodo->datos['MedicoAsignado']}<br><br>";
}

/*

echo "<br><br>NODOS CON MEDICO ASIGNADA<br><br>";
$nodoshoras = $grafo->AsignarMedico();

foreach ($nodoshoras as $nodo) {
    echo "Nodo ID: {$nodo->id},\n Peso(Prioridad): {$nodo->peso}\n Fecha Solicitada = {$nodo->datos['FechaSolicitada']}  HoraAsignada = {$nodo->datos['HoraAsignada']}      MedicoAsignadoo = {$nodo->datos['MedicoAsignado']}<br><br>";
}

echo "<br><br>NODOS NO HORAS SIN NLL<br><br>";
$nodoshoras = $grafo->FiltrarNodosNoNull($nodosOrdenados);

foreach ($nodoshoras as $nodo) {
    echo "Nodo ID: {$nodo->id},\n Peso(Prioridad): {$nodo->peso}\n Fecha Solicitada = {$nodo->datos['FechaSolicitada']}  HoraAsignada = {$nodo->datos['HoraAsignada']}      MedicoAsignadoo = {$nodo->datos['MedicoAsignado']}<br><br>";
}
*/

echo "<br><br>NODOS FILTRADOS NO FUNCIONA<br><br>";
$nodoshoras1 = $grafo->AsignarMedicoNofunciona();

foreach ($nodoshoras1 as $nodo) {
    echo "Nodo ID: {$nodo->id},\n Peso(Prioridad): {$nodo->peso}\n Fecha Solicitada = {$nodo->datos['FechaSolicitada']}  HoraAsignada = {$nodo->datos['HoraAsignada']}      MedicoAsignadoo = {$nodo->datos['MedicoAsignado']}<br><br>";
}

$a= $consultar->ContarMEspecialidadActivo(1);
echo $a;
//echo var_dump($nodosOrdenados);
$NodosProcesados =$nodoshoras1;
echo "<br><br>INSERTS Y UPDATES BD<br><br>";

foreach ($NodosProcesados as $nodo) {

    if($consultar->ValidarExistenciaCita($nodo->id)) {

        $actualizar->ActualizarCitasAsignadas($nodo);

    }else{

        $insertar->InsertarCitasOrdenadas($nodo);

    }

}


?>