<?php
session_start();
    function property_delete($id_propiedad) {
        include 'property_delete.php';
    }

    function property_modify($id_propiedad) {
        include 'property_information_modify.php';
    }

if (isset($_POST['modificar'])) {
    $id_propiedad = $_POST['modificar'];
    property_modify($id_propiedad);
}
elseif (isset($_POST['eliminar'])) {
    $id_propiedad = $_POST['eliminar'];
    property_delete($id_propiedad);
}
else{
    header("Location: user_property_list.php"); 
}

?>
