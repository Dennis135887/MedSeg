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

<title>MEDSEG | Medicina e Segurança do Trabalho</title>

<meta name="description" content="MEDSEG: Referência em Medicina e Segurança do Trabalho. Gestão completa de NRs, exames ocupacionais, treinamentos e assessoria técnica para o eSocial. Proteja sua empresa e seus colaboradores.">

<meta name="keywords" content="MEDSEG, medicina do trabalho, segurança do trabalho, eSocial, exames admissionais, PCMSO, PGR, treinamento NR, saúde ocupacional">

<meta name="author" content="MEDSEG">

  


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
  <link rel="stylesheet" href="medSeg.css" />

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
            <a class="nav-link" href="medseg-esocial.php"><i class="fas fa-laptop me-2"></i> Esocial</a>
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

            <a href="medseg-login.php" class="dropdown-card">
              <i class="fas fa-user"></i>
              <div>
                <strong>Login</strong>
                <p>Faça login no sistema</p>
              </div>
            </a>
          </div>
        </div>

      </div>


    </div>


     <div class="submenu-cadastro">
      <div class="submenu-header">
        <button type="button" class="btn-back">
          <i class="fas fa-arrow-left"></i> Voltar
        </button>
      </div>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="empresa-cadastro.php">Cadastrar Empresa</a></li>
        <li class="nav-item"><a class="nav-link" href="cadastro-medseg.php">Cadastrar Usuário</a></li>
      </ul>
    </div>
  </div> <!-- Fim do container-fluid -->
  </nav>
</header>





<!---=======================================================================================--->
<!---Medicina e segurança do trabalho
O bem estar do trabalhador--->

<div class="medicina-section text-white mt-5">
  <div class="container px-3">
    <div class="row align-items-center">
      
      <div class="col-12 custom-highlight text-shadow shadow-lg">
        <div class="row align-items-center">
          
          <div class="col-12 col-md-6 p-4">
            <h1 class="display-5 fw-bold animated-title">
              Medicina e segurança do trabalho <br>
              <span class="highlight-underline">O bem estar do trabalhador<br></span>
            </h1>
            <p class="lead fs-5">
              Mais do que cumprir uma determinação legal, a empresa que preza pela saúde,
              integridade física e segurança de seus funcionários atua como agente do
              desenvolvimento social.
            </p>
            <a href="empresa-cadastro.php" class="btn btn-gradient btn-lg mt-3">Junte-se a nós</a>
          </div>

          <div class="col-12 col-md-6 text-center text-md-end p-0 overflow-hidden">
            <img src="images2/medico3.webp" alt="Médico e Operário" class="img-fluid img-overlap">
          </div>

        </div>
      </div>

    </div>
  </div>
</div>
<!---=================================================================================-->

<!-- Jumbotron -->
<div class="container-fluid">
  <div class="row jumbotron-medicina p-4 align-items-center">
    <div class="col-md-9">
      <p class="lead fw-bold mb-0">
        "Soluções completas em Medicina e Segurança do Trabalho: protegendo o maior patrimônio da sua empresa, a vida dos seus colaboradores."
      </p>
    </div>
    <div class="col-md-3 text-end">
      <a href="#nossos-trabalhos" class="btn btn-medicina-outline btn-lg">Saiba mais</a>
    </div>
  </div>
</div>

<!---=================================================================================-->

<!--- SUA EMPRESA NAS MÃOS DE QUEM SABE FAZER GESTÃO---->
<!-- Carousel-Slider -->

<!-- =========================
INTRODUÇÃO
========================= -->

<div class="container text-center mt-5 mb-4 ">
  <div class="row justify-content-center">
    <div class="col-lg-8">

      <h2 class="titulo-gestao fw-bold mb-3">
        SUA EMPRESA NAS MÃOS DE QUEM SABE FAZER GESTÃO
      </h2>

      <p class="subtitulo-gestao fs-5">
        Confira alguns de nossos programas e serviços e se prepare para as exigências do <strong>eSocial</strong>.
      </p>

    </div>
  </div>
</div>


<!-- =========================
CAROUSEL
========================= -->

<div id="matrizSlide" class="carousel slide custom-carousel "
     data-bs-ride="carousel"
     data-bs-interval="5000">


  <!-- INDICADORES -->

  <div class="carousel-indicators">

    <button type="button" data-bs-target="#matrizSlide" data-bs-slide-to="0"
      class="active" aria-label="Engenharia de segurança"></button>

    <button type="button" data-bs-target="#matrizSlide" data-bs-slide-to="1"
      aria-label="Prevenção no trabalho"></button>

    <button type="button" data-bs-target="#matrizSlide" data-bs-slide-to="2"
      aria-label="Treinamentos"></button>

    <button type="button" data-bs-target="#matrizSlide" data-bs-slide-to="3"
      aria-label="Exames laboratoriais"></button>

  </div>


  <div class="carousel-inner carousel-content">


    <!-- SLIDE 1 -->

    <div class="carousel-item active">

      <div class="container slide-box">

        <div class="row align-items-center g-4">

          <div class="col-md-6">

            <h3 class="fw-bold">Engenharia no trabalho</h3>

            <p class="lead mt-3">
              A Engenharia de Segurança está diretamente ligada à proteção dos profissionais da sua empresa
              com o objetivo de prevenir e reduzir acidentes no ambiente de trabalho causados por máquinas,
              instalações ou condições ambientais inadequadas.
            </p>

            <a href="#" class="btn btn-slide mt-3">
              Saiba mais
            </a>

          </div>


          <div class="col-md-6 text-center">

            <img src="images2/engen-trab2.jpg"
              class="img-fluid slide-img"
              alt="Engenharia de segurança do trabalho em ambiente industrial">

          </div>

        </div>

      </div>

    </div>


    <!-- SLIDE 2 -->

    <div class="carousel-item">

      <div class="container slide-box">

        <div class="row align-items-center g-4">

          <div class="col-md-6">

            <h3 class="fw-bold">Prevenção no trabalho</h3>

            <p class="lead mt-3">
              Oferecemos assessoria completa em segurança e medicina do trabalho com programas específicos
              para aplicação das Normas Regulamentadoras exigidas pelo Ministério do Trabalho.
            </p>

            <a href="#" class="btn btn-slide mt-3">
              Saiba mais
            </a>

          </div>


          <div class="col-md-6 text-center">

            <img src="images2/prev-trab.jpg"
              class="img-fluid slide-img"
              alt="Equipe analisando medidas de prevenção no trabalho">

          </div>

        </div>

      </div>

    </div>


    <!-- SLIDE 3 -->

    <div class="carousel-item">

      <div class="container slide-box">

        <div class="row align-items-center g-4">

          <div class="col-md-6">

            <h3 class="fw-bold">Treinamento</h3>

            <p class="lead mt-3">
              Desenvolvemos treinamentos personalizados conforme as necessidades da empresa e as exigências
              do eSocial, capacitando profissionais para melhorar a performance organizacional.
            </p>

            <a href="#" class="btn btn-slide mt-3">
              Saiba mais
            </a>

          </div>


          <div class="col-md-6 text-center">

            <img src="images2/treinamento-imagem.jpg"
              class="img-fluid slide-img"
              alt="Treinamento corporativo em segurança do trabalho">

          </div>

        </div>

      </div>

    </div>


    <!-- SLIDE 4 -->

    <div class="carousel-item">

      <div class="container slide-box">

        <div class="row align-items-center g-4">

          <div class="col-md-6">

            <h3 class="fw-bold">
              Exames e diagnósticos de laboratório
            </h3>

            <p class="lead mt-3">
              Realizamos exames complementares para medicina preventiva,
              identificando doenças em estágio inicial e garantindo segurança
              nos exames ocupacionais.
            </p>

            <a href="#" class="btn btn-slide mt-3">
              Saiba mais
            </a>

          </div>


          <div class="col-md-6 text-center">

            <img src="images2/exame.jpg"
              class="img-fluid slide-img"
              alt="Exames laboratoriais para saúde ocupacional">

          </div>

        </div>

      </div>

    </div>


  </div>

</div>
<!---=================================================================================-->
<hr class="my-5">
<!-- Sistema de Gestão Integrado compatível com eSocial -->
<section class="hero2 py-5 text-dark bg-white">

<div class="container">

<div class="row align-items-center g-5">

<!-- IMAGEM -->

<div class="col-lg-6 text-center hero2-img-animate">

<img 
src="images2/SGI.png"
class="img-fluid hero2-img border-0 shadow-none p-0 m-0 rounded-3"
alt="computador"
/>

</div>

<!-- TEXTO -->

<div class="col-lg-6 hero2-text-animate">

<h2 class="display-5 fw-bold mb-4">
Sistema de Gestão Integrado compatível com eSocial
</h2>

<p class="lead">
Sistema com tecnologia e desenvolvimento para garantir a qualidade superior no resultado final em um prazo reduzido proporcionando uma excelente otimização de custos e recursos para sua empresa, pois não gera nenhum tipo de investimento em servidores e/ou licenças de software, todo o sistema é disponibilizado via internet, podendo assim ser acessado de qualquer lugar.
</p>

</div>

</div>

</div>

</section>
<!-- fim do Sistema de Gestão Integrado compatível com eSocial -->

<!---=================================================================================-->

<!-- e-Social de um jeito simples e seguro -->

<section class="create py-5 text-dark bg-white">

      <div class="container">

        <div class="row align-items-center g-5">

            <!-- TEXTO -->
            <div class="col-lg-6 create-text-animate">

            <h2 class="display-5 fw-bold mb-4">
            e-Social de um jeito simples e seguro
            </h2>

            <p class="lead">
            Por meio deste sistema o Governo Federal passa a receber das empresas de forma unificada as informações relativas aos colaboradores, como vínculos, contribuições previdenciárias, folha de pagamento, comunicações de acidente de trabalho, aviso prévio, escriturações fiscais e informações sobre o FGTS.
            </p>
            
            <a href="medseg-esocial.php" class="btn-saiba-mais">
              Saiba mais <i class="fas fa-arrow-right ms-2"></i>
            </a>
            </div>

            <!-- IMAGEM -->
            <div class="col-lg-6 text-center create-img-animate">

            <img src="images2/e-social.png" class="img-fluid" alt="Philosophy" />

            </div>

        </div>

      </div>

</section>

<!---=================================================================================-->
<!----Profissionais Qualificados & Gestão de Excelência--->
<section class="medseg-professionals bg-white">
    <div class="container">
        <div class="section-header">
            <h2>Profissionais Qualificados & Gestão de Excelência</h2>
            <p>A MEDSEG une infraestrutura completa e expertise técnica para garantir o bem-estar que sua empresa merece.</p>
        </div>

        <div class="content-grid">
            
            <div class="info-card">
                <div class="icon">📍</div>
                <h3>Presença em Território Nacional</h3>
                <p>Clínicas e profissionais de saúde e segurança credenciados, selecionados e treinados para a padronização rigorosa dos serviços em todo o Brasil.</p>

            </div>

            <div class="info-card">
                <div class="icon">🏢</div>
                <h3>Infraestrutura Completa</h3>
                <p>Gestão global de Saúde Empresarial para empresas de pequeno, médio e grande porte, incluindo operações nacionais e multinacionais.</p>
            </div>

            <div class="info-card">
                <div class="icon">🛡️</div>
                <h3>Soluções Personalizadas</h3>
                <p>Atendimento à legislação com foco na valorização da saúde, segurança, conforto e produtividade do capital humano.</p>
            </div>

        </div>

        <div class="trust-footer">
            <p><strong>MEDSEG:</strong> Excelência em Gestão Ocupacional e Segurança do Trabalho através da melhoria constante de processos e qualidade.</p>
        </div>
    </div>
</section>
<!---=================================================================================-->
<!---QUEM CONFIA NA MEDSEG--->
 
 <!--=================================================================================-->
<!-- QUEM CONFIA NA MEDSEG -->
<section class="confianca container-fluid text-center bg-white py-5">

  <div class="container">

    <div class="row justify-content-center mb-4">
      <div class="col-12">
        <h2 class="fw-bold mb-3">
          QUEM CONFIA NA MEDSEG
        </h2>

        <p class="subtitulo-confianca fs-5">
          Clientes e parceiros que ao longo dos anos acompanham e acreditam em nossos trabalhos.
        </p>
      </div>
    </div>

    <div class="row justify-content-center g-3">

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem1.jpg" class="img-fluid logo-parceiro" alt="Cliente 1">
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem2.jpg" class="img-fluid logo-parceiro" alt="Cliente 2">
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem3.jpg" class="img-fluid logo-parceiro" alt="Cliente 3">
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem4.jpg" class="img-fluid logo-parceiro" alt="Cliente 4">
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem5.jpg" class="img-fluid logo-parceiro" alt="Cliente 5">
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem6.jpg" class="img-fluid logo-parceiro" alt="Cliente 6">
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem7.jpg" class="img-fluid logo-parceiro" alt="Cliente 7">
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem8.jpg" class="img-fluid logo-parceiro" alt="Cliente 8">
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem9.jpg" class="img-fluid logo-parceiro" alt="Cliente 9">
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem10.jpg" class="img-fluid logo-parceiro" alt="Cliente 10">
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem11.jpg" class="img-fluid logo-parceiro" alt="Cliente 11">
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem12.jpg" class="img-fluid logo-parceiro" alt="Cliente 12">
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem13.jpg" class="img-fluid logo-parceiro" alt="Cliente 13">
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem14.jpg" class="img-fluid logo-parceiro" alt="Cliente 14">
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem15.jpg" class="img-fluid logo-parceiro" alt="Cliente 15">
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem16.jpg" class="img-fluid logo-parceiro" alt="Cliente 16">
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem17.jpg" class="img-fluid logo-parceiro" alt="Cliente 17">
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <img src="images2/imagem18.png" class="img-fluid logo-parceiro" alt="Cliente 18">
      </div>

    </div>
  </div>

</section>

<!---=================================================================================-->



<!---=============================================================================--->
<!----section Conheça nossos serviços--->
<section class="categorias-servicos bg-white" id="servico">

    <div class="container">

        <div class="titulo">
        <h2>Conheça nossos serviços</h2>
        <p>Soluções completas em medicina e segurança do trabalho</p>
        </div>

    <div class="grid-categorias">

      <div class="card-categoria">
      <img src="images2/imagem27.webp" alt="Medicina Ocupacional">
            <div class="overlay">
            <h3>Medicina Ocupacional</h3>
            <p>Exames ocupacionais e acompanhamento da saúde do trabalhador.</p>
            </div>
      </div>

      <div class="card-categoria">
      <img src="images2/imagem28.webp" alt="Segurança do Trabalho">
              <div class="overlay">
              <h3>Segurança do Trabalho</h3>
              <p>Laudos técnicos e programas de prevenção de riscos.</p>
              </div>
      </div>

      <div class="card-categoria">
      <img src="images2/imagem29.webp" alt="Gestão de SST">
              <div class="overlay">
              <h3>Gestão de SST</h3>
              <p>Gestão completa de saúde e segurança para empresas.</p>
              </div>
      </div>

      <div class="card-categoria">
      <img src="images2/imagem31.jpeg" alt="Terceirização">
          <div class="overlay">
          <h3>Terceirização</h3>
          <p>Profissionais especializados em segurança do trabalho.</p>
          </div>
      </div>

      <div class="card-categoria">
      <img src="images2/imagem30.webp" alt="Exames Ocupacionais">
            <div class="overlay">
            <h3>Exames Ocupacionais</h3>
            <p>Exames clínicos e laboratoriais ocupacionais.</p>
            </div>
      </div>

      <div class="card-categoria">
      <img src="images2/imagem32.jpg" alt="Treinamentos">
          <div class="overlay">
          <h3>Treinamentos</h3>
          <p>Capacitações conforme normas regulamentadoras.</p>
          </div>
      </div>

    </div>
  </div>
</section><!----fim do section Conheça nossos serviços--->

<!--==============================================================-->


<!-- SECTION Entre em Contato -->

<section class="contato bg-white" id="contato">

    <div class="container">

        <div class="row g-5 align-items-center">

            <div class="col-lg-6 contato-texto-area">

            <h2 class="contato-titulo">Entre em Contato</h2>

            <p class="contato-texto">
            Estamos prontos para atender você.
            </p>

           <ul class="contato-info">
    <li>
        <a href="tel:99999999999">📞 (99) 99999-9999</a>
    </li>
    <li>
        <a href="mailto:medseg@empresa.com">📧 medseg@empresa.com</a>
    </li>
    <li>
        <span>📍 São Paulo - SP</span>
    </li>
    <li>
      <!--  <a href="https://wa.me/554545454786" target="_blank">--->
        <a href="#">
            <i class="fab fa-whatsapp me-2"></i>4545-4786
        </a>
    </li>
</ul>

            </div>

            <div class="col-lg-6">

            <div class="mapa-container">

            <iframe 
            src="https://www.google.com/maps?q=Sao+Paulo&output=embed"
            loading="lazy">
            </iframe>

            </div>

            </div>

        </div>

    </div>

</section>
<!-- fim do section Entre em Contato -->

<!---=================================================================================-->
<!-- Conecte-se -->
<div class="container-fluid padding bg-white">
  <div class="row text-center padding">
    <div class="col-12">
      <h2 class="conectar">Conecte-se</h2>
    </div>
    <div class="col-12 social mb-4">
      <a href="#"><i class="fab fa-facebook fa-2x mx-2"></i></a>
      <a href="#"><i class="fab fa-twitter fa-2x mx-2"></i></a>
      <a href="#"><i class="fab fa-google-plus-g fa-2x mx-2"></i></a>
      <a href="#"><i class="fab fa-instagram fa-2x mx-2"></i></a>
      <a href="#"><i class="fab fa-youtube fa-2x mx-2"></i></a>
    </div>
  </div>
</div>

<!---=================================================================================-->
<!-- Titulo Chatbot -->
<div class="container mt-5">
    <div class="chatbot-header text-center mb-4">
        <h2 class="chatbot-title">Tire suas dúvidas com nosso Chatbot</h2>
        <p class="chatbot-description">
            Nosso assistente virtual está pronto para ajudar você com informações sobre os serviços da 
            <strong>MEDSEG</strong>.
        </p>
    </div>

    <div class="card shadow ai-card mx-3">
        <div class="card-header ai-header text-white text-center py-3">
            <h4 class="mb-0">MEDSEG Chatbot</h4>
        </div>

        <div class="card-body">
            <div id="chat-log" class="chat-log mb-3"></div>

            <!-- INPUT FIXADO (SEM BOOTSTRAP INPUT-GROUP) -->
            <div class="chat-input-wrapper">
                <input
                    id="user-input"
                    type="text"
                    class="chat-input"
                    placeholder="Digite sua mensagem"
                />
                <button class="chat-btn" onclick="enviarMensagem()">
                    Enviar
                </button>
            </div>
        </div>
    </div>
</div>

<script src="static/script.js"></script>
<!---=================================================================================-->
<!---=================================================================================-->


<!-- inicio blog section -->
<section class="blogs bg-white" id="blogs">

  <h1 class="heading"><span>Notícias Recentes</span></h1>

  <div class="swiper blogs-slider">

    <div class="swiper-wrapper">

      <div class="swiper-slide">
        <div class="box">
          <div class="image">
            <img src="images2/imagem20.jpg" alt="Notícia INSS">
          </div>
          <div class="content">
            <h3>INSS – Revê regra para incluir na aposentadoria especial</h3>
            <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
            <a href="#" class="btn">Saiba mais</a>
          </div>
        </div>
      </div>

      <div class="swiper-slide">
        <div class="box">
          <div class="image">
            <img src="images2/imagem21.jpg" alt="Preservação da Terra">
          </div>
          <div class="content">
            <h3>Preservação da Terra e Conscientização Humana</h3>
            <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
            <a href="#" class="btn">Saiba mais</a>
          </div>
        </div>
      </div>

      <div class="swiper-slide">
        <div class="box">
          <div class="image">
            <img src="images2/imagem22.jpg" alt="Saúde dos Ouvidos">
          </div>
          <div class="content">
            <h3>Cuide da Saúde dos Seus Ouvidos</h3>
            <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
            <a href="#" class="btn">Saiba mais</a>
          </div>
        </div>
      </div>

      <div class="swiper-slide">
        <div class="box">
          <div class="image">
            <img src="images2/imagem23.jpg" alt="Hérnia de Disco">
          </div>
          <div class="content">
            <h3>Hérnia de Disco – Como Previnir</h3>
            <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
            <a href="#" class="btn">Saiba mais</a>
          </div>
        </div>
      </div>

    </div>

    <div class="swiper-pagination"></div>

  </div>

</section>
<!-- fim blog section -->

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
            <a class="text-decoration-none  d-block mb-2" href="#">
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
