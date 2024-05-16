function noti() {
    $.ajax({
        url: "Notificaciones.php",
        type: "POST",
        success: function (respuesta_server1) {
            $("#contain_notificaciones").html(respuesta_server1);
        }
    });
}

$(document).ready(function() {
    // Función que se ejecuta cuando se envía un formulario
   $('.aceptar_sug').submit(function(event) {
   event.preventDefault(); // Prevenir la acción predeterminada del envío del formulario (redireccionamiento)

   var form_id = $(this).data('form'); // Obtener el identificador único del formulario

   $.ajax({
       url: 'ProcesarSugerencia.php', // Ruta a tu script PHP que procesará los datos
       type: 'POST', // Método HTTP que se utilizará para enviar la solicitud
       data: $(this).serialize() + '&form_id=' + form_id, // Datos que se enviarán con la solicitud (en este caso, los datos del formulario y el identificador único)
       success: function(respuesta) {
           $('#contain_notificaciones').html(respuesta);
           //Modal_("Si"); 
       },
   });
});
});

$(document).ready(function() {
    // Función que se ejecuta cuando se envía un formulario
   $('.rechazar_sug').submit(function(event) {
   event.preventDefault(); // Prevenir la acción predeterminada del envío del formulario (redireccionamiento)

   var form_id = $(this).data('form'); // Obtener el identificador único del formulario

   $.ajax({
       url: 'ProcesarSugerencia.php', // Ruta a tu script PHP que procesará los datos
       type: 'POST', // Método HTTP que se utilizará para enviar la solicitud
       data: $(this).serialize() + '&form_id=' + form_id, // Datos que se enviarán con la solicitud (en este caso, los datos del formulario y el identificador único)
       success: function(respuesta) {
           $('#contain_notificaciones').html(respuesta);
           //Modal_("Si"); 
       },
   });
});
});