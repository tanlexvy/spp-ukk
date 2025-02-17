<?php
// Mulai sesi
session_start();

// Hancurkan semua data sesi
$_SESSION = array();
session_destroy();
?>