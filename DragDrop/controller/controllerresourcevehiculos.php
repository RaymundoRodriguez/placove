<?php
session_start();

$vehiculos = $_SESSION['Variable']; 
echo json_encode($vehiculos);
?>
