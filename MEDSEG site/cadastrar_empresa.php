<?php
session_start();
$conn = new mysqli("localhost", "root", "", "medseg");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 1. RECEBENDO DADOS (Adicionado o 'login')
    $nome     = $_POST['nome'];
    $login    = $_POST['login']; // <-- NOVO: Captura o nome de usuário da empresa
    $cnpj     = $_POST['cnpj'];
    $email    = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cep      = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $bairro   = $_POST['bairro'];
    $cidade   = $_POST['cidade'];
    $uf       = $_POST['uf'];
    $senha    = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // 2. SQL PREPARE ATUALIZADO
    // Adicionado o campo 'login' e mais um '?' (Total de 11 campos agora)
    $sql = "INSERT INTO empresas 
            (nome, login, cnpj, email, telefone, cep, endereco, bairro, cidade, uf, senha) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    // 3. BIND_PARAM ATUALIZADO
    // Agora são 11 letras "s" (todas são strings/texto)
    $stmt->bind_param("sssssssssss", 
        $nome, $login, $cnpj, $email, $telefone, $cep,
        $endereco, $bairro, $cidade, $uf, $senha
    );

    if ($stmt->execute()) {
        // Guarda o ID na sessão para já deixar a empresa "logada" após o cadastro
        $_SESSION['empresa_id'] = $conn->insert_id;
        $_SESSION['nome_empresa'] = $nome;

        echo "<script>
                alert('Empresa cadastrada com sucesso!'); 
                window.location.href='cadastrar_funcionario.php';
              </script>";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>