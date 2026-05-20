<?php
session_start();

// 1. SEGURANÇA: Só quem tem o "crachá" da sessão pode atualizar
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login-medseg.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "medseg");
if ($conn->connect_error) { 
    die("Erro: " . $conn->connect_error); 
}

// 2. RECEBENDO OS DADOS DO FORMULÁRIO (Incluindo o novo campo login)
$id = $_SESSION['usuario_id'];
$nome = $_POST['nome'];
$login = $_POST['login']; // <-- NOVO: Capturando o login enviado pelo formulário
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$nascimento = $_POST['nascimento'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf']; // Capturando a UF que estava no seu formulário anterior

// 3. COMANDO SQL ATUALIZADO
// Adicionamos "login=?" e "uf=?" na lista de campos a serem alterados
$sql = "UPDATE usuarios SET nome=?, login=?, email=?, telefone=?, nascimento=?, 
cep=?, endereco=?, bairro=?, cidade=?, uf=? WHERE id_usuario=?";

$stmt = $conn->prepare($sql);

// 4. BIND_PARAM ATUALIZADO
// Agora temos 10 strings ("s") e 1 inteiro para o ID ("i") no final. Total: 11 parâmetros.
$stmt->bind_param("ssssssssssi", 
    $nome, $login, $email, $telefone, $nascimento, 
    $cep, $endereco, $bairro, $cidade, $uf, $id
);

if ($stmt->execute()) {
    // DICA: É bom atualizar o nome na sessão também, caso o usuário tenha mudado o nome
    $_SESSION['nome'] = $nome; 
    
    echo "<script>alert('Dados atualizados com sucesso!'); window.location.href='medseg-editar.php';</script>";
} else {
    echo "Erro ao atualizar: " . $conn->error;
}

$stmt->close();
$conn->close();
?>