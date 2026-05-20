<?php
session_start();
session_destroy(); // Destrói todas as variáveis de sessão
header("Location: medSeg.php"); // Volta para a home
exit();
?>