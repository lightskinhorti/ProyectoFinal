<?php

class Controlador{
    function tablas($conexion){
        $peticion = "SHOW TABLES IN proyectofinal;";
        $resultado = mysqli_query($conexion, $peticion);
        $cadena = "";
        while($fila = mysqli_fetch_assoc($resultado)){
            $cadena .= "<a href='?tabla=".htmlspecialchars($fila['Tables_in_proyectofinal'])."'><button>".htmlspecialchars($fila['Tables_in_proyectofinal'])."</button></a>";
        }
        return $cadena;
    }

    function eliminar($conexion, $tabla, $id){
        $tabla = mysqli_real_escape_string($conexion, $tabla);
        $id = intval($id);
        $peticion = "DELETE FROM ".$tabla." WHERE Identificador = ".$id.";";
        $resultado = mysqli_query($conexion, $peticion);    
    }

    function buscar($conexion, $tabla, $id){
        $tabla = mysqli_real_escape_string($conexion, $tabla);
        $id = intval($id);
        $cadena = "<table>";
        $peticion = "SHOW COLUMNS FROM ".$tabla.";";
        $resultado = mysqli_query($conexion, $peticion);
        $cadena .= "<tr>";
        while($fila = mysqli_fetch_assoc($resultado)){
            $cadena .= "<th>".$fila['Field']."</th>";
        }
        $cadena .= "</tr>";
        $peticion = "SELECT * FROM ".$tabla." WHERE Identificador = ".$id.";";
        $resultado = mysqli_query($conexion, $peticion);    
        while($fila = mysqli_fetch_assoc($resultado)){
            $cadena .= "<tr>";
            foreach($fila as $clave=>$valor){
                $cadena .= "<td>".$valor."</td>";
            }
            $cadena .= "</tr>";
        }
        $cadena .= "</table>";   
        return $cadena;
    }

    function listar($conexion, $tabla){
        if(empty($tabla)){
            return "No se ha especificado ninguna tabla.";
        }
        $tabla = mysqli_real_escape_string($conexion, $tabla);
        $cadena = "<table>";
        $peticion = "SHOW COLUMNS FROM ".$tabla.";";
        $resultado = mysqli_query($conexion, $peticion);
        $cadena .= "<tr>";
        while($fila = mysqli_fetch_assoc($resultado)){
            $cadena .= "<th>".$fila['Field']."</th>";
        }
        $cadena .= "<th>Operaciones</th>";
        $cadena .= "</tr>";
        $peticion = "SELECT * FROM ".$tabla.";";
        $resultado = mysqli_query($conexion, $peticion);    
        while($fila = mysqli_fetch_assoc($resultado)){
            $cadena .= "<tr>";
            foreach($fila as $clave=>$valor){
                $cadena .= "<td>".$valor."</td>";
            }
            $cadena .= "<td><a href='?tabla=".$_GET['tabla']."&id=".$fila['Identificador']."'><button>X</button></a></td>";
            $cadena .= "</tr>";
        }
        $cadena .= "</table>";   
        return $cadena;
    }
}

?>
