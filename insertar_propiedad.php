<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $rooms = $_POST['rooms'];
    $wc = $_POST['wc'];
    $garage = $_POST['garage'];
    $idSeller = $_POST['idSeller'];

    if (empty($title) || empty($price) || empty($rooms) || empty($wc) || empty($garage) || empty($idSeller)) {
        echo "Por favor, completa todos los campos obligatorios.";
        exit;
    }

    $query = "INSERT INTO propiertes (title, price, image, description, rooms, wc, garage, timestamp, idSeller) 
              VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sdssiiii', $title, $price, $image, $description, $rooms, $wc, $garage, $idSeller);

    if (mysqli_stmt_execute($stmt)) {
        echo "Propiedad agregada exitosamente.";
    } else {
        echo "Error al agregar la propiedad: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo "Acceso no válido.";
}
?>
