document.addEventListener('DOMContentLoaded', function() {

    // --------------------------------------------CREATE MEDIC----------------------------------------------------------

  var guardarButton = document.getElementById("guardar-button");
  
  guardarButton.addEventListener("click", function() {
      console.log("i love everything you do.");
      var idNumber = document.querySelector('input[name="doc_id-number"]').value;
      var name = document.querySelector('input[name="doc_name"]').value;
      var age = document.querySelector('input[name="doc_age"]').value;
      var phoneNumber = document.querySelector('input[name="doc_phone-number"]').value;
      var email = document.querySelector('input[name="doc_email"]').value;
      var sex = document.querySelector('input[name="doc_sex"]').value;
      
      var datos = {
          idNumber: idNumber,
          name: name,
          age: age,
          phoneNumber: phoneNumber,
          email: email,
          sex: sex
      };
      
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "new_medic.php", true);
      xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
      xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
              console.log(xhr.responseText);
              console.log(datos);
          }
      };
      xhr.send(JSON.stringify(datos));
  });

    // ------------------------------------------ CREATE PATIENT----------------------------------------------

  var valo = document.getElementById("paciente-nuevo");
  
  valo.addEventListener("click", function() {
      
      console.log("when u call me fucking dumb for the stupid shit i do.");
      var pat_docType = document.querySelector('select[name="pat-id-type"]').value;
      var pat_idNumber = document.querySelector('input[name="pat_id-number"]').value;
      var pat_name = document.querySelector('input[name="pat_name"]').value;
      var pat_age = document.querySelector('input[name="pat_age"]').value;
      var pat_phoneNumber = document.querySelector('input[name="pat_phone-number"]').value;
      var pat_email = document.querySelector('input[name="pat_email"]').value;
      var pat_sex = document.querySelector('input[name="pat_sex"]').value;
      var pat_afiliation = document.querySelector('select[name="pat-afi"]').value;
     
      
      
      var daticos = {
          pat_idNumber: pat_idNumber,
          pat_name: pat_name,
          pat_age: pat_age,
          pat_phoneNumber: pat_phoneNumber,
          pat_email: pat_email,
          pat_sex: pat_sex,
          pat_docType: pat_docType,
          pat_afiliation: pat_afiliation
      };
      
      
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "new_patient.php", true);
      xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
      xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
              console.log(xhr.responseText);
              console.log(daticos);
          }
      };
      xhr.send(JSON.stringify(daticos));
  });

//   --------------------------------------------CREATE CITA--------------------------

    var fortnite = document.getElementById("paciente-nuevo");
    
    fortnite.addEventListener("click", function() {
        
        console.log("when u call me fucking dumb for the stupid shit i do.");
        var pat_docType = document.querySelector('select[name="pat-id-type"]').value;
        var pat_idNumber = document.querySelector('input[name="pat_id-number"]').value;
        var pat_name = document.querySelector('input[name="pat_name"]').value;
        var pat_age = document.querySelector('input[name="pat_age"]').value;
        var pat_phoneNumber = document.querySelector('input[name="pat_phone-number"]').value;
        var pat_email = document.querySelector('input[name="pat_email"]').value;
        var pat_sex = document.querySelector('input[name="pat_sex"]').value;
        var pat_afiliation = document.querySelector('select[name="pat-afi"]').value;
    
        
        
        var daticos = {
            pat_idNumber: pat_idNumber,
            pat_name: pat_name,
            pat_age: pat_age,
            pat_phoneNumber: pat_phoneNumber,
            pat_email: pat_email,
            pat_sex: pat_sex,
            pat_docType: pat_docType,
            pat_afiliation: pat_afiliation
        };
        
        
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "new_patient.php", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                console.log(daticos);
            }
        };
        xhr.send(JSON.stringify(daticos));
    });


//   --------------------------------------------CREATE PATOLOGIA--------------------------

    var instagram = document.getElementById("guardar-pato");
    
    instagram.addEventListener("click", function() {
        
        console.log("patico");
        var pato_name = document.querySelector('input[name="pato_name"]').value;
        var pato_score = document.querySelector('input[name="pato_score"]').value;
        
        var patos = {
            pato_name: pato_name,
            pato_score: pato_score
        };
        
        
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "new_patologia.php", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                console.log(patos);
            }
        };
        xhr.send(JSON.stringify(patos));
    });

//   --------------------------------------------CREATE CITA TYPE--------------------------

    var citatype = document.getElementById("guardar-citatype");
    
    citatype.addEventListener("click", function() {
        
        console.log("ostia tio");
        var typec_name = document.querySelector('input[name="name_citatype"]').value;
        
        var cita = {
            typec_name: typec_name
        };
        
        
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "new_citatype.php", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                console.log(cita);
            }
        };
        xhr.send(JSON.stringify(cita));
    });

  // ----------------------------------------------DELETE---------------------------------

      document.addEventListener('click', function(event) {
        if (event.target.classList.contains('delete')) {
          var userId = event.target.dataset.userId;
          var userRole = event.target.getAttribute('data-role');
        
          console.log("user: "+ userId);

          console.log("rol: "+ userRole);
          // Send AJAX request to delete_user.php

          var byebye = {
            userId : userId,
            userRole: userRole
          }
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'delete.php', true);
          xhr.setRequestHeader('Content-Type', 'application/json');

          xhr.onload = function() {
              if (xhr.status === 200) {
                  // Delete the table row from the DOM
                  console.log(xhr.responseText);
                  var tableRow = document.getElementById('table_row_' + userId);
                  if (tableRow) {
                      tableRow.remove();
                  }
              } else {
                  console.error('Error deleting user:', xhr.statusText);
              }
          };

          xhr.onerror = function() {
              console.error('AJAX request failed');
          };

          xhr.send(JSON.stringify(byebye));
        }
      });
    
  // // --------------------------------------- MODAL ------------------------------

var overlay = document.getElementById('overlay')

// Event delegation for dynamically added buttons
document.addEventListener('click', function(event) {
    var target = event.target;
    if (target.matches('[data-modal-target]')) {
        var modal = document.querySelector(target.dataset.modalTarget);
        openModal(modal);
        console.log("uwuwuwu");
    } else if (target.matches('[data-close-button]')) {
        var modal = target.closest('.modal');
        closeModal(modal);
    }
});

function openModal(modal) {
    modal.classList.add('active');
    overlay.classList.add('active');
}

function closeModal(modal) {
    modal.classList.remove('active');
    overlay.classList.remove('active');
}
  

// -----------------------UPDATE USERS WHEN CLICK ON BUTTON-------------------------

    document.addEventListener("click", function(event) {
        // Get the modal id associated with this button
        if(event.target.classList.contains('save-button') && event.target.id === 'save-user') {
            // Get the modal id associated with this button
            var modalId = event.target.getAttribute('data-modal-id');
            
            // Find all input fields within the modal
            var modal = document.getElementById(modalId);
            var inputs = modal.querySelectorAll('input');

            // Prepare data object to send via AJAX
            var data = {};
            inputs.forEach(input => {
                data[input.name] = input.value;
            });

            // Send AJAX request to update user data
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update.php", true);
            // Set Content-Type header for JSON data
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Handle successful response
                        alert('Data Updated');
                    } else {
                        // Handle error response
                        alert('Error occurred while updating data');
                    }
                }
            };
            xhr.send(JSON.stringify(data));
        }
    });


// -----------------------UPDATE PATOLOGIA-------------------------

    document.addEventListener("click", function(event) {
        // Get the modal id associated with this button
        if(event.target.classList.contains('save-button') && event.target.id === 'save-patologia') {
            // Get the modal id associated with this button
            console.log("fabi sapa")
            var modalId = event.target.getAttribute('data-modal-id');
            
            // Find all input fields within the modal
            var modal = document.getElementById(modalId);
            var inputs = modal.querySelectorAll('input');

            // Prepare data object to send via AJAX
            var quack = {};
            inputs.forEach(input => {
                quack[input.name] = input.value;
            });

            // Send AJAX request to update user data
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_patologia.php", true);
            // Set Content-Type header for JSON data
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Handle successful response
                        alert('Data Updated');
                    } else {
                        // Handle error response
                        alert('Error occurred while updating data');
                    }
                }
            };
            xhr.send(JSON.stringify(quack));
        }
    });

    // -----------------------UPDATE cita type-------------------------

    document.addEventListener("click", function(event) {
        // Get the modal id associated with this button
        if(event.target.classList.contains('save-button') && event.target.id === 'save-typecita') {
            // Get the modal id associated with this button
            console.log("am i your type??")
            var modalId = event.target.getAttribute('data-modal-id');
            
            // Find all input fields within the modal
            var modal = document.getElementById(modalId);
            var inputs = modal.querySelectorAll('input');

            // Prepare data object to send via AJAX
            var taip = {};
            inputs.forEach(input => {
                taip[input.name] = input.value;
            });

            // Send AJAX request to update user data
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_citatype.php", true);
            // Set Content-Type header for JSON data
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Handle successful response
                        alert('Data Updated');
                    } else {
                        // Handle error response
                        alert('Error occurred while updating data');
                    }
                }
            };
            xhr.send(JSON.stringify(taip));
        }
    });

// -----------------AJAX-----------------

function tabla_medico() {
  $.ajax({
  url: "ajax_tabla_medico.php",
  type: "POST",
  data: $("#none").serialize(),
  success: function (respo) {
    $('#contain_tablas').html(respo);
  }
  });
}

function tabla_paciente() {
  $.ajax({
  url: "ajax_tabla_paciente.php",
  type: "POST",
  data: $("#none").serialize(),
  success: function (respo) {
    $('#contain_tablas_pac').html(respo);
  }
  });
}

function tabla_patologia() {
  $.ajax({
  url: "ajax_tabla_patologia.php",
  type: "POST",
  data: $("#none").serialize(),
  success: function (respo) {
    $('#contain_tablas_pato').html(respo);
  }
  });
}

// update modal paciente and doctor
$(".save-button, #guardar-button, #paciente-nuevo, #guardar-pato").click(function () {
    tabla_medico();
    tabla_paciente();
    tabla_patologia();
});

});