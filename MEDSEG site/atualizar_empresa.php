<?php
session_start();

if (!isset($_SESSION['empresa_id'])) {
    header("Location: login-medseg.php");
    exit();
}

$empresa_id = $_SESSION['empresa_id'];
$conn = new mysqli("localhost", "root", "", "medseg");

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}

// Pegando os dados do formulário
$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco']; // NOVO
$bairro = $_POST['bairro'];     // NOVO
$cidade = $_POST['cidade'];     // NOVO

// ATUALIZADO: Prepara a query com os novos campos
$stmt = $conn->prepare("
    UPDATE empresas 
    SET nome=?, cnpj=?, email=?, telefone=?, endereco=?, bairro=?, cidade=? 
    WHERE id_empresa=?
");

// ATUALIZADO: "sssssssi" significa 7 strings e 1 inteiro (o ID)
$stmt->bind_param("sssssssi", $nome, $cnpj, $email, $telefone, $endereco, $bairro, $cidade, $empresa_id);

if ($stmt->execute()) {
    echo "<script>alert('Dados atualizados com sucesso!'); window.location.href='editar_empresa.php';</script>";
} else {
    echo "Erro ao atualizar: " . $conn->error;
}

$stmt->close();
$conn->close();
?>