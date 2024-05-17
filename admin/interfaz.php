<!DOCTYPE html>
<html>
<head>
    <title>Interfaz</title>
    <style>
        body {
            font-family: sans-serif;
        }
        button {
            background: green;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 10px;
            margin: 5px;
        }
        table tr:nth-child(odd) {
            background: rgb(230, 230, 230);
        }
        table tr:first-child {
            background: black;
            color: white;
        }
    </style>
</head>
<body>
<?php

$conexion = mysqli_connect("localhost", "examenmarcas", "examenmarcas", "proyectofinal");

include "clase.php";

$menu = new Controlador();
echo $menu->tablas($conexion);

$contenido = new Controlador();
if(isset($_GET['id'])){
    $contenido->eliminar($conexion, $_GET['tabla'], $_GET['id']);
}
echo $contenido->listar($conexion, isset($_GET['tabla']) ? $_GET['tabla'] : '');

?>
</body>
</html>
