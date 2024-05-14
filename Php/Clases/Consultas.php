<?php


class Consultas{

    public $Conexion;

    public function __construct($Conexion) {
        $this->Conexion = $Conexion;
    }

    /* Consulta Para Retornar la hora apartir de la id */
    public function Hora($hora){

        $Sql = mysqli_query($this->Conexion,"SELECT * FROM horarios WHERE id_horario='$hora'");

        if($Resultado = mysqli_fetch_array($Sql)){

            $DatoHora = $Resultado['hora_inicio'];
            return $DatoHora;

        }

        return null;

    }

    /* Retorna un arreglo de horas segun los parametros */
    public function HorasDisponiblesPorRango($hora_incio,$hora_fin){

        $HoraInicio = $this->Hora($hora_incio);
        $HoraFin = $this->Hora($hora_fin);
        $Sql = mysqli_query($this->Conexion,"SELECT * FROM horarios WHERE hora_inicio BETWEEN '$HoraInicio' AND '$HoraFin'");
        $ArregloHoras = array();

        while($Resultado = mysqli_fetch_array($Sql)){
            
          array_push($ArregloHoras,$Resultado['hora_inicio']);

        }

        return $ArregloHoras;

    }

    public function ConultarDoctorByIDUser($DoctorID){

        $SQL = mysqli_query($this->Conexion,"SELECT * FROM doctores dc INNER JOIN especialidades ed ON dc.id_especialidad=ed.id_especialidad INNER JOIN usuario us ON dc.id_usuario=us.id_usuario WHERE id_usuario='$DcotorID'");
        $DatosMedico = array();

        if($Resultado=mysqli-fetch_array($SQL)){

            $DatosMedico[]=$Resultado['id_doctor'];
            $DatosMedico[]=$Resultado['id_usuario'];
            $DatosMedico[]=$Resultado['nombre'];
            $DatosMedico[]=$Resultado['especialidad'];
            $DatosMedico[]=$Resultado['estado'];

            return $DatosMedico;

        }

        return null;

    }


    public function ConsultarDoctoresActivos(){
        $SQL = mysqli_query($this->Conexion,"SELECT * FROM doctores dc INNER JOIN especialidades ed ON dc.id_especialidad=ed.id_especialidad INNER JOIN usuario us ON dc.id_usuario=us.id_usuario WHERE estado='Activo'");
        $AllMedicos = array();

        while($Resultado=mysqli_fetch_array($SQL)){

            array_push($AllMedicos,array("IdDoctor"=>$Resultado['id_doctor'],"IdUsuario"=>$Resultado['id_usuario'],"Especialidad"=>$Resultado['especialidad'],"Estado"=>$Resultado['estado'],"Nombre"=>$Resultado['nombre']));

        }

        return $AllMedicos;

    }


    public function ConsultarMedicoByEspecialidad($especialidad){

        $SQL = mysqli_query($this->Conexion,"SELECT * FROM doctores dc INNER JOIN especialidades ed ON dc.id_espcialidad=ed.id_especialidad INNER JOIN usuario us ON dc.id_usuario=us.id_usuario  WHERE dc.id_especialidad='$especialidad'");
        $MedicosEspecialidad = array();

        while($Resultado = mysqli_fetch_array($SQL)){

            array_push($MedicosEspecialidad,array("IdDoctor"=>$Resultado['id_doctor'],"IdUsuario"=>$Resultado['id_usuario'],"Especialidad"=>$Resultado['especialidad'],"Estado"=>$Resultado['estado'],"Nombre"=>$Resultado['nombre']));

        }

        return $MedicosEspecialidad;

    }

    public function CMEspecialidadActivo($especialidad){

        $SQL = mysqli_query($this->Conexion,"SELECT * FROM doctores dc INNER JOIN especialidades ed ON dc.id_especialidad=ed.id_especialidad INNER JOIN usuario us ON dc.id_usuario=us.id_usuario  WHERE dc.id_especialidad='$especialidad' AND dc.estado='Activo'");
        $MedicosEspecialidadOn = array();

        while($Resultado = mysqli_fetch_array($SQL)){

            array_push($MedicosEspecialidadOn,array("IdDoctor"=>$Resultado['id_doctor'],"IdUsuario"=>$Resultado['id_usuario'],"Especialidad"=>$Resultado['especialidad'],"Estado"=>$Resultado['estado'],"Nombre"=>$Resultado['nombre']));

        }

        return $MedicosEspecialidadOn;

    }

    public function ContarMEspecialidadActivo($especialidad){

        $SQL = mysqli_query($this->Conexion,"SELECT COUNT(*) as total FROM doctores dc INNER JOIN especialidades ed ON dc.id_especialidad=ed.id_especialidad INNER JOIN usuario us ON dc.id_usuario=us.id_usuario  WHERE dc.id_especialidad='$especialidad' AND dc.estado='Activo'");
        $MedicosEspecialidadOn = array();

        if($SQL){

            $resultado = mysqli_fetch_assoc($SQL);
            $totalDoctores = $resultado['total'];
            
        }

        return $totalDoctores;

    }


    public function EspecialidadPorCita($tipocita){

        $SQL = mysqli_query($this->Conexion,"SELECT * FROM tcita_especialidad WHERE id_tcita='$tipocita'");
        
        if($Resultado = mysqli_fetch_array($SQL)){

            return $Resultado['id_especialidad'];

        }

        return null;

    }


    public function ConsultarEspecialidadByID($idEspecialidad){

        $SQL = mysqli_query($this->Conexion,"SELECT * FROM especialidades WHERE id_especialidad='$idEspecialidad'");

        if($Resultado = mysqli_fetch_array($SQL)){

            return $Resultado["especialidad"];

        }

        return null;

    }

    public function ValidarExistenciaCita($idNodo){

        $SQL = mysqli_query($this->Conexion,"SELECT * FROM citas_agendadas WHERE id_preagendamiento='$idNodo'");

        if(mysqli_num_rows($SQL)>0){

            return true;

        }

        return false;

    }

}

?>