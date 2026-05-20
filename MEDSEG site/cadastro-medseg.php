
<?php
session_start();
// Verifica se há um usuário ou empresa logada
$logado = isset($_SESSION['usuario_id']) || isset($_SESSION['empresa_id']);
?>

<!-- CODIGO COM BOTÃO ALTERAR CADASTRO -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <title>MEDSEG | Cadastro de usuário</title>

<meta name="description" content="MEDSEG: Referência em Medicina e Segurança do Trabalho. Gestão completa de NRs, exames ocupacionais, treinamentos e assessoria técnica para o eSocial. Proteja sua empresa e seus colaboradores.">

<meta name="keywords" content="MEDSEG, medicina do trabalho, segurança do trabalho, eSocial, exames admissionais, PCMSO, PGR, treinamento NR, saúde ocupacional">

<meta name="author" content="MEDSEG">
  

  <!-- CSS Externo -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Anton&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="normalize.css" />
  <link rel="stylesheet" href="medseg-cadastro.css" />
</head>
<body>



<!-- Navbar -->
<header> 
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top px-3 custom-mobile-nav">
    <div class="container-fluid">

      <!-- Ícone Hamburguer -->
      <button class="custom-toggler navbar-toggler me-2" type="button">
        <span class="toggler-icon top-bar"></span>
        <span class="toggler-icon middle-bar"></span>
        <span class="toggler-icon bottom-bar"></span>
      </button>

      <!-- Logo -->
      <a class="navbar-brand mx-auto" href="#">
        <img src="images2/LOGO/logo2.png" alt="MedSeg Logo">
      </a>

      <!-- LOGIN MOBILE -->
      <div class="user-section d-flex align-items-center d-lg-none" style="gap: 20px">
        <?php if ($logado): ?>
          <a href="medseg-logout.php" title="Sair">
            <i class="fas fa-sign-out-alt me-1"></i>Sair
          </a>
        <?php else: ?>
          <a href="medseg-login.php" title="Entrar">
            <i class="fas fa-user me-1"></i>
          </a>
        <?php endif; ?>
      </div>

      <!-- MENU -->
      <div class="navbar-collapse justify-content-between mt-2 ms-lg-3 mt-lg-0" id="mainNavbar">
        <ul class="navbar-nav me-auto nav-list-mobile">

          <li class="nav-item">
            <a class="nav-link" href="medSeg.php">
              <i class="fas fa-home me-2"></i> Home
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="quem-somos.php">
              <i class="fas fa-info-circle me-2"></i> Quem somos
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#whatsapp-contato">
              <i class="fas fa-envelope me-2"></i> Contato
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-server me-2"></i> Serviços
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="medseg-esocial.php">
              <i class="fas fa-laptop me-2"></i> Esocial
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="medSeg.php#blogs">
              <i class="fas fa-blog me-2"></i> Blog
            </a>
          </li>

          <li class="nav-item d-lg-none">
            <a class="nav-link d-flex justify-content-between" href="#" id="openCadastro">
              <span><i class="fas fa-user-plus me-2"></i> Cadastrar</span>
              <i class="fas fa-chevron-right"></i>
            </a>
          </li>


          <!-- CADASTRAR (AGORA NO MENU MOBILE) -->
          <li class="nav-item d-lg-none">
            <a class="nav-link" href="medseg-login.php">
              <i class="fas fa-user me-2"></i> login
            </a>
          </li>

        </ul>

        <!-- LOGIN DESKTOP -->
        <div class="user-section d-none d-lg-flex align-items-center" style="gap: 20px">
          <?php if ($logado): ?>
            <a href="medseg-logout.php">
              <i class="fas fa-sign-out-alt me-1"></i>Sair
            </a>
          <?php else: ?>
            <a href="medseg-login.php">
              <i class="fas fa-user me-1"></i>Login
            </a>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </nav>
</header>


<!---Menu cadastar em mobile--->
  <div class="submenu-cadastro">
      <div class="submenu-header">
        <button class="btn-back">
          <i class="fas fa-arrow-left"></i> Voltar
        </button>
      </div>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="empresa-cadastro.php"><i class="fas fa-building me-2"></i> Cadastrar Empresa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cadastro-medseg.php"><i class="fas fa-user me-2"></i> Cadastrar Usuário</a>
        </li>

        
      </ul>
  </div>



<!-- Formulário de Cadastro -->
<div class="container mb-5">
  <div class="row align-items-center" style="margin-top:140px;">
    <div class="col-md-12">
      <div class="form">
        <form action="medseg-cadastro.php" method="POST" class="p-4 shadow bg-white rounded-4" id="formCadastro">
          <h2 class="mb-4 text-primary text-center fw-bold">Cadastro de Usuário</h2>
          <div class="row g-3">

            <div class="col-md-6">
              <label for="firstname" class="form-label">Nome</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="nome" class="form-control" id="firstname" placeholder="Digite seu nome" required>
              </div>
            </div>
             
             <!-- NOVO: CAMPO LOGIN (Nome de usuário para acesso) -->
            <div class="col-md-6">
              <label for="login" class="form-label">Nome de Usuário (Login)</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                <input type="text" name="login" class="form-control" id="login" placeholder="Ex: joao_medseg" required>
              </div>
            </div>
            
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu email" required>
              </div>
            </div>

            <div class="col-md-6">
              <label for="birthdate" class="form-label">Data de nascimento</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                <input type="date" name="nascimento" class="form-control" id="birthdate" required>
              </div>
            </div>

            <div class="col-md-6">
              <label for="number" class="form-label">Celular</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                <input type="tel" name="telefone" class="form-control" id="number" placeholder="(00) 00000-0000" required>
              </div>
            </div>
             
            <div class="col-md-6">
                  <label for="cep" class="form-label">CEP</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-search-location"></i></span>
                <input type="text" name="cep" class="form-control" id="cep" placeholder="00000-000" maxlength="9" required>
              </div>
            </div>

            <div class="col-md-6">
              <label for="endereco" class="form-label">Endereço</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Digite seu endereço" required>
              </div>
            </div>

            <div class="col-md-6">
              <label for="bairro" class="form-label">Bairro</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Digite seu bairro" required>
              </div>
            </div>

            <div class="col-md-6">
              <label for="city" class="form-label">Cidade</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-city"></i></span>
                <input type="text" name="cidade" class="form-control" id="city" placeholder="Digite sua cidade" required>
              </div>
            </div>

            <div class="col-md-6">
  <label for="uf" class="form-label">UF</label>
  <div class="input-group">
    <span class="input-group-text"><i class="fas fa-map"></i></span>
    <select name="uf" class="form-select" id="uf" required>
      <option value="" selected disabled>Selecione</option>
      <option value="AC">AC</option>
      <option value="AL">AL</option>
      <option value="AP">AP</option>
      <option value="AM">AM</option>
      <option value="BA">BA</option>
      <option value="CE">CE</option>
      <option value="DF">DF</option>
      <option value="ES">ES</option>
      <option value="GO">GO</option>
      <option value="MA">MA</option>
      <option value="MT">MT</option>
      <option value="MS">MS</option>
      <option value="MG">MG</option>
      <option value="PA">PA</option>
      <option value="PB">PB</option>
      <option value="PR">PR</option>
      <option value="PE">PE</option>
      <option value="PI">PI</option>
      <option value="RJ">RJ</option>
      <option value="RN">RN</option>
      <option value="RS">RS</option>
      <option value="RO">RO</option>
      <option value="RR">RR</option>
      <option value="SC">SC</option>
      <option value="SP">SP</option>
      <option value="SE">SE</option>
      <option value="TO">TO</option>
    </select>
  </div>
</div>

            
        <div class="col-md-6">
              <label for="password" class="form-label">Senha</label>
             <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" name="senha" class="form-control" id="password" placeholder="Digite uma senha" required>
            <span class="input-group-text toggle-password" data-target="password"><i class="fas fa-eye"></i></span>
            </div>
        </div>

        <div class="col-md-6">
          <label for="Confirmpassword" class="form-label">Confirme sua senha</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock-open"></i></span>
            <input type="password" class="form-control" id="Confirmpassword" placeholder="Confirme a senha" required>
            <span class="input-group-text toggle-password" data-target="Confirmpassword"><i class="fas fa-eye"></i></span>
          </div>
        </div>

            <div class="text-center mt-4">
              <button type="submit" class="btn btn-primary btn-lg px-5">Continuar</button>
            </div>

            <div class="text-center mt-3">
  <a href="medseg-editar.php" class="btn btn-outline-secondary btn-lg px-5">Alterar Cadastro</a>
           </div>


            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!---=======================================================================================---->
<!-- Rodapé -->
<footer class="footer-custom text-center text-lg-start ">
  <div class="container p-4">
    <div class="row text-center">

      <div class="col-md-3 text-md-start">
        <img src="images2/LOGO/logo2.png" alt="Logo Medseg" class="mb-3" />

        <p><i class="fab fa-whatsapp me-2"></i>4545-4786</p>
        <p><i class="fas fa-envelope me-2"></i>medseg@empresa.com</p>
        <p><i class="fas fa-map-marker-alt me-2"></i>Rua Pedra verde, São Paulo, SP</p>
      </div>

      <div class="col-md-3 text-md-start">
        <h5>Sobre a MEDSEG</h5>
        <ul class="list-unstyled">

          <li>
            <a class="text-decoration-none  d-block mb-2" href="medSeg.php">
              <i class="fas fa-home me-2"></i>Home
            </a>
          </li>

          <li>
            <a class="text-decoration-none  d-block mb-2" href="quem-somos.php">
              <i class="fas fa-info-circle me-2"></i>Quem somos
            </a>
          </li>

          <li>
            <a class="text-decoration-none  d-block mb-2" href="#">
              <i class="fas fa-envelope me-2"></i>Contato
            </a>
          </li>

          <li>
            <a class="text-decoration-none  d-block mb-2" href="#">
              <i class="fas fa-server me-2"></i>Serviços
            </a>
          </li>

          <li>
            <a class="text-decoration-none  d-block mb-2" href="medseg-esocial.php">
              <i class="fas fa-laptop me-2"></i>Esocial
            </a>
          </li>

          <li>
            <a class="text-decoration-none  d-block" href="medSeg.php#blogs">
              <i class="fas fa-blog me-2"></i>Blog
            </a>
          </li>

        </ul>
      </div>

      <div class="col-md-3 text-md-start">
        <h5>Nosso horário</h5>
        <p><i class="fas fa-clock me-2"></i>Segunda: 10h - 17h</p>
        <p><i class="fas fa-clock me-2"></i>Sábado: 10h - 13h</p>
        <p><i class="fas fa-clock me-2"></i>Domingo: Fechado</p>
      </div>

      <div class="col-md-3 text-md-start">
        <h5>Quem somos</h5>
        <p>
        Nossa empresa se especializou em Medicina e Segurança do Trabalho porque
        defendemos a dignidade do ser humano, como trabalhador e como empresário,
        devido às alterações das legislações, das Normas Regulamentadoras e nas
        diretrizes estabelecidas pelo INSS.
        </p>

        <div class="mt-3">
          <a href="#" class="text-dark me-3"><i class="fab fa-facebook fa-lg"></i></a>
          <a href="#" class="text-dark me-3"><i class="fab fa-instagram fa-lg"></i></a>
          <a href="#" class="text-dark"><i class="fab fa-linkedin fa-lg"></i></a>
        </div>
      </div>

      <!-- Rodapé inferior -->
      <div class="footer-custom2 col-12 mt-4 text-center">
        <hr />
        <p>&copy; 2025 - MEDSEG Gestão Ocupacional | Todos os direitos reservados – Desenvolvido por Icon Web Design</p>
      </div>

    </div>
  </div>
</footer>
<!--=============================================================--->



<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js"></script>

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>


<!--script para o campo senha ficar visivel--->
<script>
const toggles = document.querySelectorAll(".toggle-password");

toggles.forEach(toggle => {
  toggle.addEventListener("click", () => {
    const targetId = toggle.getAttribute("data-target");
    const input = document.getElementById(targetId);

    if (input.type === "password") {
      input.type = "text";
      toggle.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
      input.type = "password";
      toggle.innerHTML = '<i class="fas fa-eye"></i>';
    }
  });
});
</script>

<a 
href="#" class="whatsapp-float"
>

<!---com esse link real voçe é enviado para o site do whatsapp<a 
href="https://wa.me/5599999999999" 
class="whatsapp-float"
target="_blank"
>-->

<i class="fab fa-whatsapp"></i>

</a>


<script src="js/anime_navbar.js" defer></script>
<script src="js/anime_img.js" defer></script>
<script src="js/blog_slide.js" defer></script>
<script src="js/chat_medseg.js" defer></script>
<script src="js/hero_script.js" defer></script>
<script src="js/slide_script.js" defer></script>
</body>
</html>
