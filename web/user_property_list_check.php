<?php
session_start();

    if (isset($_POST['propiedad'])) {
    	include 'property_information.php';
    }
    elseif (isset($_POST['reservas'])) {
    	include 'property_reservations_list.php';
    }
    elseif (isset($_POST['preguntas'])) {
		include 'property_questions_list.php';	
    }
    else{
		header("Location: index.php");
    }
?>