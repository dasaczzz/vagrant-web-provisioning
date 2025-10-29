<?php
$host = "192.168.56.15"; // IP de la máquina 'db'
$port = "5432";
$dbname = "ejemplo";
$user = "vagrant";
$password = "vagrant";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Personas - PostgreSQL</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1e1e1e; /* Fondo oscuro */
            color: #f0f0f0; /* Texto claro */
            text-align: center;
            padding: 20px;
        }

        h2 {
            color: #00bcd4; /* Color de acento para el título */
            margin-bottom: 20px;
        }

        /* --- Estilos de la Tabla --- */
        .styled-table {
            border-collapse: collapse; /* Quita el espacio entre bordes */
            margin: 25px auto; /* Centra la tabla */
            font-size: 0.9em;
            width: 80%;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); /* Sombra sutil */
            border-radius: 10px; /* Bordes redondeados */
            overflow: hidden; /* Asegura que los bordes redondeados se apliquen */
        }

        .styled-table thead tr {
            background-color: #00bcd4; /* Color de cabecera que resalte */
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            text-align: left;
        }

        /* Estilo a rayas (zebra-striping) */
        .styled-table tbody tr {
            border-bottom: 1px solid #333; /* Separador de filas */
            background-color: #2a2a2a; /* Fondo para filas impares */
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #383838; /* Fondo más oscuro para filas pares */
        }

        /* Efecto al pasar el ratón (hover) */
        .styled-table tbody tr:hover {
            background-color: #4a4a4a; /* Resaltado al pasar el ratón */
            color: #fff;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #00bcd4; /* Borde final más grueso */
        }
    </style>
</head>
<body>
    
<?php
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("<h2>Error al conectar con la base de datos.</h2>");
}

echo "<h2>Conexión exitosa con la base de datos PostgreSQL </h2>";

$result = pg_query($conn, "SELECT * FROM personas;");
if (!$result) {
    die("<p>Error al ejecutar la consulta.</p>");
}

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>ID</th><th>Nombre</th></tr>";

while ($row = pg_fetch_assoc($result)) {
    echo "<tr><td>{$row['id']}</td><td>{$row['nombre']}</td></tr>";
}

echo "</table>";

pg_close($conn);
?>