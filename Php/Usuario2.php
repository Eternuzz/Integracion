<?php 
    session_start(); 
    require_once ('conexion.php');


    if($_SESSION["id"]==null){

        echo "<script>window.location.href = '../index.php'</script>";
    
    }
    

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>medpriority</title>
    <link rel="stylesheet" href="../Css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <section class="general_todo">
        <div class="conheader"> <!-- contenedor header o barra principal -->


            <div class="logo"><!-- contenedor del logo y la letras del logo -->
                <div class="img_logo"></div>
                <div class="letras_logo">
                    <p>MedPriority</p>
                </div>
            </div>

            <div class="datos_barra">
                <?php echo htmlspecialchars($_SESSION['nombre']) ?>

                <div class="img_notificaion"></div>

                <div class="img_usuario"></div>
            </div>

        </div>

        <div class="congeneral"><!--contendor 2 general para el menu y los formularios -->

            <div class="contenedor_hamburguesa">
                <button id="toggleMenu">☰</button>
            </div>

            <div class="con_menu"><!-- contenedor del menu -->


                <div class="cont_menu_sub">

                    <div id="closeMenu">✕</div>

                    <div class="inicio"><!-- contenedores de el menu -->
                        <a href="#inicio">
                            <div class="con_imagen" id="icono"> <img src="../Img/casa.png" alt=""></div>
                        </a>
                        <a href="#inicio" class="inicio">
                            <div class="con_opcion" id="incio">
                                <h4>inicio</h4>
                            </div>
                        </a>

                    </div>



                    <div class="secion1">
                        <div class="seci_notificaiones">
                            <h2>Sesion Notificaciones</h2>
                        </div>
                        <div class="linecita">
                            <hr>
                        </div>
                    </div>
                    <div class="inicio">
                        <a href="#notificaciones">
                            <div class="con_imagen" id="icono"> <img src="../Img/alarma.png" alt=""></div>
                        </a>
                        <a href="#notificaciones" class="inicio" onclick="noti()">
                            <div class="con_opcion" id="notificacionet">
                                <h4>Notificaciones</h4>
                            </div>
                        </a>
                    </div>


                    <div class="secion1">
                        <div class="seci_notificaiones">
                            <h2>Sesion Historia Clinica</h2>
                        </div>
                        <div class="linecita">
                            <hr>
                        </div>
                    </div>
                    <div class="inicio">
                        <a href="#historialcitas">
                            <div class="con_imagen" id="icono"> <img src="../Img/historiaclinica.png" alt=""></div>
                        </a>
                        <a href="#historialcitas" class="inicio">
                            <div class="con_opcion" id="historia_clinica">
                                <h4>Historia Clinica</h4>
                            </div>
                        </a>
                    </div>


                    <div class="secion1">
                        <div class="seci_notificaiones">
                            <h2>Sesion Citas</h2>
                        </div>
                        <div class="linecita">
                            <hr>
                        </div>
                    </div>
                    <div class="inicio">
                        <div class="con_imagen" id="icono"> <img src="../Img/cita.png" alt=""></div>
                        <div class="con_opcion" id="opciones">

                            <nav> 
                                <ul>
                                <li id="citta"> citas</li>
                                <ul>
                                    <li id="agrega"> <a href="#AgregarCita">Agregar cita</a></li>
                                    <li id="historial"> <a href="#historialcitasS">Historial  Citas</a> </li>
                                    <li id="estado"> <a href="#estadocita"> Estado Cita </a></li>
                                </ul>
                            </ul>
                               </nav>
    


                        </div>
                    </div>
                </div>
            </div>


            <!--   contenedor main donde se recargaran los contenedores  -->
            <main>

                <div id="inicio" class="historialcita">
                    <div class="cont_titulo">Home</div>

                    <div class="cont_general_all"> </div>
                </div>


                <div id="notificaciones" class="notificacioness">

                    <div class="cont_titulo">Notificaciones</div>

                    <div class="cont_general_all" >
                        <div id="contain_notificaciones">

                        <div class="card">

                            <div class="titulo_card"></div>
                            <div class="mensaje_card"></div>
                            <div class="botones_card">
                                <button>Aceptar</button>
                                <button>Rechazar</button>
                            </div>

                        </div>
                        </div>



                    </div>

                </div>


                <div id="historialcitas" class="historialcita">

                    <div class="cont_titulo"> historia clinica</div>

                    <div class="cont_general_all"></div>

                </div>


                <div id="AgregarCita" class="historialcita">
                

                    <div class="cont_titulo"> Agregar Cita</div>

                    <div class="cont_general_all">
                        <div class="separar"></div>
                        <div class="preguntas_formulario">
                            <div class="cont_preguntas">

                                <label for="identificacion" id="identificacion">Identificación:</label>
                                <input type="text" id="identificacion" name="identificacion" value="<?php echo $_SESSION['id'] ?>">

                            </div>

                            <div class="cont_preguntas" id="tipo_identificacion">
                                <label for="tipo_identificacion">Tipo de Identificación:</label>
                                <input type="text" id="tipo_identificacion" name="tipo_identificacion" value="<?php echo $_SESSION['tipo_documento'] ?>">

                            </div>
                            <div class="cont_preguntas" id="nombre">
                                <label for="nombre">Nombres:</label>
                                <input type="text" id="nombre" name="nombre" value="<?php echo $_SESSION['nombre_completo'] ?>">

                            </div>



                        </div>
                        <div class="preguntas_formulario">

                            <div class="cont_preguntas">
                            <form action="procesar_cita.php" method="post" class="contenedor_formulario" id="formulario_general">
                                <label for="edad" id="edad">Edad:</label>
                                <input type="number" id="edad" name="edad" value="<?php echo $_SESSION['edad'] ?>">
                            </div>

                            <div class="cont_preguntas" id="tipo_afiliacion" >
                                <label for="tipo_afiliacion">Tipo de Afiliación:</label>
                                <input type="text" id="tipo_afiliacion" name="tipo_afiliacion" value="<?php echo $_SESSION['tipo_afiliacion'] ?>">

                            </div>
                            <div class="cont_preguntas" id="trabajo">
                                <label for="trabajo">Trabajo:</label>
                                <input type="text" id="trabajo" name="trabajo" value="<?php echo $_SESSION['estado'] ?>">

                            </div>




                        </div>
                        <div class="preguntas_formulario">

                            <div class="cont_preguntas" id="enfermedads">
                                <label for="enfermedad">Enfermedad:</label>
                                <input type="text" id="enfermedad" name="enfermedad" value="<?php echo $_SESSION['patologia'] ?>">

                            </div>
                            <div class="cont_preguntas" id="nivel_gravedad">
                                <label for="nivel_gravedad">Nivel de Gravedad:</label>
                                <input type="text" id="nivel_gravedad" name="nivel_gravedad" value="<?php echo $_SESSION['id'] ?>">

                            </div>



                        </div>

                        <div class="preguntas_formularioo">
                                <div class="cont_preguntas">
                                    <label for="tipo_cita">Tipo de Cita:</label>
                                    <select class="tipocita" name="tipocita">
                                        <?php
                                        $sql="SELECT * FROM tipo_cita";
                                        $consul= mysqli_query($conn,$sql);

                                            if($consul){
                                                while($desplegar= $consul->fetch_assoc()){
                                                    echo "<option value='".$desplegar['id']."'>".$desplegar['enombre']."</option>";
                                                }
                                            }
                                        ?>
                                    </select>

                                </div>
                            <div class="cont_preguntas" id="fecha">
                                <label for="fecha">Fecha:</label>
                                <input type="date" id="fecha" name="fecha">

                            </div>
                            <div class="cont_preguntas" id="hora_inicio">
                                <label for="hora_inicio">Hora de Inicio:</label>
                                <select name="hora_inicio" id="hora_rango1" required>
                                    <?php
                                        $sql="SELECT * FROM horarios WHERE EXTRACT(MINUTE FROM hora_inicio) IN (0, 30);";
                                        $consul2= mysqli_query($conn,$sql);

                                        if($consul2){
                                            while($desplegar2= $consul2->fetch_assoc()){
                                                echo "<option value='".$desplegar2['id_horario']."'>".$desplegar2['hora_inicio']."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="cont_preguntas" id="hora_final">
                                <label class="horas">Hora final:</label>
                                <select name="hora_fin" id="rango" required></select>
                            </div>

                            <div class="cont_preguntas">
                                <label for="hora_final" id="agregar">Agregar Cita:</label>
                                <img src="../Img/logo.png" alt="">

                            </div>

                        </div>
                        <div class="preguntas_formularioo">
                           
                            <div class="cont_preguntas" id="fecha2">
                                <label for="fecha">Fecha:</label>
                                <input type="date" id="fecha" name="fecha2">

                            </div>
                            <div class="cont_preguntas" id="hora_inicio">
                                <label for="hora_inicio">Hora de Inicio:</label>
                                <select name="hora_inicio_2" id="hora_rango2" required>
                                    <?php
                                        $sql="SELECT * FROM horarios WHERE EXTRACT(MINUTE FROM hora_inicio) IN (0, 30);";
                                        $consul2= mysqli_query($conn,$sql);

                                        if($consul2){
                                            while($desplegar3= $consul2->fetch_assoc()){
                                                echo "<option value='".$desplegar3['id_horario']."'>".$desplegar3['hora_inicio']."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="cont_preguntas" id="hora_final">
                                <label class="horas">Hora final:</label>
                                <select name="hora_fin_2" id="rango_2" required></select>
                            </div>


                        </div>
                        
                        <div class="cont_preguntass"> <button type="" class="submit-btn" id="solicitar">Enviar</button></div> 


                    </div>
                </form>
                </div>


                <div id="AgregarCita" class="historialcita">

                    <div class="cont_titulo"> Agregar Cita</div>

                    <div class="cont_general_all"></div>

                </div>

                
                <div id="historialcitasS" class="historialcita">

                    <div class="cont_titulo"> Historial Citas</div>

                    <div class="cont_general_all"></div>

                </div>


                <div id="estadocita" class="historialcita">

                    <div class="cont_titulo"> Estado Citas</div>

                    <div class="cont_general_all"></div>

                </div>

            </main>
        </div>
    </section>

    <script>


        document.addEventListener('DOMContentLoaded', function () {
            var toggleMenu = document.getElementById('toggleMenu');
            var menuContainer = document.querySelector('.con_menu');
            var closeMenu = document.getElementById('closeMenu'); // Aquí obtenemos la referencia al elemento de la X

            toggleMenu.addEventListener('click', function () {
                menuContainer.classList.toggle('menu-abierto');
            });

            closeMenu.addEventListener('click', function () {
                menuContainer.classList.remove('menu-abierto'); // Aquí eliminamos la clase que muestra el menú
            });
        });

    </script>

    <script>
    let hora_rango1 = document.getElementById("hora_rango1");
    let opcion_actual;
    
    let hora_rango2 = document.getElementById("hora_rango2");
    let opcion_actual2;
    $(document).ready(function() {
    $("#hora_rango1").change(function() {
        opcion_actual = $(this).val();
        console.log("Opción seleccionada 1: ", opcion_actual);        

        $.ajax({
            url: "horarios.php",
            type: "POST",
            data: { opcion_actual: opcion_actual },
            success: function(respon3) {
                console.log("Respuesta del servidor:", respon3);
                $("#rango").html(respon3);
            },
            error: function() {
                alert("Error al cargar las opciones del select rango_2");
            }
        });
    });

    $("#hora_rango2").change(function() {
        opcion_actual2 = $(this).val();
        console.log("Opción seleccionada 2: ", opcion_actual2);        

        $.ajax({
            url: "horarios.php",
            type: "POST",
            data: { opcion_actual2: opcion_actual2 },
            success: function(respon4) {
                console.log("Respuesta del servidor:", respon4);
                $("#rango_2").html(respon4);
            },
            error: function() {
                alert("Error al cargar las opciones del select rango_2");
            }
        });
    });
});


</script>

<script src="../Js/ajax.js"></script>
</body>



</html>