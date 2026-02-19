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

//??: Es un "operador de fusión de nulo". Si no hay nada en la URL, le asigna un texto vacío para evitar que el programa de un error.

if ($curso != "") {

    $sql = "SELECT * FROM Estudiantes WHERE curso = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$curso]);

    $resultados = $stmt->fetchAll();


    if (count($resultados) > 0) {

     
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Curso</th>
                <th>Nota</th>
              </tr>";

     
        for ($i = 0; $i < count($resultados); $i++) {

            $fila = $resultados[$i];

        
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

