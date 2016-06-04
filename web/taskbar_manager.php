<?php
if (isset ($_SESSION['rol'])){
	if (($_SESSION['rol'] == 1) || ($_SESSION['rol'] == 2)){
		include 'user_taskbar.php';
	}
	else{
		include 'admin_taskbar.php';
	}
}
else{
	include 'guest_taskbar.php';
}
?>