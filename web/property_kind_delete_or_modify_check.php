<?php

    function property_kind_delete($id_propiedad) {
			include 'conexion.php';
			$eliminarTipoPropiedad = "DELETE FROM tipo_propiedad WHERE (id_tipo_propiedad = $id_propiedad)";
			$result = mysql_query($eliminarTipoPropiedad);
			mysql_close($conexion);
			header("Location: property_kind_list.php");
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

