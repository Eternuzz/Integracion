<?php 
    session_start(); 
    require_once ('conexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>medpriority</title>
    <link rel="stylesheet" href="../Css/estiloss.css">
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
                <p>Elkin ramirez</p>

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
                            <div class="con_opcion">
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
                        <a href="#notificaciones" class="inicio">
                            <div class="con_opcion">
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
                            <div class="con_opcion">
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
                        <div class="con_opcion">
                            <select onchange="window.location.href=this.value;">
                                <option value="#inicio">Cita</option>
                                <option value="#AgregarCita">Agregar Cita</option>
                                <option value="#historialcitasS">Historial Citas</option>
                                <option value="#estadocita">Estado Cita</option>


                            </select>
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

                    <div class="cont_general_all"></div>

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
    
    
    document.addEventListener('DOMContentLoaded', function() {
    var toggleMenu = document.getElementById('toggleMenu');
    var menuContainer = document.querySelector('.con_menu');
    var closeMenu = document.getElementById('closeMenu'); // Aquí obtenemos la referencia al elemento de la X

    toggleMenu.addEventListener('click', function() {
        menuContainer.classList.toggle('menu-abierto');
    });

    closeMenu.addEventListener('click', function() {
        menuContainer.classList.remove('menu-abierto'); // Aquí eliminamos la clase que muestra el menú
    });
});

    
    
    
    
    document.addEventListener('DOMContentLoaded', function() {
        var imagen = document.querySelector('img[src="../Img/logo.png"]');
        var contenedorOriginal = document.querySelector('.preguntas_formularioo');
        var contenedoresClonados = []; // Array para almacenar los contenedores clonados
        
        imagen.addEventListener('click', function() {
            if (contenedoresClonados.length === 0) { // Si no hay contenedores clonados, clonar y mostrar
                var clon = contenedorOriginal.cloneNode(true);
                contenedorOriginal.parentNode.insertBefore(clon, contenedorOriginal.nextSibling);
                contenedoresClonados.push(clon);
            } else { // Si ya hay contenedores clonados, ocultarlos y vaciar el array
                contenedoresClonados.forEach(function(clon) {
                    clon.style.display = 'none';
                });
                contenedoresClonados = [];
            }
        });
    });
    
    </script>

</body>





<script src="Js/script.js"></script>

</html>