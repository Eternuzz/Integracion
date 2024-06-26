<?php

include_once "Nodo.php";
include_once "Consultas.php";

class Grafo{

    public $nodos = array();
    public $Aristas = array();
    public $Conexion;

    public function __construct($Conexion) {
        $this->Conexion = $Conexion;
    }

    //Permite Agregar Un Nuevo Nodo al grafo
    public function AgregarNodo($nodo){

        $this->nodos[$nodo->id]=$nodo;

    }


    /* Ordena Los Nodos Apartir de los datos Del Nodo,
    Para este caso principalmente Valoracion Y si hay igualdad
    De Valoracion Entre Los Nodos, Se Toma Como Segunda variable
    La fecha y Hora Exactas del momento que se solicito la cita(Nodo) 
      */
    public function OrdenarNodos() {
    
        $nodosArray = array_values($this->nodos);

        usort($nodosArray, function($a, $b) {
        
            if ($b->datos["Valoracion"] == $a->datos["Valoracion"]) {       

                return $a->datos["Registro"] <=> $b->datos["Registro"];

            }
            return $b->datos["Valoracion"]<=> $a->datos["Valoracion"];

        });

        return $nodosArray;

    }

    /* Una vez Ordenados Los Nodos, Se Establece A Cada Nodo un Peso que es
    Equivalante a la posicion donde quedo +1 En Este Caso entre Menor Peso, Mayor prioridad */
    public function AsignarOrden(){

        $OrdenarNodos =$this->OrdenarNodos();

        for ($i=0;$i<count($OrdenarNodos);$i++){

            $OrdenarNodos[$i]->AsignarPeso($i+1);

        }

        return $OrdenarNodos;

    }

    /* Se Asigna La Menor Hora Posible Dependiendo del rango de horas 
    que se solicito en la cita(Nodo) */
    public function AsginarHora(){

        $consulta = new Consultas($this->Conexion);
        $NodosOrdenados = $this->AsignarOrden();
        $NodosFiltrados = array();

        for($i=0 ; $i<count($NodosOrdenados);$i++){

           $ArregloDeHoras = $consulta->HorasDisponiblesPorRango($NodosOrdenados[$i]->datos["HoraInicio"],$NodosOrdenados[$i]->datos["HoraFin"]);

           if($i==0){

            //$NodosOrdenados[$i]->AgregarDatoHora($ArregloDeHoras[$i]);
            $NodosOrdenados[$i]->ModificarHora($ArregloDeHoras[$i]);

           }else{

           // $NodosOrdenados[$i]->AgregarDatoHora(null);
            $HoraDisponibilidad =$this->CompararHorasNodos($NodosOrdenados[$i],$ArregloDeHoras,$NodosFiltrados);
            $NodosOrdenados[$i]->ModificarHora($HoraDisponibilidad);

           }

           array_push($NodosFiltrados,$NodosOrdenados[$i]);


        }

        

        return $NodosOrdenados;

    }

    /* Compara El Nodo al que se le asignara la hora, Con solo los nodos que ya tienen una hora asignada
    Compara Fecha Y Hora para Saber si hay y retornar disponibilidad */
    public function CompararHorasNodos($nodo,$ArregloHorasNodo,$NodosFiltrados){
        
        $NodosConHoras = $NodosFiltrados;
        $consulta = new Consultas($this->Conexion);
        $comparador = $consulta->ContarMEspecialidadActivo($consulta->EspecialidadPorCita($nodo->datos["IdTipoCita"]));
        $contador =0;
        $variable="";
        
        foreach($NodosConHoras as $OtrosNodos){
            
            if($nodo->datos["FechaSolicitada"] == $OtrosNodos->datos["FechaSolicitada"]){

                $contador++;

                if($contador==$comparador){

                    $clave = array_search($OtrosNodos->datos["HoraAsignada"], $ArregloHorasNodo);

                    if ($clave !== false) {
       
                        unset($ArregloHorasNodo[$clave]);  
                        $ArregloHorasNodo = array_values($ArregloHorasNodo);
                        $contador =0;
       
                    }

                }

            }
        }
        
        if(count($ArregloHorasNodo)<1){

            return null;

        }

        return $ArregloHorasNodo[0];

    }



    public function FiltrarNodosNoNull($Nodos){
        $NodosFiltrados = array_filter($Nodos,function($nodo){
            return $nodo->datos["HoraAsignada"] != null;
        });

        return $NodosFiltrados;
    }


    public function ValidarDisponibilidadDoctor($Nodo,$Medicos,$NodosConMedicos){

        $ArrayMedicos = $Medicos;

        foreach($NodosConMedicos as $NodosYaAsignados){

            if($Nodo->datos["FechaSolicitada"] == $NodosYaAsignados->datos["FechaSolicitada"] && $Nodo->datos["HoraAsignada"] == $NodosYaAsignados->datos["HoraAsignada"]){

                foreach($ArrayMedicos as $medicos=>$datosmedico){

                    if ($datosmedico["IdDoctor"] === $NodosYaAsignados->datos["MedicoAsignado"]) { 

                        unset($ArrayMedicos[$medicos]);
                        $ArrayMedicos = array_values($ArrayMedicos);

                    }

                }      

            }

        }

        if(count($ArrayMedicos)<1){

            return null;

        }
       
        return $ArrayMedicos[0]["IdDoctor"];

    }



    public function AsignarMedicoNofunciona(){
        $NodosConHoras = $this->FiltrarNodosNoNull($this->AsginarHora());
        //$NodosConHoras = $this->AsginarHora();
        $Consultar = new Consultas($this->Conexion);
        $NodosYaAsignados = array();
        $contador=0;
        
        foreach($NodosConHoras as $NodosActuales){

           $Medicos=$Consultar->CMEspecialidadActivo($Consultar->EspecialidadPorCita($NodosActuales->datos["IdTipoCita"]));

           if($contador==0){

            $NodosActuales->ModificarMedico($Medicos[$contador]["IdDoctor"]);

           }else{

            $MedicoDisponible = $this->ValidarDisponibilidadDoctor($NodosActuales,$Medicos,$NodosYaAsignados);
            $NodosActuales->ModificarMedico($MedicoDisponible);

           }

           array_push($NodosYaAsignados,$NodosActuales);
           $contador++;

        }

        return $NodosConHoras;

    }

}

?>