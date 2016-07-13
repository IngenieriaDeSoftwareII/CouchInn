<?php

    function property_kind_delete($id_propiedad) {
			include 'conexion.php';
            $query = "SELECT * FROM propiedad WHERE id_tipo_propiedad = $id_propiedad";
            $result = mysql_query($query);
            $count = mysql_num_rows($result);
            if ($count == 0){
                $eliminarTipoPropiedad = "DELETE FROM tipo_propiedad WHERE (id_tipo_propiedad = $id_propiedad)";
                $result = mysql_query($eliminarTipoPropiedad);
                mysql_close($conexion);
                header("Location: property_kind_list.php");
            }
            else{
                mysql_close($conexion);
                $mensaje = "Operacion invalida: Existen publicaciones con el tipo de propiedad que esta queriendo eliminar.";
                echo "<script>";
                echo "alert('$mensaje');";  
                echo "window.location = 'property_kind_list.php';";
                echo "</script>";
            }
    }

	function property_kind_modify($id_propiedad) {
    	include 'property_kind_modify.php';
	}

    if (isset($_POST['modificar'])) {
    	$id_propiedad = $_POST['modificar'];
        property_kind_modify($id_propiedad);
    }
    elseif (isset($_POST['eliminar'])) {
    	$id_propiedad = $_POST['eliminar'];
    	property_kind_delete($id_propiedad);
    }
    else{
	header("Location: property_kind_list.php");	
    }

	?>

