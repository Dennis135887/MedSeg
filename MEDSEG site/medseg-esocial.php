<?php
session_start();
// Verifica se há um usuário ou empresa logada
$logado = isset($_SESSION['usuario_id']) || isset($_SESSION['empresa_id']);
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>MEDSEG | Quem somos</title>

<meta name="description" content="MEDSEG: Referência em Medicina e Segurança do Trabalho. Gestão completa de NRs, exames ocupacionais, treinamentos e assessoria técnica para o eSocial. Proteja sua empresa e seus colaboradores.">

<meta name="keywords" content="MEDSEG, medicina do trabalho, segurança do trabalho, eSocial, exames admissionais, PCMSO, PGR, treinamento NR, saúde ocupacional">

<meta name="author" content="MEDSEG">

  <title>MedSeg Esocial</title>


  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <!-- Splide CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Anton&display=swap" rel="stylesheet" />
  <!-- Normalize & Custom CSS -->
  <link rel="stylesheet" href="normalize.css" />
  <link rel="stylesheet" href="medseg-esocial.css" />

<!---segundo link para o anime_page.js--->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body>

<!---==================================================================================---->
<!---Navbar--->
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top px-3 custom-mobile-nav">
    <div class="container-fluid">

      <button class="custom-toggler navbar-toggler me-2" type="button">
        <span class="toggler-icon top-bar"></span>
        <span class="toggler-icon middle-bar"></span>
        <span class="toggler-icon bottom-bar"></span>
      </button>

      <a class="navbar-brand mx-auto" href="#">
        <img src="images2/LOGO/logo2.png" alt="MedSeg Logo">
      </a>

      <div class="navbar-collapse" id="mainNavbar">

        <!-- MENU CENTRAL -->
        <ul class="navbar-nav me-auto nav-list-mobile">

          <li class="nav-item">
            <a class="nav-link" href="medSeg.php"><i class="fas fa-home me-2"></i> Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="quem-somos.php"><i class="fas fa-info-circle me-2"></i> Quem somos</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="medSeg.php#contato"><i class="fas fa-envelope me-2"></i> Contato</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="medSeg.php#servico"><i class="fas fa-server me-2"></i> Serviços</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-laptop me-2"></i> Esocial</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="medSeg.php#blogs"><i class="fas fa-blog me-2"></i> Blog</a>
          </li>

          <li class="nav-item d-lg-none">
            <a class="nav-link d-flex justify-content-between" href="#" id="openCadastro">
              <span><i class="fas fa-user-plus me-2"></i> Cadastrar</span>
              <i class="fas fa-chevron-right"></i>
            </a>
          </li>


        </ul>

        <!-- BOTÃO CADASTRAR (DIREITA) -->
        <div class="ms-auto d-none d-lg-block custom-dropdown">
          <a class="nav-link dropdown-toggle" href="#">
            <i class="fas fa-user-plus me-2"></i> Cadastrar
          </a>

          <div class="dropdown-mevmed">
            <a href="empresa-cadastro.php" class="dropdown-card">
              <i class="fas fa-building"></i>
              <div>
                <strong>Empresa</strong>
                <p>Cadastre sua empresa no sistema</p>
              </div>
            </a>

            <a href="cadastro-medseg.php" class="dropdown-card">
              <i class="fas fa-user"></i>
              <div>
                <strong>Usuário</strong>
                <p>Crie um novo usuário</p>
              </div>
            </a>

            <a href="cadastrar_funcionario.php" class="dropdown-card">
              <i class="fas fa-user"></i>
              <div>
                <strong>Funcionário</strong>
                <p>Cadastre seu funcionário no sistema</p>
              </div>
            </a>
          </div>
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

        <li class="nav-item">
          <a class="nav-link" href="cadastrar_funcionario.php"><i class="fas fa-user me-2"></i> Cadastrar funcionário</a>
        </li>
      </ul>
  </div>

<!---=======================================================================================--->

<!-- eSocial de um jeito simples e seguro. section -->

<section class="esocial-section py-5 pt-navbar">
  <div class="container">
    <div class="row align-items-center g-5">
      
      <div class="col-lg-6" data-aos="fade-right">
        <div class="ps-lg-4">
        
          <h2 class=" fw-bold mb-4">eSocial de um jeito simples e seguro.</h2>
          <div class="divisor-medseg mb-4"></div>
          
          <p class="lead text-muted mb-4">
            O eSocial é um projeto do Governo Federal que irá unificar o envio de informações pelo empregador em relação aos seus trabalhadores. O sistema irá requerer informações do trabalhador, da folha de pagamento, fiscais (aquisições e comercializações de produção rural e cadastro de trabalhadores avulsos não portuários), previdenciárias, medicina e segurança do trabalho e informações referentes aos processos judiciais. 
          </p>
          
          <p class="">
           As informações serão enviadas ao governo para um único repositório digital e os diferentes órgãos e entidades envolvidas no projeto terão acesso a elas.
          </p>
          
          
          </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left">
        <div class="position-relative p-4">
          <div class="bg-primary position-absolute top-0 end-0 w-75 h-75 rounded-3" style="opacity: 0.2; z-index: 0;"></div>
         <img src="images2/imagem58.jpg" 
     class="img-fluid rounded-4 shadow-lg position-relative imagem-esocial-ajustada" 
     alt="Equipe MedSeg">
        </div>
      </div>

    </div>
  </div>
</section>


<!---=================================================================================-->

<!-- Objetivos do eSocial section -->

<section class="esocial-section py-5 pt-navbar">
  <div class="container">
    <div class="row align-items-center g-5">


      <div class="col-lg-6" data-aos="fade-left">
        <div class="position-relative p-4">
          <div class="bg-primary position-absolute top-0 end-0 w-75 h-75 rounded-3" style="opacity: 0.2; z-index: 0;"></div>
          <img src="images2/imagem59.png" 
     class="img-fluid rounded-4 shadow-lg position-relative imagem-esocial-ajustada" 
     alt="Equipe MedSeg">
        </div>
      </div>
      
      <div class="col-lg-6" data-aos="fade-right">
        <div class="ps-lg-4">
        
          <h2 class="fw-bold mb-4">Objetivos do eSocial</h2>
          <div class="divisor-medseg mb-4"></div>
          
         <ul class="lista-esocial">
  <li>
    O eSocial foi criado para simplificar e unificar o envio de informações trabalhistas, previdenciárias e fiscais, trazendo mais transparência e organização para as empresas.
  </li>

  <li>
    Permite registrar eventos como admissões, afastamentos e desligamentos em tempo real, reduzindo burocracias e erros.
  </li>

  <li>
    Garante mais segurança jurídica e melhor gestão dos processos internos.
  </li>

  <li>
    A MedSeg oferece suporte completo para manter sua empresa em conformidade com praticidade e segurança.
  </li>
</ul>
          </div>
      </div>

      
    </div>
  </div>
</section>

<!---=================================================================================-->

<hr class="my-5 bg-white">


<!---=================================================================================-->

<!---MedSeg e o eSocial--->
<section class="esocial-section py-5 pt-navbar">
  <div class="container">
    <div class="row align-items-center g-5">
      
      <div class="col-lg-6" data-aos="fade-right">
        <div class="ps-lg-4">
        
          <h2 class="fw-bold mb-4">MedSeg e o eSocial</h2>
          <div class="divisor-medseg mb-4"></div>
          
         <p class="lead text-muted mb-4">
  O eSocial foi criado para simplificar e unificar o envio de informações trabalhistas, previdenciárias e fiscais, trazendo mais transparência e organização para as empresas.
</p>

<p>
  Por meio da plataforma, é possível registrar eventos como admissões, afastamentos e desligamentos em tempo real, reduzindo burocracias e erros nas informações.
</p>

<p>
  Além de facilitar o cumprimento das obrigações legais, o eSocial garante mais segurança jurídica e melhor gestão dos processos internos.
</p>

<p>
  A MedSeg oferece suporte completo para que sua empresa esteja sempre em conformidade com o sistema, com praticidade e segurança.
</p>
          
          
          </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left">
        <div class="position-relative p-4">
          <div class="bg-primary position-absolute top-0 end-0 w-75 h-75 rounded-3" style="opacity: 0.2; z-index: 0;"></div>
          <img src="images2/imagem60.webp" 
               class="img-fluid rounded-4 shadow-lg position-relative" 
               alt="Equipe MedSeg" 
               style="z-index: 1; object-fit: cover; min-height: 400px; width: 100%;">
        </div>
      </div>

    </div>
  </div>
</section>

<!---=================================================================================-->
<!---=================================================================================-->




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
            <a class="text-decoration-none  d-block mb-2" href="medSeg.php#contato">
              <i class="fas fa-envelope me-2"></i>Contato
            </a>
          </li>

          <li>
            <a class="text-decoration-none  d-block mb-2" href="medSeg.php#servico">
              <i class="fas fa-server me-2"></i>Serviços
            </a>
          </li>

          <li>
            <a class="text-decoration-none  d-block mb-2" href="#">
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



<!---link para o anime_page.js--->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script src="js/anime_navbar.js" defer></script>
<script src="js/anime_img.js" defer></script>
<script src="js/anime_page.js" defer></script>

</body>
</html>
