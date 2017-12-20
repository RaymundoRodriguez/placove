<?php
session_start();
$conductor='';
$conductor = $_SESSION['conductor'];
echo json_encode($conductor);

?>
