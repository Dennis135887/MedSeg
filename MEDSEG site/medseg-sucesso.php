<div class="sucesso-container">
  <div class="msg-sucesso">
    <i class="fas fa-check-circle"></i>
    <h2>Cadastro realizado com sucesso!</h2>
    <p>Seu usuário foi criado e já está disponível no sistema.</p>

    <a href="medSeg.php" class="btn-voltar">
      <i class="fas fa-home"></i> Ir para Home
    </a>
  </div>
</div>

<style>
  /* FUNDO COM GRADIENTE */
  body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background: linear-gradient(135deg, #0d6efd, #0a58ca, #28a745);
    background-size: 300% 300%;
    animation: gradientBG 8s ease infinite;
  }

  .sucesso-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
  }

  /* CARD ESTILO GLASS */
  .msg-sucesso {
    max-width: 420px;
    width: 100%;
    padding: 35px;
    border-radius: 18px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    text-align: center;
    color: #fff;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    animation: fadeInUp 0.8s ease forwards;
  }

  .msg-sucesso i {
    font-size: 3.5rem;
    color: #00ffae;
    margin-bottom: 15px;
  }

  .msg-sucesso h2 {
    font-weight: 700;
    margin-bottom: 10px;
  }

  .msg-sucesso p {
    margin-bottom: 25px;
    opacity: 0.9;
  }

  /* BOTÃO COM GRADIENTE */
  .btn-voltar {
    display: inline-block;
    padding: 12px 28px;
    border-radius: 30px;
    background: linear-gradient(90deg, #00ffae, #00c6ff);
    color: #000;
    font-weight: 700;
    text-decoration: none;
    transition: 0.4s;
  }

  .btn-voltar i {
    margin-right: 8px;
  }

  .btn-voltar:hover {
    transform: scale(1.08);
    background: linear-gradient(90deg, #00c6ff, #00ffae);
  }

  /* ANIMAÇÃO DO FUNDO */
  @keyframes gradientBG {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }

  /* ANIMAÇÃO DO CARD */
  @keyframes fadeInUp {
    0% {
      opacity: 0;
      transform: translateY(30px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>