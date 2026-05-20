<?php
$host = "localhost";
$usuario = "root";
$senha_db = "";
$banco = "medseg";

$conn = new mysqli($host, $usuario, $senha_db, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// 1. RECEBENDO DADOS (Adicionado o campo 'login')
$nome = $_POST['nome'];
$login = $_POST['login']; // <-- NOVO: Captura o que o usuário digitou
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$telefone = $_POST['telefone'];
$nascimento = $_POST['nascimento'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];

// 2. INSERT ATUALIZADO (Adicionada a coluna 'login' e o seu respectivo '?' )
$stmt = $conn->prepare("
INSERT INTO usuarios 
(nome, login, email, senha, telefone, nascimento, cep, endereco, bairro, cidade, uf) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

// 3. BIND_PARAM (Adicionada uma letra "s" e a variável $login)
// Agora temos 11 campos, logo, 11 letras "s"
$stmt->bind_param("sssssssssss", 
    $nome, $login, $email, $senha, $telefone, 
    $nascimento, $cep, $endereco, $bairro, $cidade, $uf
);

if ($stmt->execute()) {
    header("Location: medseg-sucesso.php");
    exit();
} else {
    echo "Erro: " . $conn->error;
}

$stmt->close();
$conn->close();
?>