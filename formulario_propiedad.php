<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Propiedad</title>
</head>
<body>
    <h1>Agregar Nueva Propiedad</h1>
    <form action="agregar_propiedad.php" method="POST">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="price">Precio:</label>
        <input type="number" id="price" name="price" step="0.01" required><br>

        <label for="image">URL de Imagen:</label>
        <input type="text" id="image" name="image"><br>

        <label for="description">Descripción:</label>
        <textarea id="description" name="description"></textarea><br>

        <label for="rooms">Habitaciones:</label>
        <input type="number" id="rooms" name="rooms" min="1" required><br>

        <label for="wc">Baños:</label>
        <input type="number" id="wc" name="wc" min="1" required><br>

        <label for="garage">Garaje:</label>
        <input type="number" id="garage" name="garage" min="1" required><br>

        <label for="idSeller">Vendedor:</label>
        <select id="idSeller" name="idSeller" required>
            <option value="">Selecciona un vendedor</option>
            <?php
            $conn = new mysqli("localhost", "root", "", "bienesRaices");

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql = "SELECT id, name FROM sellers";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                }
            } else {
                echo "<option value=''>No hay vendedores disponibles</option>";
            }

            $conn->close();
            ?>
        </select><br>

        <button type="submit">Agregar Propiedad</button>
    </form>
</body>
</html>
