<?php

require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $data = json_decode(file_get_contents("php://input"), true);
    $userId = $data['userId'];
    $userRole = $data['userRole'];

    // ----------------DELETE DOCTOR------------------------
        
    $stmt = mysqli_prepare($conn, "DELETE FROM citas_agendadas WHERE id_DoctorAsignado IN (SELECT id_doctor FROM doctores WHERE id_usuario = ?);");
    mysqli_stmt_bind_param($stmt, "s", $userId);

    $stmt2 = mysqli_prepare($conn, "DELETE FROM doctor_consultorio WHERE id_doctor IN (SELECT id_doctor FROM doctores WHERE id_usuario = ?);");
    mysqli_stmt_bind_param($stmt2, "s", $userId);

    $stmt3 = mysqli_prepare($conn, "DELETE FROM doctores WHERE id_usuario = ?");
    mysqli_stmt_bind_param($stmt3, "s", $userId);

    $stmt4 = mysqli_prepare($conn, "DELETE FROM usuario WHERE id_usuario = ?");
    mysqli_stmt_bind_param($stmt4, "s", $userId);

    if ($userRole == 3) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_execute($stmt3);
        mysqli_stmt_execute($stmt4);
        
        if (mysqli_stmt_affected_rows($stmt4) > 0) {
        // Send a success response
        echo "User deleted successfully MEDIC";
        } else {
        // Send an error response
        echo "Error deleting user MEDIC";
        }
    }

    // ----------------DELETE PACIENTE------------------------
    
    $stmt5 = mysqli_prepare($conn, "DELETE FROM historia_clinica WHERE id_usuario = ?");
    mysqli_stmt_bind_param($stmt5, "s", $userId);

    $stmt6 = mysqli_prepare($conn, "DELETE FROM preagendamiento WHERE id_usuario = ?");
    mysqli_stmt_bind_param($stmt6, "s", $userId);

    $stmt7 = mysqli_prepare($conn, "DELETE FROM usuario WHERE id_usuario = ?");
    mysqli_stmt_bind_param($stmt7, "s", $userId);

    if ($userRole == 2) {
        mysqli_stmt_execute($stmt5);
        mysqli_stmt_execute($stmt6);
        mysqli_stmt_execute($stmt7);
        if (mysqli_stmt_affected_rows($stmt7) > 0) {
        // Send a success response
        echo "User deleted successfully PATIENT";
        } else {
        // Send an error response
        echo "Error deleting user PATIENT";
        }
    }

    // ----------------DELETE PATOLOGIA------------------------
    
    $stmt8 = mysqli_prepare($conn, "DELETE FROM historia_clinica WHERE id_patologia = ?");
    mysqli_stmt_bind_param($stmt8, "i", $userId);

    $stmt9 = mysqli_prepare($conn, "DELETE FROM patologias WHERE id_patologia = ?");
    mysqli_stmt_bind_param($stmt9, "i", $userId);

    if ($userRole == "patologia") {
        mysqli_stmt_execute($stmt8);
        mysqli_stmt_execute($stmt9);
        if (mysqli_stmt_affected_rows($stmt9) > 0) {
        // Send a success response
        echo "PATOLOGIA deleted successfully";
        } else {
        // Send an error response
        echo "Error deleting PATOLOGIA";
        }
    }

    // ----------------DELETE TIPO CITA------------------------
    
    $stmt10 = mysqli_prepare($conn, "DELETE FROM tcita_especialidad WHERE id_tcita = ?");
    mysqli_stmt_bind_param($stmt10, "i", $userId);

    $stmt11 = mysqli_prepare($conn, "DELETE FROM preagendamiento WHERE id_tipo_cita = ?");
    mysqli_stmt_bind_param($stmt11, "i", $userId);

    $stmt12 = mysqli_prepare($conn, "DELETE FROM tipo_cita WHERE id = ?");
    mysqli_stmt_bind_param($stmt12, "i", $userId);

    if ($userRole == "tipocita") {
        mysqli_stmt_execute($stmt10);
        mysqli_stmt_execute($stmt11);
        mysqli_stmt_execute($stmt12);
        if (mysqli_stmt_affected_rows($stmt12) > 0) {
        // Send a success response
        echo "TIPOCITA deleted successfully";
        } else {
        // Send an error response
        echo "Error deleting TIPOCITA";
        }
    }

    // -----------------------CLOSE----------------------------------

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt2);
    mysqli_stmt_close($stmt3);
    mysqli_stmt_close($stmt4);
    mysqli_stmt_close($stmt5);
    mysqli_stmt_close($stmt6);
    mysqli_stmt_close($stmt7);
    mysqli_stmt_close($stmt8);
    mysqli_stmt_close($stmt9);
    mysqli_stmt_close($stmt10);
    mysqli_stmt_close($stmt11);
    mysqli_stmt_close($stmt12);

    mysqli_close($conn);
}
?>
