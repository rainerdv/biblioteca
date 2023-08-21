<?php
require_once 'connect.php';

if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $query = "SELECT * FROM `admin` WHERE `admin_id` = ?";
    
    // Preparar la consulta
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $admin_id);
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $fadmin = $result->fetch_array();
        $name = $fadmin['firstname'] . " " . $fadmin['lastname'];
    } else {
        // No se encontraron resultados
        $name = "Nombre no disponible";
    }

    $stmt->close();
} else {
    // El índice 'admin_id' no está definido en la sesión
    $name = "Nombre no disponibe";
}

// Resto de tu código aquí...
?>
