<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medpriority ADMIN</title>
    <link rel="stylesheet" href="../Css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
<!-- -------------------------------MODAL------------------------------------------ -->

<?php
    require_once 'conexion.php';

    $bruh = "SELECT * FROM usuario WHERE id_rol='3' OR id_rol='2'";   //jiji
    $q = mysqli_query( $conn, $bruh );
        if(mysqli_num_rows($q)>0){
            while($ff =mysqli_fetch_assoc($q)){
                $modalId = 'modal_' . $ff['id_usuario'];
                $identi = $ff['id_usuario'];

                // --------------------------------------
?>

<div class="modal" id="<?php echo $modalId?>" data-form="<?php echo $modalId?>">
    <div class="modal-header">
        <span><?php echo htmlspecialchars($ff['nombre'])?></span>
        <span><?php echo htmlspecialchars($identi)?></span>
        <button id=chao data-close-button class="close-button">&times;</button>
    </div>
    
    <div class="modal-body">
        <div class="edit-modal">Tipo de Documento
            <input type="text" required name=m_id_type value="<?php echo htmlspecialchars($ff['tipo_documento'])?>">
        </div>
        <div class="edit-modal">Numero de Documento
            <input type="text" disabled required name=m_id value="<?php echo htmlspecialchars($ff['id_usuario'])?>">
        </div>
        <div class="edit-modal">Nombre
            <input type="text" required name=m_name value="<?php echo htmlspecialchars($ff['nombre'])?>">
        </div>
        <div class="edit-modal">Edad
            <input type="text" required name=m_age value="<?php echo htmlspecialchars($ff['edad'])?>">
        </div>
        <div class="edit-modal">Sexo
            <input type="text" required name=m_sexmoneyfeelingsdie value="<?php echo htmlspecialchars($ff['genero'])?>">
        </div>
        <div class="edit-modal">Direccion
            <input type="text" required name=m_address value="<?php echo htmlspecialchars($ff['direccion'])?>">
        </div>
        <div class="edit-modal">Telefono
            <input type="text" required name=m_pickupyophonebaby value="<?php echo htmlspecialchars($ff['telefono'])?>">
        </div>
        <div class="edit-modal">Correo Electronico
            <input type="email" required name=m_email value="<?php echo htmlspecialchars($ff['correo'])?>">
        </div>
        <div class="edit-modal">Tipo de Afiliacion
            <input type="text" required name=m_afi value="<?php echo htmlspecialchars($ff['tipo_afiliacion'])?>">
        </div>
        <div class="modal-savebutton">
            <input type="hidden" name="id_a_cambiar">
            <button class="save-button"  data-modal-id="<?php echo $modalId;?>">Aplicar cambios</button>
        </div>
    </div>
    
            </div>
<?php
            }
        }
?>
<div id="overlay"></div>

<!-- -------------------------------MODAL CITAS------------------------------------------ -->

<?php
    require_once 'conexion.php';

    $mod_cita = "SELECT * FROM citas_agendadas ca
    INNER JOIN preagendamiento p ON ca.id_preagendamiento = p.id_preagendamiento 
    INNER JOIN usuario u ON p.id_usuario = u.id_usuario
    INNER JOIN tipo_cita tc ON p.id_tipo_cita = tc.id
    INNER JOIN horarios h ON h.id_horario = p.hora_inicio";   //cita   //  TEST MODAL CITAS

    $que = mysqli_query( $conn, $mod_cita );
        if(mysqli_num_rows($que)>0){
            while($mcita =mysqli_fetch_assoc($que)){
                $modalcId = 'modalci_' . $mcita['id_usuario'];
                $identici = $mcita['id_usuario'];

                // --------------------------------------
?>

<div class="modal" id="<?php echo $modalcId?>">
    <div class="modal-header">
        <span><?php echo htmlspecialchars($mcita['nombre'])?></span>
        <span><?php echo htmlspecialchars($identici)?></span>
        <button id=chao data-close-button class="close-button">&times;</button>
    </div>
    
    <div class="modal-body">
        <div class="edit-modal">Identificacion Paciente
            <input type="text" disabled required name=mc_idpaciente value="<?php echo htmlspecialchars($mcita['id_usuario'])?>">
        </div>
        <div class="edit-modal">Nombre Paciente
            <input type="text" disabled required name=mc_namepaciente value="<?php echo htmlspecialchars($mcita['nombre'])?>">
        </div>
        <div class="edit-modal">Tipo de Cita
            <input type="text" required name=mc_tipocita value="<?php echo htmlspecialchars($mcita['enombre'])?>">
        </div>
        <div class="edit-modal">Fecha (preagendamiento)
            <input type="text" required name=mc_date value="<?php echo htmlspecialchars($mcita['fecha'])?>">
        </div>
        <div class="edit-modal">Hora inicio (preagendamiento)
            <input type="text" disabled required name=mc_start_time value="<?php echo htmlspecialchars($mcita['hora_inicio'])?>">
        </div>
        <div class="edit-modal">Hora fin (preagendamiento)
            <input type="text" required name=mc_end_time value="<?php 
            $a = $mcita['hora_fin'];
            
            $mod_citah = "SELECT * FROM  horarios WHERE id_horario=$a";   //cita   //  TEST MODAL CITAS
        
            $quec = mysqli_query( $conn, $mod_citah );
            if(mysqli_num_rows($quec)>0){
                while($citahora = mysqli_fetch_assoc($quec)){
                    echo htmlspecialchars($citahora['hora_inicio']);
                }
            }
            
            ?>">
        </div>
        <div class="edit-modal">Valoracion
            <input type="text" required name=mc_valor value="<?php echo htmlspecialchars($mcita['valoracion'])?>">
        </div>
        
        <div class="modal-savebutton">
            <input type="hidden" name="id_a_cambiar">
            <button class="save-button"  data-modal-id="<?php echo $modalcId;?>">Aplicar cambios</button>
        </div>
    </div>
    
            </div>
<?php
            }
        }
?>
<div id="overlay"></div>

    <section class="general_todo">
        <div class="conheader">  <!-- contenedor header o barra principal -->


            <div class="logo"><!-- contenedor del logo y la letras del logo -->
                <div class="img_logo"></div>
                <div class="letras_logo">
                    <p>MedPriority</p>
                </div>
            </div>

            <div class="datos_barra">
                <p>ADMIN</p>

                <div class="img_notificaion"></div>
    
                <div class="img_usuario"></div>
            </div>

        </div>

        <div class="congeneral"><!--contendor 2 general para el menu y los formularios -->

            <div class="con_menu"><!-- contenedor del menu -->
                <div class="cont_menu_sub">


                
                <div class="inicio"><!-- contenedores de el menu -->
                    <a href="#inicio">
                        <div class="con_imagen" id="icono"> <img src="../Img/casa.png" alt=""></div>
                    </a>
                    <a href="#inicio" class="inicio">
                        <div class="con_opcion">
                            <h4>Inicio</h4>
                        </div>
                    </a>
                </div>


                <!-- ---------------------------------------------- -->
                <div class="secion1">
                    <div class="seci_notificaiones">
                        <h2>Gestionar medicos</h2>
                    </div>
                    <div class="linecita">
                        <hr>
                    </div>
                </div>
                <div class="inicio">
                    <a href="#reg_med">
                        <div class="con_imagen" id="icono"> <img src="../Img/resume.png" alt=""></div>
                    </a>
                    <a href="#reg_med" class="inicio">
                        <div class="con_opcion">
                            <h4>Registrar medico</h4>
                        </div>
                    </a>
                </div>

                <div class="inicio">
                    <a href="#panel_med">
                        <div class="con_imagen" id="icono"> <img src="../Img/customer.png" alt=""></div>
                    </a>
                    <a href="#panel_med" class="inicio">
                        <div class="con_opcion">
                            <h4>Panel medicos</h4>
                        </div>
                    </a>
                </div>

                <!-- ---------------------------------------------- -->
                <div class="secion1">
                    <div class="seci_notificaiones">
                        <h2>Gestionar pacientes</h2>
                    </div>
                    <div class="linecita">
                        <hr>
                    </div>
                </div>
                <div class="inicio">
                    <a href="#reg_pac">
                        <div class="con_imagen" id="icono"> <img src="../Img/historiaclinica.png" alt=""></div>
                    </a>
                    <a href="#reg_pac" class="inicio">
                        <div class="con_opcion">
                            <h4>Registrar paciente</h4>
                        </div>
                    </a>
                </div>

                <div class="inicio">
                    <a href="#panel_pac">
                        <div class="con_imagen" id="icono"> <img src="../Img/user_panel.png" alt=""></div>
                    </a>
                    <a href="#panel_pac" class="inicio">
                        <div class="con_opcion">
                            <h4>Panel pacientes</h4>
                        </div>
                    </a>
                </div>

                <!-- ---------------------------------------------- -->
                <div class="secion1">
                    <div class="seci_notificaiones">
                        <h2>Gestionar citas</h2>
                    </div>
                    <div class="linecita">
                        <hr>
                    </div>
                </div>
                <div class="inicio">
                    <a href="#reg_cita">
                        <div class="con_imagen" id="icono"> <img src="../Img/historiaclinica.png" alt=""></div>
                    </a>
                    <a href="#reg_cita" class="inicio">
                        <div class="con_opcion">
                            <h4>Registrar cita</h4>
                        </div>
                    </a>
                </div>

                <div class="inicio">
                    <a href="#panel_cita">
                        <div class="con_imagen" id="icono"> <img src="../Img/user_panel.png" alt=""></div>
                    </a>
                    <a href="#panel_cita" class="inicio">
                        <div class="con_opcion">
                            <h4>Panel citas</h4>
                        </div>
                    </a>
                </div>

                <!-- ---------------------------------------------- -->
                <div class="secion1">
                    <div class="seci_notificaiones">
                        <h2>Gestionar patologias</h2>
                    </div>
                    <div class="linecita">
                        <hr>
                    </div>
                </div>
                <div class="inicio">
                    <a href="#reg_pato">
                        <div class="con_imagen" id="icono"> <img src="../Img/historiaclinica.png" alt=""></div>
                    </a>
                    <a href="#reg_pato" class="inicio">
                        <div class="con_opcion">
                            <h4>Registrar patologia</h4>
                        </div>
                    </a>
                </div>

                <div class="inicio">
                    <a href="#panel_pato">
                        <div class="con_imagen" id="icono"> <img src="../Img/user_panel.png" alt=""></div>
                    </a>
                    <a href="#panel_pato" class="inicio">
                        <div class="con_opcion">
                            <h4>Panel patologias</h4>
                        </div>
                    </a>
                </div>

                <!-- ----------------------HERE------------------------ -->
                <!-- ----------------------HERE------------------------ -->
                <!-- ----------------------HERE------------------------ -->
                <!-- ----------------------HERE------------------------ -->
                <div class="secion1">
                    <div class="seci_notificaiones">
                        <h2>Gestionar tipos cita</h2>
                    </div>
                    <div class="linecita">
                        <hr>
                    </div>
                </div>
                <div class="inicio">
                    <a href="#reg_tcita">
                        <div class="con_imagen" id="icono"> <img src="../Img/historiaclinica.png" alt=""></div>
                    </a>
                    <a href="#reg_tcita" class="inicio">
                        <div class="con_opcion">
                            <h4>Registrar tipo de cita</h4>
                        </div>
                    </a>
                </div>

                <div class="inicio">
                    <a href="#panel_tcita">
                        <div class="con_imagen" id="icono"> <img src="../Img/user_panel.png" alt=""></div>
                    </a>
                    <a href="#panel_tcita" class="inicio">
                        <div class="con_opcion">
                            <h4>Panel tipo de citas</h4>
                        </div>
                    </a>
                </div>

                <!-- ---------------------------------------------- -->
                <div class="secion1">
                    <div class="seci_notificaiones">
                        <h2>Gestionar especialidades</h2>
                    </div>
                    <div class="linecita">
                        <hr>
                    </div>
                </div>
                <div class="inicio">
                    <a href="#reg_especi">
                        <div class="con_imagen" id="icono"> <img src="../Img/historiaclinica.png" alt=""></div>
                    </a>
                    <a href="#reg_especi" class="inicio">
                        <div class="con_opcion">
                            <h4>Registrar especialidades</h4>
                        </div>
                    </a>
                </div>

                <div class="inicio">
                    <a href="#panel_especi">
                        <div class="con_imagen" id="icono"> <img src="../Img/user_panel.png" alt=""></div>
                    </a>
                    <a href="#panel_especi" class="inicio">
                        <div class="con_opcion">
                            <h4>Panel especialidades</h4>
                        </div>
                    </a>
                </div>


                <!-- ---------------------------------------------- -->
                <div class="secion1">
                    <div class="seci_notificaiones">
                        <h2>Gestionar roles</h2>
                    </div>
                    <div class="linecita">
                        <hr>
                    </div>
                </div>

                <div class="inicio">
                    <a href="#panel_roles">
                        <div class="con_imagen" id="icono"> <img src="../Img/user_panel.png" alt=""></div>
                    </a>
                    <a href="#panel_roles" class="inicio">
                        <div class="con_opcion">
                            <h4>Panel roles</h4>
                        </div>
                    </a>
                </div>

                </div>
            </div> 


            <!--   contenedor main donde se recargaran los contenedores  -->
            <main>

                    <div id="inicio" class="contain_main">
                        <div class="cont_titulo">
                            <p>Home</p>
                        </div>
                        
                        <div class="cont_general_all">
                            since youve been like this.
                            <BR>
                            baby i dont wanna really be in like this.
                        </div>
                    </div>

                    <!-- ---------------REGISTRO MEDICOS---------------- -->
                    <div id="reg_med" class="contain_main">
                        <div class="cont_titulo">
                            <p>Registrar medico</p>
                        </div>
                        
                            <div class="cont_general_all">

                                <div class="survey-container">
                                    <div class="question">
                                        <label for="id-number">No. Identificación</label>
                                        <input type="text" name="doc_id-number" required>
                                    </div>
                                    <div class="question">
                                        <label for="name">Nombre</label>
                                        <input type="text" name="doc_name" required>
                                    </div>
                                    <div class="question">
                                        <label for="age">Edad</label>
                                        <input type="text" name="doc_age" required>
                                    </div>
                                    <div class="question">
                                        <label for="phone-number">Teléfono</label>
                                        <input type="text" name="doc_phone-number" required>
                                    </div>
                                    <div class="question">
                                        <label for="email">Correo Electronico</label>
                                        <input type="email" name="doc_email" required>
                                    </div>
                                    <div class="question">
                                        <label for="sex">Sexo</label>
                                        <input type="text" name="doc_sex" required>
                                    </div>
                                    <div class="save">
                                        <div class="save-button">
                                        <a href="#" id="guardar-button">Guardar</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                    </div>

                    <!-- --------------PANEL MEDICOS----------------- -->
                    <div id="panel_med" class="contain_main">
                        <div class="cont_titulo">
                            <p>Panel medicos</p>
                        </div>
                        <div class="cont_general_all">

                            <div class="panel-main" id="contain_tablas"> 
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Identificación</th>
                                        <th>Nombres</th>
                                        <th>Edad</th>
                                        <th>Teléfono</th>
                                        <th style="width: 15%;"></th>
                                        <th style="width: 15%;"></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        
                                        require_once 'conexion.php';

                                        $sql = "SELECT * FROM usuario WHERE id_rol='3'";    //medico
                                        $consulta = mysqli_query($conn, $sql);
                                        if(mysqli_num_rows($consulta)>0){
                                            while($fila =mysqli_fetch_assoc($consulta)){
                                        ?>
                                        <tr id=table_row_<?php echo $fila['id_usuario']?>>
                                            <td> <?php echo $fila['id_usuario'];?></td>
                                            <td> <?php echo $fila['nombre'];?></td>
                                            <td> <?php echo $fila['edad'];?></td>
                                            <td> <?php echo $fila['telefono'];?></td>
                                            <td><button data-modal-target="#modal_<?php echo $fila['id_usuario'];?>">Detalles</button></td>
                                            <td><button class="delete" data-user-id="<?php echo $fila['id_usuario'];?>" data-role='3'>Eliminar</button></td>
                                        </tr>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- --------------REGISTRO PACIENTES-------------- -->
                    <div id="reg_pac" class="contain_main">
                        <div class="cont_titulo">
                            <p>Registrar paciente</p>
                        </div>
                            <div class="cont_general_all">

                                    <div class="pat-survey-container">
                                        <div class="pat-question">
                                            <label for="pat-id-type">Tipo de Documento</label>
                                            <select name="pat-id-type" id="pat-id-type">
                                                <option value="null"></option>
                                                <option value="Cedula de Ciudadania">Cédula de Ciudadanía</option>
                                                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                                                <option value="Registro Civil">Registro Civil</option>
                                                <option value="Pasaporte">Pasaporte</option>
                                            </select>
                                        </div>
                                        <div class="pat-question">
                                            <label for="pat-id-number">No. Documento</label>
                                            <input type="text" name="pat_id-number" required>
                                        </div>
                                        <div class="pat-question">
                                            <label for="pat-name">Nombres</label>
                                            <input type="text" name="pat_name" required>
                                        </div>
                                        <div class="pat-question">
                                            <label for="pat-email">Correo Electronico</label>
                                            <input type="text" name="pat_email" required>
                                        </div>
                                        <div class="pat-question">
                                            <label for="pat-age">Edad</label>
                                            <input type="text" name="pat_age" required>
                                        </div>
                                        <div class="pat-question">
                                            <label for="pat-phone-number">Teléfono</label>
                                            <input type="text" name="pat_phone-number" required>
                                        </div>
                                        <div class="pat-question">
                                            <label for="pat-sex">Genero</label>
                                            <input type="text" name="pat_sex" required>
                                        </div>
                                        <div class="pat-question">
                                            <label for="pat-residence-area">Tipo de Afiliacion</label>
                                            <select name="pat-afi" id="pat-afi">
                                                <option value="null"></option>
                                                <option value="Contributivo">Contributivo</option>
                                                <option value="Subsidiado">Subsidiado</option>
                                            </select>
                                        </div>
                                        <div class="save-patient">
                                            <div class="save-pat-button">
                                                <a href="#" id="paciente-nuevo">Guardar</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                    </div>

                    <!-- ------------PANEL PACIENTES--------------- -->
                    <div id="panel_pac" class="contain_main">
                        <div class="cont_titulo">
                            <p>Panel pacientes</p>
                        </div>
                            <div class="cont_general_all">
                            <div class="patient-main" id="contain_tablas">
                        <table>
                            <thead>
                            <tr>
                                <th>Identificación</th>
                                <th>Nombres</th>
                                <th>Edad</th>
                                <th>Género</th>
                                <th style="width: 15%;"></th>
                                <th style="width: 15%;"></th>
                            </tr>
                            </thead>
                            
                            <tbody>

                            <?php

                            require_once  'conexion.php';
 
                            $sql2 = "SELECT * FROM usuario WHERE id_rol='2'";   //paciente
                            $query = mysqli_query($conn, $sql2 );
                            if(mysqli_num_rows($query)>0){
                                while($row = mysqli_fetch_assoc($query)){

                            ?>
                                <tr id=table_row_<?php echo $row['id_usuario']?>>
                                    <td><?php echo $row['id_usuario'];?></td>
                                    <td><?php echo $row['nombre'];?></td>
                                    <td><?php echo $row['edad'];?></td>
                                    <td><?php echo $row['genero'];?></td>
                                    <td><button data-modal-target="#modal_<?php echo $row['id_usuario'];?>">Detalles</button></td>
                                    <td><button class="delete" data-user-id="<?php echo $row['id_usuario'];?>" data-role='2'>Eliminar</button></td>
                                </tr>
                                    
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                        </div>

                    </div>

                    <!-- ---------------REGISTRO CITAS---------------- -->
                    <div id="reg_cita" class="contain_main">
                        <div class="cont_titulo">
                            <p>Registrar citas</p>
                        </div>

                        <div class="cont_general_all">
                        
                     <div class="separar"></div>
                        <div class="preguntas_formulario">
                          <div class="cont_preguntas"> 

                            <label for="identificacion">Identificación:</label>
                            <input type="text" id="identificacion" name="identificacion">

                         </div>

                          <div class="cont_preguntas">
                            <label for="tipo_identificacion">Tipo de Identificación:</label>
                            <input type="text" id="tipo_identificacion" name="tipo_identificacion">
                        
                        </div>
                          <div class="cont_preguntas"> 
                            <label for="nombre">Nombres:</label>
                            <input type="text" id="nombre" name="nombre">
                        
                        </div>



                        </div>
                        <div class="preguntas_formulario">

                            <div class="cont_preguntas"> 

                                <label for="edad">Edad:</label>
                                <input type="number" id="edad" name="edad">
                             </div>
    
                              <div class="cont_preguntas">
                                <label for="tipo_afiliacion">Tipo de Afiliación:</label>
                                <input type="text" id="tipo_afiliacion" name="tipo_afiliacion">
                            
                            </div>
                              <div class="cont_preguntas"> 
                                <label for="trabajo">Trabajo:</label>
                                <input type="text" id="trabajo" name="trabajo">
                            
                            </div>




                        </div>
                        <div class="preguntas_formulario">

                            <div class="cont_preguntas">
                                <label for="enfermedad">Enfermedad:</label>
                                <input type="text" id="enfermedad" name="enfermedad">
                            
                            </div>
                              <div class="cont_preguntas"> 
                                <label for="nivel_gravedad">Nivel de Gravedad:</label>
                                <input type="text" id="nivel_gravedad" name="nivel_gravedad">
                            
                            </div>
                            <div class="cont_preguntas"></div>


                        </div>

                        <div class="preguntas_formularioo"> 
                            <div class="cont_preguntas">
                                <label for="tipo_cita">Tipo de Cita:</label>
                                <select id="tipo_cita" name="tipo_cita">
                                    <option value="normal">Normal</option>
                                    <option value="urgente">Urgente</option>
                                </select>

                            </div>
                            <div class="cont_preguntas">
                                <label for="fecha">Fecha:</label>
                                <input type="time" id="fecha" name="fecha">


                            </div>
                            <div class="cont_preguntas"> <label for="hora_inicio">Hora de Inicio:</label>
                                <input type="time" id="hora_inicio" name="hora_inicio">
                            </div>
                            <div class="cont_preguntas">
                                <label for="hora_final">Hora Final:</label>
                                <input type="time" id="hora_final" name="hora_final">

                            </div>
                            <div class="cont_preguntas">
                                <label for="hora_final">Agregar Cita:</label>
                                <img src="../Img/logo.png" alt="">

                            </div>

                        </div>

                        </div>    
                    </div>

                    <!-- --------------PANEL CITAS----------------- -->
                    <div id="panel_cita" class="contain_main">
                        <div class="cont_titulo">
                            <p>Panel citas</p>
                        </div>
                        <div class="cont_general_all">

                            <div class="panel-main" id="contain_tablas"> 
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Nombre Paciente</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Tipo Cita</th>
                                        <th style="width: 15%;"></th>
                                        <th style="width: 15%;"></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        
                                        require_once 'conexion.php';

                                        $sql3 = "SELECT * FROM citas_agendadas 
                                                INNER JOIN preagendamiento ON citas_agendadas.id_preagendamiento = preagendamiento.id_preagendamiento 
                                                INNER JOIN usuario ON preagendamiento.id_usuario = usuario.id_usuario
                                                INNER JOIN tipo_cita ON preagendamiento.id_tipo_cita = tipo_cita.id";   //cita
                                        $cita_query = mysqli_query($conn, $sql3);
                                        if(mysqli_num_rows($cita_query)>0){
                                            while($modalci = mysqli_fetch_assoc($cita_query)){
                                        ?>
                                        <tr id=table_row_<?php echo $modalci['id_usuario']?>>
                                            <td> <?php echo $modalci['nombre'];?></td>
                                            <td> <?php echo $modalci['FechaAsignada'];?></td>
                                            <td> <?php echo $modalci['HoraAsignado'];?></td>
                                            <td> <?php echo $modalci['enombre'];?></td>
                                            <td><button data-modal-target="#modalci_<?php echo $modalci['id_usuario'];?>">Detalles</button></td>
                                            <td><button class="delete" data-user-id="<?php echo $modalci['id_usuario'];?>" data-role='3'>Eliminar</button></td>
                                        </tr>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- ---------------REGISTRO PATOLOGIA---------------- -->
                    <div id="reg_pato" class="contain_main">
                        <div class="cont_titulo">
                            <p>Registrar patologias</p>
                        </div>

                        <div class="cont_general_all">
                        

                        </div>    
                    </div>

                    <!-- --------------PANEL PATOLOGIAS----------------- -->
                    <div id="panel_pato" class="contain_main">
                        <div class="cont_titulo">
                            <p>Panel patologias</p>
                        </div>
                        <div class="cont_general_all">

                            <div class="panel-main" id="contain_tablas"> 
                                <table>
                                    <thead>
                                    <tr>
                                        <th>ID Patologia</th>
                                        <th>Nombre Patologia</th>
                                        <th>Puntuacion</th>
                                        <th style="width: 15%;"></th>
                                        <th style="width: 15%;"></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        
                                        require_once 'conexion.php';

                                        $sql4 = "SELECT * FROM patologias";   //patologias
                                        $cita_query = mysqli_query($conn, $sql4);
                                        if(mysqli_num_rows($consulta)>0){
                                            while($pato =mysqli_fetch_assoc($cita_query)){
                                        ?>
                                        <tr id=table_row_<?php echo $pato['id_patologia']?>>
                                            <td> <?php echo $pato['id_patologia'];?></td>
                                            <td> <?php echo $pato['nombre_patologia'];?></td>
                                            <td> <?php echo $pato['puntuacion'];?></td>
                                            <td><button data-modal-target="#modal_<?php echo $pato['id_patologia'];?>">Detalles</button></td>
                                            <td><button class="delete" data-user-id="<?php echo $pato['id_patologia'];?>">Eliminar</button></td>
                                        </tr>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- ---------------REGISTRO TIPO CITAS---------------- -->
                    <div id="reg_tcita" class="contain_main">
                        <div class="cont_titulo">
                            <p>Registrar tipo de citas</p>
                        </div>

                        <div class="cont_general_all">
                        

                        </div>    
                    </div>

                    <!-- --------------PANEL TIPO CITAS----------------- -->
                    <div id="panel_tcita" class="contain_main">
                        <div class="cont_titulo">
                            <p>Panel tipo de citas</p>
                        </div>
                        <div class="cont_general_all">

                            <div class="panel-main" id="contain_tablas"> 
                                <table>
                                    <thead>
                                    <tr>
                                        <th>ID Tipo Cita</th>
                                        <th>Tipo de Cita</th>
                                        <th style="width: 15%;"></th>
                                        <th style="width: 15%;"></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        
                                        require_once 'conexion.php';

                                        $sql5 = "SELECT * FROM tipo_cita";   //tipo citas
                                        $consulta = mysqli_query($conn, $sql5);
                                        if(mysqli_num_rows($consulta)>0){
                                            while($tcita =mysqli_fetch_assoc($consulta)){
                                        ?>
                                        <tr id=table_row_<?php echo $tcita['id']?>>
                                            <td> <?php echo $tcita['id'];?></td>
                                            <td> <?php echo $tcita['enombre'];?></td>
                                            <td><button data-modal-target="#modal_<?php echo $tcita['id'];?>">Detalles</button></td>
                                            <td><button class="delete" data-user-id="<?php echo $tcita['id'];?>">Eliminar</button></td>
                                        </tr>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- ---------------REGISTRO ESPECIALIDADES---------------- -->
                    <div id="reg_especi" class="contain_main">
                        <div class="cont_titulo">
                            <p>Registrar especialidades</p>
                        </div>

                        <div class="cont_general_all">
                        

                        </div>    
                    </div>

                    <!-- --------------PANEL ESPECIALIDADES----------------- -->
                    <div id="panel_especi" class="contain_main">
                        <div class="cont_titulo">
                            <p>Panel especialidades</p>
                        </div>
                        <div class="cont_general_all">

                            <div class="panel-main" id="contain_tablas"> 
                                <table>
                                    <thead>
                                    <tr>
                                        <th>ID Especialidad</th>
                                        <th>Nombre Especialidad</th>
                                        <th style="width: 15%;"></th>
                                        <th style="width: 15%;"></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        
                                        require_once 'conexion.php';

                                        $sql6 = "SELECT * FROM especialidades";   //especialidades
                                        $consulta = mysqli_query($conn, $sql6);
                                        if(mysqli_num_rows($consulta)>0){
                                            while($especi =mysqli_fetch_assoc($consulta)){
                                        ?>
                                        <tr id=table_row_<?php echo $especi['id_especialidad']?>>
                                            <td> <?php echo $especi['id_especialidad'];?></td>
                                            <td> <?php echo $especi['especialidad'];?></td>
                                            <td><button data-modal-target="#modal_<?php echo $especi['id_especialidad'];?>">Detalles</button></td>
                                            <td><button class="delete" data-user-id="<?php echo $especi['id_especialidad'];?>">Eliminar</button></td>
                                        </tr>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- --------------PANEL ROLES----------------- -->
                    <div id="panel_roles" class="contain_main">
                        <div class="cont_titulo">
                            <p>Panel citas</p>
                        </div>
                        <div class="cont_general_all">

                            <div class="panel-main" id="contain_tablas"> 
                                <table>
                                    <thead>
                                    <tr>
                                        <th>ID Rol</th>
                                        <th>Nombre Rol</th>
                                        <th style="width: 15%;"></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        
                                        require_once 'conexion.php';

                                        $sql7 = "SELECT * FROM roles";   //patologias
                                        $consulta = mysqli_query($conn, $sql7);
                                        if(mysqli_num_rows($consulta)>0){
                                            while($roles =mysqli_fetch_assoc($consulta)){
                                        ?>
                                        <tr id=table_row_<?php echo $roles['id_rol']?>>
                                            <td> <?php echo $roles['id_rol'];?></td>
                                            <td> <?php echo $roles['nombre_rol'];?></td>
                                            <td><button class="delete" data-user-id="<?php echo $roles['id_rol'];?>">Eliminar</button></td>
                                        </tr>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

            </main>
        </div>
    </section>

</body>

<!-- <form action="" id="none" style="display:none">
    <input type="hidden" name="non">
</form> -->
<script src="../Js/sql.js"></script>
</html>