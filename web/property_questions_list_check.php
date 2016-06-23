<?php
session_start();

    if (isset($_POST['respond'])) {
    	include 'user_responder.php';
    }
    elseif (isset($_POST['ver_respuesta'])){
        include 'user_respuesta.php';
    }	
    else{
		header("Location: index.php");
    }
?>