<?php
session_start();

if (!isset($_SESSION['empresa_id'])) {
    header("Location: medseg-login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "medseg");

$id = $_GET['id'];
$id_empresa = $_SESSION['empresa_id'];

// 🔒 Segurança: Ajustado o nome da coluna para id_funcionario
$stmt = $conn->prepare("
    DELETE FROM funcionarios 
    WHERE id_funcionario = ? AND id_empresa = ?
");

$stmt->bind_param("ii", $id, $id_empresa);

if ($stmt->execute()) {
    header("Location: dashboard_empresa.php");
} else {
    echo "Erro ao excluir: " . $stmt->error;
}
?>