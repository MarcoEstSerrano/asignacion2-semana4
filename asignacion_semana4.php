<?php
include 'conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Lista de Estudiantes</title>

<style>
body { font-family: sans-serif; }

table {
    border-collapse: collapse;
    width: 80%;
    margin: auto;
    border: 1px solid black;
}

th, td {
    border: 1px solid black;
    padding: 10px;
    text-align: center;
}

th { background-color: #e0e0e0; }

.aprobado { color: green; font-weight: bold; }
.reprobado { color: red; font-weight: bold; }
</style>

</head>
<body>

<h1 style="text-align:center;">Lista de Estudiantes</h1>

<?php

$curso = $_GET['curso'] ?? "";

if ($curso != "") {

    $sql = "SELECT * FROM Estudiantes WHERE curso = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$curso]);

    $resultados = $stmt->fetchAll();

    // 🔴 IMPORTANTE: verificar si hay datos
    if (count($resultados) > 0) {

        // 🔴 AQUÍ VA LA TABLA (ANTES DEL for)
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Curso</th>
                <th>Nota</th>
              </tr>";

        // 🔵 for normal
        for ($i = 0; $i < count($resultados); $i++) {

            $fila = $resultados[$i];

            // color según la nota
            if ($fila['nota'] >= 70) {
                $clase = "aprobado";
            } else {
                $clase = "reprobado";
            }

            echo "<tr>";
            echo "<td>".$fila['id']."</td>";
            echo "<td>".$fila['nombre']."</td>";
            echo "<td>".$fila['curso']."</td>";
            echo "<td class='$clase'>".$fila['nota']."</td>";
            echo "</tr>";
        }

        // 🔴 Cerrar tabla
        echo "</table>";

    } else {
        echo "<p style='text-align:center;'>No se encontraron estudiantes para este curso.</p>";
    }

} else {
    echo "<p style='text-align:center;'>Agrega en la URL: ?curso=Programacion</p>";
}

?>

</body>
</html>

